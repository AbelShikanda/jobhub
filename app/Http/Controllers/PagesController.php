<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\JobsCategories;
use App\Models\Organizations;
use App\Models\OrganizationsCategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PagesController extends Controller
{
    public function about()
    {

        return View('pages.about')->with('products',);
    }

    public function jobs()
    {
        $perPage = 10;
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

        $jobs = Jobs::selectRaw('jobs.*')
            ->addSelect('organizations.Org_Name AS org_name')
            ->addSelect('organizations.website AS site')
            ->addSelect('organizations.Country AS country')
            ->addSelect('organizations.Description AS description')
            ->addSelect('organizations.Founded_Date AS fdate')
            ->addSelect('jobs_categories.name AS category_name')
            ->join('organizations', 'jobs.org_id', '=', 'organizations.id')
            ->join('jobs_categories', 'jobs.job_category_id', '=', 'jobs_categories.id')
            ->latest()
            ->offset(($currentPage - 1) * $perPage)
            ->limit($perPage)
            ->get();

        $totalJobs = Jobs::selectRaw("COUNT(*)")
            ->count();

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $jobs,
            $totalJobs,
            $perPage,
            $currentPage
        );

        $paginator->setPath(route('jobs'));
        // dd($jobs);

        return view('pages.jobs', ['organizations' => $paginator]);
    }

    public function jobs_details()
    {

        return View('pages.jobs_details')->with('products',);
    }

    public function contact()
    {

        return View('pages.contact')->with('products',);
    }

    public function jobsCategory($category_id)
    {
        $jobs = Jobs::selectRaw('jobs.*')
            ->addSelect('organizations.Org_Name AS org_name')
            ->addSelect('organizations.website AS site')
            ->addSelect('organizations.Country AS country')
            ->addSelect('organizations.Description AS description')
            ->addSelect('organizations.Founded_Date AS fdate')
            ->addSelect('jobs_categories.name AS category_name')
            ->join('organizations', 'jobs.org_id', '=', 'organizations.id')
            ->join('jobs_categories', 'jobs.job_category_id', '=', 'jobs_categories.id')
            ->where('jobs.job_category_id', $category_id)
            ->latest()
            ->paginate(10);

        // if ($jobs->isEmpty()) {
        //     // No jobs found for the given category_id
        //     // You can return a view with a message or redirect the user to another page
        //     return view('pages.noJobsFound');
        // }

        $categories = JobsCategories::all();

        return view('pages.jobsCategory', [
            'jobs' => $jobs,
            'categories' => $categories,
        ]
    );
    }
}
