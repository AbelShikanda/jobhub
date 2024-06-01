<?php

namespace App\Http\Controllers;

use App\Models\Acknowledgment;
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
    /**
     * A function to 
     *
     * This function does the following:
     * - Step 1
     * - Step 2
     * - Step 3
     *
     * @param  Parameter type  Parameter name Description of the parameter (optional)
     * @return Return type Description of the return value (optional)
     */
    public function about()
    {
        $pageTitle = 'About';
        $breadcrumbLinks = [
            ['url' => '/', 'label' => 'Home'],
            ['url' => '', 'label' => 'About'],
        ];
        return view(
            'pages.about',
            [
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
            ]
        );
    }

    /**
     * A function to 
     *
     * This function does the following:
     * - Step 1
     * - Step 2
     * - Step 3
     *
     * @param  Parameter type  Parameter name Description of the parameter (optional)
     * @return Return type Description of the return value (optional)
     */
    public function jobs()
    {
        $orgs = Organizations::with('images')->get();
        $perPage = 10;
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        $pageTitle = 'Jobs';
        $breadcrumbLinks = [
            ['url' => '/', 'label' => 'Home'],
            ['url' => '', 'label' => 'Jobs'],
        ];

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
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
                'orgs' => $orgs,
            ]
        );
    }

    /**
     * A function to 
     *
     * This function does the following:
     * - Step 1
     * - Step 2
     * - Step 3
     *
     * @param  Parameter type  Parameter name Description of the parameter (optional)
     * @return Return type Description of the return value (optional)
     */
    public function jobDetails($id)
    {
        $pageTitle = 'Jobs Details';
        $breadcrumbLinks = [
            ['url' => '/', 'label' => 'Home'],
            ['url' => '/jobs', 'label' => 'Jobs'],
            ['url' => '', 'label' => 'Jobs Details'],
        ];
        $job = Jobs::where('id', $id)->with('organizations.images')->first();
        // $orgsId = Jobs::where('id', $id)->pluck('org_id');
        // $orgs = Organizations::where('id', $orgsId)->with('images')->get();
        // dd($job);
        // dd($job->toArray());

        return view(
            'pages.job_details',
            [
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
                'job' => $job,
            ]
        );
    }

    /**
     * A function to 
     *
     * This function does the following:
     * - Step 1
     * - Step 2
     * - Step 3
     *
     * @param  Parameter type  Parameter name Description of the parameter (optional)
     * @return Return type Description of the return value (optional)
     */
    public function contact()
    {
        $pageTitle = 'Contact';
        $breadcrumbLinks = [
            ['url' => '/', 'label' => 'Home'],
            ['url' => '', 'label' => 'Contact'],
        ];

        return view(
            'pages.contact',
            [
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
            ]
        );
    }

    /**
     * A function to 
     *
     * This function does the following:
     * - Step 1
     * - Step 2
     * - Step 3
     *
     * @param  Parameter type  Parameter name Description of the parameter (optional)
     * @return Return type Description of the return value (optional)
     */
    public function jobsCategory($category_id)
    {
        $orgs = Organizations::with('images')->get();
        $pageTitle = 'Job Category';
        $breadcrumbLinks = [
            ['url' => '/', 'label' => 'Home'],
            ['url' => '/jobs', 'label' => 'Jobs'],
            ['url' => '', 'label' => 'Job Category'],
        ];

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

        $categories = JobsCategories::all();
        $category = JobsCategories::find($category_id);

        return view(
            'pages.jobsCategory',
            [
                'jobs' => $jobs,
                'categories' => $categories,
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
                'orgs' => $orgs,
                'category' => $category,
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

        $userID = $request->input('user_id');

        if (!Acknowledgment::where('user_id', $userID)->where('agreement_type', '1')->exists()) {
            return redirect()->route('applications.index')->with('message', 'You are almost done. Just fill in the form to get started');
        }

        try {
            DB::beginTransaction();

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
