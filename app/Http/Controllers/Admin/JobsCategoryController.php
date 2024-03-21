<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobsCategoties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = JobsCategoties::orderByDesc('created_at')->get();
        return view('admin.categories.jobs_categories.index')->with([
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.jobs_categories.create');
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
            'cName' => 'required',
        ]);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $category = JobsCategoties::create([
                'name' => $request->input('cName'),
            ]);

            if(!$category){
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('job_categories.index')->with('message', 'Category Stored Successfully.');


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
    public function show()
    {
        // return view('admin.categories.jobs_categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = JobsCategoties::find($id);
        return view('admin.categories.jobs_categories.edit')->with([
            'category' => $category
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
            'cName' => 'required',
        ]);

        try {
            DB::beginTransaction();

            // Logic For Save User Data
            $category = JobsCategoties::where('id', $id)->update([
                'name' => $request->input('cName'),
            ]);

            if(!$category){
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('job_categories.index')->with('message', 'Category Updated Successfully.');


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
        $category = JobsCategoties::find($id);
        $category->delete();
        return redirect()->route('job_categories.index')->with('message', 'Category Deleted Successfully.');
    }
}
