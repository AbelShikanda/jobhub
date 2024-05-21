<?php

namespace App\Http\Controllers;

use App\Models\Acknowledgment;
use App\Models\Availability;
use App\Models\Certificates;
use App\Models\Comments;
use App\Models\Education;
use App\Models\Experience;
use App\Models\job_user;
use App\Models\Jobs;
use App\Models\JobsCategories;
use App\Models\Language;
use App\Models\Resumes;
use App\Models\Skills;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use WisdomDiala\Countrypkg\Models\Country as ModelsCountry;

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

        $agreementType = "1";

        if (!Acknowledgment::where('user_id', $user_id)->where('agreement_type', $agreementType)->exists()) {
            return redirect()->route('applications.index')->with('message', 'Almost Done. Please Fill the Application to Get Jobs.');
        }

        $appliedJobsId = job_user::all()
            ->where('user_id', $user_id)
            ->pluck('job_id');

        $appliedJobsCategoriesId = Jobs::all()
            ->whereIn('job_category_id', $appliedJobsId)
            ->pluck('job_category_id')
            ->toArray();

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

        $categories = JobsCategories::whereIn('id', $appliedJobsCategoriesId)->get();
        // $categories = JobsCategories::all();
        // dd($categories);

        return view(
            'pages.profile.profile',
            [
                'jobs' => $jobs,
                'categories' => $categories,
                'user_id' => $user_id,
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
        $user_id = auth()->user()->id;

        $appliedJobsId = job_user::all()
            ->where('user_id', $user_id)
            ->pluck('job_id');

        $appliedJobsCategoriesId = Jobs::all()
            ->whereIn('job_category_id', $appliedJobsId)
            ->pluck('job_category_id')
            ->toArray();

        $jobs = Jobs::selectRaw('jobs.*')
            ->addSelect('organizations.Org_Name AS org_name')
            ->addSelect('organizations.website AS site')
            ->addSelect('organizations.Country AS country')
            ->addSelect('organizations.Description AS description')
            ->addSelect('organizations.Founded_Date AS fdate')
            ->addSelect('jobs_categories.name AS category_name')
            ->join('organizations', 'jobs.org_id', '=', 'organizations.id')
            ->join('jobs_categories', 'jobs.job_category_id', '=', 'jobs_categories.id')
            ->where('jobs.job_category_id', $id)
            ->latest()
            ->paginate(10);

        // if ($jobs->isEmpty()) {
        //     // No jobs found for the given category_id
        //     // You can return a view with a message or redirect the user to another page
        //     return view('pages.noJobsFound');
        // }

        $categories = JobsCategories::whereIn('id', $appliedJobsCategoriesId)->get();
        // $categories = JobsCategories::all();
        // dd($appliedJobsId);

        return view(
            'pages.profile.profile_categories',
            [
                'jobs' => $jobs,
                'categories' => $categories,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user_id = auth()->user()->id;
        $users = User::where('id', $id)->get();
        $jobs = Jobs::all();
        $experiences = Experience::where('user_id', $id)->latest()->first();
        $educations = Education::where('user_id', $id)->latest()->first();
        $certificates = Certificates::where('user_id', $id)->latest()->first();
        $languages = Language::where('user_id', $id)->latest()->first();
        $comments = Comments::where('user_id', $id)->latest()->first();
        $resume = Resumes::where('user_id', $id)->latest()->first();
        $countries = ModelsCountry::all();

        if ($resume) {
            $filePath = $resume->file_path;
            $fileName = Storage::url('img/img/' . $filePath);
        } else {
            $fileName = null;
        }

        $preferredlanguages = $languages->first()->language;
        $preferredlanguagesArray = explode(', ', $preferredlanguages);

        $userPreferredJobIds = $users->first()->preferred_industry;

        // Check if the preferred_industry is not null and is a valid JSON
        if (!is_null($userPreferredJobIds) && $userPreferredJobIds !== '' && $userPreferredJobIds !== 'null') {
            $userPreferredJobIds = json_decode($userPreferredJobIds);

            // Check if json_decode did not return null (indicating a valid JSON)
            if (json_last_error() === JSON_ERROR_NONE && is_array($userPreferredJobIds)) {
                foreach ($userPreferredJobIds as &$jobId) {
                    $jobId = intval($jobId);
                }
                $preferredIndustries = Jobs::whereIn('id', $userPreferredJobIds)->pluck('job_title');
                $preferredIndustriesID = Jobs::whereIn('id', $userPreferredJobIds)->pluck('id');
            } else {
                // Handle the case where JSON is invalid
                $preferredIndustries = collect();
                $preferredIndustriesID = collect();
            }
        } else {
            // Handle the case where preferred_industry is null or empty
            $preferredIndustries = collect();
            $preferredIndustriesID = collect();
        }


        if ($resume) {
            $filePath = $resume->file_path;
            $fileName = Storage::url('img/img/' . $filePath);
        } else {
            $fileName = null;
        }

        $appliedJobsId = job_user::all()
            ->where('user_id', $users->first()->id)
            ->pluck('job_id');

        $appliedJobsCategoriesId = Jobs::all()
            ->whereIn('job_category_id', $appliedJobsId)
            ->pluck('job_category_id')
            ->toArray();

        // dd($preferredIndustriesID);
        // var_dump($preferredIndustriesID);

        $categories = JobsCategories::whereIn('id', $appliedJobsCategoriesId)->get();

        $firstUser = $users->first();
        $passportStatus = '';
        if ($firstUser) {
            switch ($firstUser->has_passport) {
                case 0:
                    $passportStatus = 'NO';
                    break;
                case 1:
                    $passportStatus = 'Waiting';
                    break;
                case 2:
                    $passportStatus = 'Yes';
                    break;
                default:
                    $passportStatus = 'Unknown'; // Handle unexpected values
                    break;
            }
        }

        $policeClearanceStatus = '';
        if ($firstUser) {
            switch ($firstUser->has_police_clearance) {
                case 0:
                    $policeClearanceStatus = 'old';
                    break;
                case 1:
                    $policeClearanceStatus = 'Waiting';
                    break;
                case 2:
                    $policeClearanceStatus = 'No';
                    break;
                case 3:
                    $policeClearanceStatus = 'Yes';
                    break;
                default:
                    $policeClearanceStatus = 'Unknown'; // Handle unexpected values
                    break;
            }
        }

        // dd($users->first()->preferred_industry);

        return view('pages.profile.edit')->with([
            'categories' => $categories,
            'users' => $users,
            'experiences' => $experiences,
            'educations' => $educations,
            'comments' => $comments,
            'preferredIndustries' => $preferredIndustries,
            'certificates' => $certificates,
            'preferredlanguagesArray' => $preferredlanguagesArray,
            'fileName' => $fileName,
            'passportStatus' => $passportStatus,
            'policeClearanceStatus' => $policeClearanceStatus,
            'passportStatus' => $passportStatus,
            'policeClearanceStatus' => $policeClearanceStatus,
            'countries' => $countries,
            'jobs' => $jobs,
            'preferredIndustriesID' => $preferredIndustriesID,
            'languages' => $languages,
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
            'phone' => '',
            'jobz' => 'array',
            'pcertificate' => '',
            'Passport' => '',
            'language' => 'array',
            'plevel' => '',
        ]);

        $user = User::find($id);
        // $data = $request->only([
        //     'phone',
        //     'jobz',
        //     'Passport', 
        //     'pcertificate',
        //     'language',         
        //     'plevel',   
        // ]);
        // dd($data);

        try {
            DB::beginTransaction();

            User::where('id', $id)->update([
                'phone' => $request->input('phone'),
                'preferred_industry' => $request->input('jobz'),
                'has_passport' => $request->input('Passport'),
                'has_police_clearance' => $request->input('pcertificate'),
            ]);

            $selectedJobs = $request->input('jobz');
            // dd($selectedJobs);
            job_user::where('user_id', $id)->delete();
            foreach ($selectedJobs as $jobs) {
                job_user::create([
                    'job_id' => $jobs,
                    'user_id' =>  $user->id,
                ]);
            }

            $selectedLanguages = $request->input('language');
            $languagesString = implode(', ', $selectedLanguages);
            Language::where('user_id', $id)->update([
                'language' => $languagesString,
                'proficiency' => $request->input('plevel'),
            ]);

            DB::commit();
            return back()->with('message', 'Your information has been updated');
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
        // Find the user by ID
        $user = User::findOrFail($id);

        // Get the current jobs (assuming they are stored as a JSON array)
        $jobs = json_decode($user->preferred_industry, true);
        dd($jobs);

        // Remove the job ID from the array
        if (($key = array_search($id, $jobs)) !== false) {
            unset($jobs[$key]);
        }

        // Update the user's jobs column
        $user->preferred_industry = json_encode(array_values($jobs)); // Re-index the array and encode back to JSON
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Job removed successfully');
    }
}
