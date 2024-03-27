<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Organizations;
use App\Models\OrganizationsCategory;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {

        return View('pages.about')->with('products',);
    }

    public function jobs(Request $request)
    {
        $jobs = Jobs::all();

        $mergedData = $jobs
            ->groupBy('org_id')
            ->map(function ($jobGroup, $orgId) {
                $organization = Organizations::find($orgId);
                $categoryName = $organization->categories()->first()->name;

                return [
                    'organization' => $organization,
                    'categoryName' => $categoryName,
                    'jobs' => $jobGroup
                ];
            })
            ->filter()
            ->values()
            ->toArray();

        $organizations = collect($mergedData)->map(function ($item) {
            $jobs = $item['jobs']->unique('id');

            return [
                'organization' => $item['organization'], 
                'categoryName' => $item['categoryName'], 
                'job' => $jobs->first()
            ];
        })->toArray();

        // dd($organizations);

        return view('pages.jobs')->with([
            'organizations' => $organizations,
        ]);

        // $groupedJobsByCategories = Jobs::with('categories', 'organizations')
        // ->get()
        // ->groupBy(function (Jobs $job) {
        //     return $job->categories->first()->name;
        // });

        // // dd($groupedJobsByCategories);
        // return view('pages.jobs', [
        //     'groupedJobsByCategories' => $groupedJobsByCategories
        // ]);


        $jobs = Jobs::with('categories', 'organization');

        $categories = OrganizationsCategory::all();

        // Job category filter
        $selectedJobCategories = $request->input('job_categories');
        if ($selectedJobCategories) {
            $jobs->whereIn('job_category_id', $selectedJobCategories);
        }

        // Organization category filter
        $selectedOrgCategories = $request->input('organization_categories');
        if ($selectedOrgCategories) {
            $orgs = Organizations::select('id', 'name', 'Country', 'org_category_id')
                ->whereIn('org_category_id', $selectedOrgCategories)
                ->get();

            $jobs = $jobs->whereIn('org_id', $orgs->pluck('id'));
        }

        // Country filter
        $selectedCountry = $request->input('Country');
        if ($selectedCountry !== 'all') {
            $jobs->where('Country', $selectedCountry);
        }

        // Salary filter
        $minSalary = $request->input('salary_from');
        $maxSalary = $request->input('salary_to');
        if ($minSalary !== null && $maxSalary !== null) {
            $jobs->whereBetween('desired_salary', [$minSalary, $maxSalary]);
        } elseif ($minSalary !== null) {
            $jobs->where('desired_salary', '>=', $minSalary);
        } elseif ($maxSalary !== null) {
            $jobs->where('desired_salary', '<=', $maxSalary);
        }

        $jobs = $jobs->get();

        // Pass filters and data to the view
        return view('pages.jobs', [
            'categories' => $categories,
            'jobs' => $jobs,
        ]);
    }

    public function jobs_details()
    {

        return View('pages.jobs_details')->with('products',);
    }

    public function contact()
    {

        return View('pages.contact')->with('products',);
    }
}
