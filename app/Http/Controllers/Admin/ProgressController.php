<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\approvalmail;
use App\Models\Progress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:View Users'])->only(['index', 'show']);
        $this->middleware(['auth:admin', 'permission:Create Users'])->only(['create', 'store']);
        $this->middleware(['auth:admin', 'permission:Edit Users'])->only(['edit', 'update']);
        $this->middleware(['auth:admin', 'permission:Delete Users'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.progress.index')->with([
            'applicants' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $progress = Progress::find($id);
        return view('admin.progress.edit')->with([
            'users' => $users,
            'progress' => $progress,
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
            'approve' => '',

        ]);

        $status = $request->input('approve') ? 1 : 0;
        $threshold = $status ? 25 : null;
        $user = User::find($id);
        

        // $data = $request->only([
        //     'approve',
        // ]);
        // dd($user->email);
        // dd($threshold);
        try {
            DB::beginTransaction();

            $update_progress = Progress::where('user_id', $id)
                ->where('progress', $threshold)
                ->update([
                    'progress' => 100,
                ]);

            Mail::to($user->email)
            ->send(new approvalmail($user));

            if (!$update_progress) {
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update user data');
            }

            DB::commit();
            return back()->with('success', 'The Applicant Status is Updated');
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
        //
    }
}
