<?php

namespace App\Http\Controllers;

use App\Models\job_user;
use App\Models\Jobs;
use App\Models\JobsCategories;
use App\Models\Organizations;
use App\Models\OrganizationsCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

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
        $categories = JobsCategories::all();
        // dd($jobs);

        return view(
            'pages.jobs',
            [
                'organizations' => $paginator,
                'categories' => $categories,
            ]
        );
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

        return view(
            'pages.jobsCategory',
            [
                'jobs' => $jobs,
                'categories' => $categories,
            ]
        );
    }

    /**
     * A function to add jobs
     *
     * This function does the following:
     * - Step 1
     * - Step 2
     * - Step 3
     *
     * @param  Parameter type  Parameter name Description of the parameter (optional)
     * @return Return type Description of the return value (optional)
     */
    public function addJobs(Request $request)
    {
        $request->validate([
            'jobz' => 'array',
            'user_id' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $userID = $request->input('user_id');
            $selectedJobs = $request->input('jobz');

            $user = User::findOrFail($userID);
            $existingJobIds = $user->preferred_industry ? json_decode($user->preferred_industry, true) : [];

            foreach ($selectedJobs as $jobs) {
                if (!job_user::where('user_id', $userID)->where('job_id', $jobs)->exists()) {
                    job_user::create([
                        'job_id' => $jobs,
                        'user_id' => $userID,
                    ]);
                    if (!in_array($jobs, $existingJobIds)) {
                        $existingJobIds[] = $jobs;
                    }
                }
            }

            $user->preferred_industry = json_encode($existingJobIds);
            $user->save();

            DB::commit();
            return back()->with('message', 'Your application has been updated');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
