<?php

namespace App\Http\Controllers;

use App\Models\job_user;
use App\Models\Jobs;
use App\Models\JobsCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $jobsId = job_user::all()
        ->where('user_id', $user_id)
        ->pluck('job_id');

        $jobs = Jobs::selectRaw('jobs.*')
            ->addSelect('organizations.Org_Name AS org_name')
            ->addSelect('organizations.website AS site')
            ->addSelect('organizations.Country AS country')
            ->addSelect('organizations.Description AS description')
            ->addSelect('organizations.Founded_Date AS fdate')
            ->addSelect('jobs_categories.name AS category_name')
            ->join('organizations', 'jobs.org_id', '=', 'organizations.id')
            ->join('jobs_categories', 'jobs.job_category_id', '=', 'jobs_categories.id')
            ->whereIn('jobs.id', $jobsId)
            ->latest()
            ->orderBy('created_at', 'DESC')
            ->get();

        $categories = JobsCategories::all();
        // dd($jobsId);

        return view(
            'pages.profile.profile',
            [
                'jobs' => $jobs,
                'categories' => $categories,
            ]
        );
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile_category()
    {
        $categories = JobsCategories::all();
        return view(
            'pages.profile.profile_categories',
            [
                // 'organizations' => $paginator,
                'categories' => $categories,
            ]
        );
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
