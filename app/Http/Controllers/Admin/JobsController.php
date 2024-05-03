<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\job_job_category;
use App\Models\Jobs;
use App\Models\JobsCategories;
use App\Models\Organizations;
use App\Models\OrganizationsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = Jobs::orderByDesc('created_at')->with('categories')->get();
        return view('admin.jobs.index')->with([
            'work' => $work,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = JobsCategories::all();
        $organizations = Organizations::all();
        return view('admin.jobs.create')->with([
            'categories' => $categories,
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
            'category' => 'required',
            'jName' => 'required',
            'range' => 'required',
            'selectedDate' => 'required',
            'responce' => 'required',
            'desc' => 'required',
            'req' => 'required',
        ]);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $jobs = Jobs::create([
                'job_title' => $request->input('jName'),
                'org_id' => $request->input('organization'),
                'job_category_id' => $request->input('category'),
                'description' => $request->input('desc'),
                'responsibilities' => $request->input('responce'),
                'requirements' => $request->input('req'),
                'salary_range' => $request->input('range'),
                'deadline_date' => $request->input('selectedDate'),
            ]);

            job_job_category::create([
                'job_id' => $jobs->id,
                'job_category_id' => $request->input('category'),
            ]);

            if(!$jobs){
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('job.index')->with('message', 'Category Stored Successfully.');


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
        return view('admin.jobs.show')->with([
            // 'users' => $users
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
        return view('admin.jobs.edit')->with([
            // 'users' => $users
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
            'organization' => '',
            'category' => 'required',
            'jName' => '',
            'range' => '',
            'selectedDate' => '',
            'responce' => '',
            'desc' => '',
            'req' => '',
        ]);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $jobs = Jobs::create([
                'job_title' => $request->input('jName'),
                'description' => $request->input('desc'),
                'responsibilities' => $request->input('responce'),
                'requirements' => $request->input('req'),
                'salary_range' => $request->input('range'),
                'deadline_date' => $request->input('selectedDate'),
            ]);

            if(!$jobs){
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('job.index')->with('message', 'Category Stored Successfully.');


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
        $category = Jobs::find($id);
        $category->delete();
        return redirect()->route('job.index')->with('message', 'Category Deleted Successfully.');
    }
}
