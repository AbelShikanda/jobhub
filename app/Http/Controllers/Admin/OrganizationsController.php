<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\job_user;
use App\Models\Jobs;
use App\Models\organization_organization_category;
use App\Models\Organizations;
use App\Models\Organizations_jobs;
use App\Models\OrganizationsCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use WisdomDiala\Countrypkg\Models\Country as ModelsCountry;

class OrganizationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:View organizations'])->only(['index', 'show']);
        $this->middleware(['auth:admin', 'permission:Create organizations'])->only(['create', 'store']);
        $this->middleware(['auth:admin', 'permission:Edit organizations'])->only(['edit', 'update']);
        $this->middleware(['auth:admin', 'permission:Delete organizations'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = Organizations::orderByDesc('created_at')
        ->with('categories')
        ->get();
        // dd($work);
        return view('admin.orgs.index')->with([
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
        $categories = OrganizationsCategory::all();
        return view('admin.orgs.create')->with([
            'categories' => $categories
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
            'eName' => 'required',
            'category' => 'required',
            'website' => 'required',
            'country' => 'required',
            'selectedDate' => 'required',
            'desc' => 'required',
        ]);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $organizations = Organizations::create([
                'Org_Name' => $request->input('eName'),
                'Website' => $request->input('website'),
                'Country' => $request->input('country'),
                'Description' => $request->input('desc'),
                'Founded_Date' => $request->input('selectedDate'),
                'org_category_id' => $request->input('category'),
            ]);

            organization_organization_category::create([
                'org_id' => $organizations->id,
                'org_category_id' => $request->input('category'),
            ]);

            if (!$organizations) {
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('organizations.index')->with('message', 'Organization Stored Successfully.');
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
        $orgs = Organizations::find($id);
        $jobs = Jobs::where('org_id', $id)->get();

        $jobIds = Organizations_jobs::where('orgs_id', $id)->pluck('job_id')->all();
        // dd($jobId);

        $groupedUsers = [];

        if ($jobIds) {
            // dd('something');
            // Step 2: Loop through each job ID and get the users
            foreach ($jobIds as $jobId) {
                $jobIdString = (string) $jobId;
                $users = User::whereJsonContains('preferred_industry', $jobIdString)->get();
                foreach ($users as $user) {
                    if (!isset($groupedUsers[$jobId])) {
                        $groupedUsers[$jobId] = [];
                    }
                    $groupedUsers[$jobId][] = $user;
                }
            }
        }

        return view('admin.orgs.show')->with([
            'orgs' => $orgs,
            'jobs' => $jobs,
            'groupedUsers' => $groupedUsers,
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
        $categories = OrganizationsCategory::all();
        $orgsCategoriesId = Organizations::find($id)->org_category_id;
        $orgsCategories = OrganizationsCategory::find($orgsCategoriesId);
        $countries = ModelsCountry::all();
        $orgs = Organizations::find($id);
        $users = User::find($id);
        return view('admin.orgs.edit')->with([
            'orgs' => $orgs,
            'categories' => $categories,
            'countries' => $countries,
            'users' => $users,
            'orgsCategories' => $orgsCategories,
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
            'eName' => '',
            'category' => '',
            'website' => '',
            'country' => '',
            'selectedDate' => '',
            'desc' => '',
        ]);


        // $data = $request->only([
        //     'eName',
        //     'category',
        //     'website',
        //     'country',
        //     'selectedDate',
        //     'desc', 
        // ]);
        // dd($data);

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $organizations = Organizations::find($id);

            $organizations->update([
                'Org_Name' => $request->input('eName'),
                'Website' => $request->input('website'),
                'Country' => $request->input('country'),
                'Description' => $request->input('desc'),
                'Founded_Date' => $request->input('selectedDate'),
                'org_category_id' => $request->input('category'),
            ]);

            // dd($selectedJobs);
            organization_organization_category::where('org_id', $id)->delete();
            organization_organization_category::create([
                'org_id' => $organizations->id,
                'org_category_id' => $request->input('category'),
            ]);


            if (!$organizations) {
                DB::rollBack();

                return back()->with('message', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('organizations.index')->with('message', 'Organization updated Successfully.');
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
        $organization = Organizations::find($id);
        $organization->delete();
        return redirect()->route('organizations.index')->with('message', 'Organization Deleted Successfully.');
    }
}
