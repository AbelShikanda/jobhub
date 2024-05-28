<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\jobPosted;
use App\Models\job_job_category;
use App\Models\Jobs;
use App\Models\JobsCategories;
use App\Models\Organizations;
use App\Models\Organizations_jobs;
use App\Models\OrganizationsCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $users = User::all();
        $emails = $users->pluck('email')->toArray();

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

            Organizations_jobs::create([
                'job_id' => $jobs->id,
                'orgs_id' => $request->input('organization'),
            ]);

            Mail::to('multi@jobhub.com')
            ->bcc($emails)
            ->send(new jobPosted($jobs));

            if(!$jobs){
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('job.index')->with('message', 'Job Posted Successfully.');


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
        $jobs = Jobs::where('id', $id)->get();
        return view('admin.jobs.show')->with([
            'jobs' => $jobs
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
        $jobsCategories = JobsCategories::find($id);
        $currentOrgsIds = Jobs::find($id)->org_id;
        $currentOrgs = Organizations::find($currentOrgsIds);
        $users = User::find($id);

        $categories = JobsCategories::all();
        $organizations = Organizations::all();
        $jobs = Jobs::find($id);
        return view('admin.jobs.edit')->with([
            'categories' => $categories,
            'organizations' => $organizations,
            'jobsCategories' => $jobsCategories,
            'currentOrgs' => $currentOrgs,
            'users' => $users,
            'jobs' => $jobs,
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
            'category' => '',
            'jName' => '',
            'range' => '',
            'selectedDate' => '',
            'responce' => '',
            'desc' => '',
            'req' => '',
        ]);


        // $data = $request->only([
        //     'organization',
        //     'category',
        //     'jName',
        //     'range',
        //     'selectedDate',
        //     'responce',
        //     'desc',
        //     'req',
        // ]);
        // dd($data);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $jobs = Jobs::find($id);
            $jobs->update([
                'org_id' => $request->input('organization'),
                'job_category_id' => $request->input('category'),
                'job_title' => $request->input('jName'),
                'deadline_date' => $request->input('selectedDate'),
                'responsibilities' => $request->input('responce'),
                'description' => $request->input('desc'),
                'requirements' => $request->input('req'),
                'salary_range' => $request->input('range'),
            ]);

            job_job_category::where('job_id', $id)->delete();
            job_job_category::create([
                'job_id' => $jobs->id,
                'job_category_id' => $request->input('category'),
            ]);

            Organizations_jobs::where('job_id', $id)->delete();
            Organizations_jobs::create([
                'job_id' => $jobs->id,
                'org_id' => $request->input('organization'),
            ]);

            if(!$jobs){
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('job.index')->with('message', 'job Updated Successfully.');


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
        $job = Jobs::find($id);
        $job->delete();
        return redirect()->route('job.index')->with('message', 'Job Deleted Successfully.');
    }
}
