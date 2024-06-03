<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Models\images;
use App\Models\Organizations;
use App\Models\Organizations_images;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:Upload Files'])->only(['index', 'show']);
        $this->middleware(['auth:admin', 'permission:View Files'])->only(['create', 'store']);
        $this->middleware(['auth:admin', 'permission:Edit Files'])->only(['edit', 'update']);
        $this->middleware(['auth:admin', 'permission:Delete Files'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imgs = images::with('organization')->get();
        // dd($imgs);
        return view('admin.images.index')->with([
            'imgs' => $imgs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = Organizations::all();
        return view('admin.images.create')->with([
            'organizations' => $organizations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'organization' => 'required',
            'filepath' => 'required',
            'iName' => 'required',
            'is_admin' => 'required',
        ]);

        $file = $request->file('filepath');

        if (isset($file)) {
            $file = $request->file('filepath');
            // dd($file);
            $currentDate = now()->toDateString();
            $fileName = $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Create new ImageManager instance with desired driver
            $manager = new ImageManager(Driver::class); // or ['driver' => 'gd']

            // Read the image
            $image = $manager->read($file->getPathname());

            // Resize and crop the image to a 2:3 aspect ratio (800x1200)
            $croppedImage = $image->resize(1280, 853);

            // Save the resized and cropped image to storage
            $croppedImagePath = 'img/pictures/' . $fileName;
            Storage::disk('public')->put($croppedImagePath, (string) $croppedImage->toJpeg());
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }

        // $data = $request->only([
        //     'organization',
        //     'filepath',
        //     'iName',
        //     'is_admin',
        // ]);
        // dd($data);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $img = images::create([
                'text' => $request->input('iName'),
                'org_id' => $request->input('organization'),
                'image_path' => $fileName,
                'is_admin' => $request->input('is_admin'),
            ]);

            Organizations_images::create([
                'img_id' => $img->id,
                'org_id' => $request->input('organization'),
            ]);

            if (!$img) {
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('gallery.index')->with('message', 'Image Stored Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images = images::find($id);
        return view('admin.images.show')->with([
            'images' => $images,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentOrgsId = images::find($id)->org_id;
        $currentOrgs = Organizations::find($currentOrgsId);
        $images = images::find($id);
        $organizations = Organizations::all();
        return view('admin.images.edit')->with([
            'organizations' => $organizations,
            'currentOrgs' => $currentOrgs,
            'images' => $images,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'organization' => 'required',
            'filepath' => 'required',
            'iName' => 'required',
            'is_admin' => 'required',
        ]);

        $file = $request->file('filepath');

        if (isset($file)) {
            $currentDate = Carbon::now()->toDateString();
            $fileName = $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('img/pictures')) {
                Storage::disk('public')->makeDirectory('img/pictures');
            }
            $postFile = file_get_contents($file);
            Storage::disk('public')->put('img/pictures/' . $fileName, $postFile);
        } else {
            $fileName = '';
        }

        // $data = $request->only([
        //     'organization',
        //     'filepath',
        //     'iName',
        //     'is_admin',
        // ]);
        // dd($data);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $image = Images::find($id);
            $image->update([
                'text' => $request->input('iName'),
                'org_id' => $request->input('organization'),
                'image_path' => $fileName,
                'is_admin' => $request->input('is_admin'),
            ]);

            Organizations_images::where('img_id', $id)->delete();
            Organizations_images::create([
                'img_id' => $image->id,
                'org_id' => $request->input('organization'),
            ]);

            if (!$image) {
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('gallery.index')->with('message', 'Image Updated Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = images::find($id);
        $img->delete();
        return redirect()->route('gallery.index')->with('message', 'Image Deleted Successfully.');
    }
}
