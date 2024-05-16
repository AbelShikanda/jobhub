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
        // dd($jobs);

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
        $users = User::where('id', $user_id)->get();

        $experiences = Experience::where('user_id', $id)->latest()->first();
        $educations = Education::where('user_id', $id)->latest()->first();
        $certificates = Certificates::where('user_id', $id)->latest()->first();
        $languages = Language::where('user_id', $id)->latest()->first();
        $comments = Comments::where('user_id', $id)->latest()->first();
        $resume = Resumes::where('user_id', $id)->latest()->first();

        $preferredlanguages = $languages->first()->language;
        $preferredlanguagesArray = explode(', ', $preferredlanguages);


        $userPreferredJobIds = $users->first()->preferred_industry;
        $userPreferredJobIds = json_decode($userPreferredJobIds);
        foreach ($userPreferredJobIds as &$jobId) {
            $jobId = intval($jobId);
        }
        $preferredIndustries = Jobs::whereIn('id', $userPreferredJobIds)->pluck('job_title');


        if ($resume) {
            $filePath = $resume->file_path;
            $fileName = Storage::url('img/img/' . $filePath);
        } else {
            $fileName = null;
        }

        $appliedJobsId = job_user::all()
            ->where('user_id', $user_id)
            ->pluck('job_id');

        $appliedJobsCategoriesId = Jobs::all()
            ->whereIn('job_category_id', $appliedJobsId)
            ->pluck('job_category_id')
            ->toArray();

        // dd($users->first()->phone);

        $categories = JobsCategories::whereIn('id', $appliedJobsCategoriesId)->get();

        return view(
            'pages.profile.profile_edit',
            [
                'categories' => $categories,
                'users' => $users,
                'experiences' => $experiences,
                'educations' => $educations,
                'comments' => $comments,
                'preferredIndustries' => $preferredIndustries,
                'certificates' => $certificates,
                'preferredlanguagesArray' => $preferredlanguagesArray,
                'fileName' => $fileName
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
        $request->validate([
            'phoneNumber' => '',
            'gender' => '',
            'country' => '',
            'selectedDobDate' => '',
            'range' => '',
            'sName' => '',
            'sDesc' => '',
            'education' => '',
            'field' => '',
            'institution' => '',
            'selectedGradDate' => '',
            'sName' => '',
            'cName' => '',
            'position' => '',
            'selectedExDate' => '',
            'wDesc' => '',
            'wLocation' => '',
            'certName' => '',
            'certIssue' => '',
            'selectedCertDate' => '',
            'selectedCertExDate' => '',
            'certDesc' => '',
            'plevel' => '',
            'slevel' => '',
            'certificate' => '',
            'Passport' => '',
            'platform' => 'array',
            'agentName' => '',
            'selectedAvailDate' => '',
            'filepath' => 'file',
            'comment' => '',
            'agree' => '',
            'selectedPosDate' => '',
            'sLocation' => '',
            'jobz' => 'array',
            'language' => '',
        ]);

        $file = $request->file('filepath');

        if (isset($file)) {
            $currentDate = Carbon::now()->toDateString();
            $fileName = $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('img/img')) {
                Storage::disk('public')->makeDirectory('img/img');
            }
            $postFile = file_get_contents($file);
            Storage::disk('public')->put('img/img/' . $fileName, $postFile);
        } else {
            $fileName = '';
        }

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $selectedplatform = $request->input('platform');
            // Convert the selected platform array to a string
            $platformString = implode(', ', $selectedplatform);

            $update_user = User::where('id', $id)->update([
                'gender' => $request->input('gender'),
                'phone' => $request->input('phoneNumber'),
                'date_of_birth' => $request->input('selectedDobDate'),
                'country' => $request->input('country'),
                'preferred_industry' => $request->input('jobz'),
                'has_passport' => $request->input('Passport'),
                'has_police_clearance' => $request->input('certificate'),
                'reference_source' => $request->input('agentName'),
                'additional_reference' => $platformString,
            ]);
            // dd($update_user);

            $user = User::find($id);
            $selectedJobs = $request->input('jobz');

            foreach ($selectedJobs as $jobs) {
                job_user::create([
                    'job_id' => $jobs,
                    'user_id' =>  $user->id,
                ]);
            }


            $selectedLanguages = $request->input('language');
            // Convert the selected languages array to a string
            $languagesString = implode(', ', $selectedLanguages);

            $available = Availability::create([
                'user_id' => $id,
                'start_time' => $request->input('selectedAvailDate'),
            ]);

            $acknowledgement = Acknowledgment::create([
                'user_id' => $id,
                'agreement_type' => $request->input('agree'),
                'agreement_content' => 'i agree',
            ]);

            $cert = Certificates::create([
                'user_id' => $id,
                'certificate_name' => $request->input('certName'),
                'issuing_authority' => $request->input('certIssue'),
                'issue_date' => $request->input('selectedCertDate'),
                'expiry_date' => $request->input('selectedCertExDate'),
                'description' => $request->input('certDesc'),
            ]);

            $comment = Comments::create([
                'user_id' => $id,
                'comment_text' => $request->input('comment'),
            ]);

            $education = Education::create([
                'user_id' => $id,
                'degree' => $request->input('education'),
                'field_of_study' => $request->input('field'),
                'institution' => $request->input('institution'),
                'location' => $request->input('sLocation'),
                'graduation_year' => $request->input('selectedGradDate'),
                'description' => $request->input('proff'),
            ]);

            $experience = Experience::create([
                'user_id' => $id,
                'company_name' => $request->input('cName'),
                'Position' => $request->input('position'),
                'start_date' => $request->input('selectedPosDate'),
                'end_date' => $request->input('selectedExDate'),
                'description' => $request->input('wDesc'),
                'location' => $request->input('wLocation'),
            ]);

            $language = Language::create([
                'user_id' => $id,
                'language' => $languagesString,
                'proficiency' => $request->input('plevel'),
            ]);

            $resume = Resumes::create([
                'user_id' => $id,
                'file_name' => $fileName,
                'file_path' => $fileName,
            ]);

            $skill = Skills::create([
                'user_id' => $id,
                'Skill_Name' => $request->input('sName'),
                'Description' => $request->input('slevel'),
                'Skill_level' => $request->input('sDesc'),
            ]);
            // dd($update_user,$acknowledgement,$available,$cert,$comment,$education,$experience,$language,$resume, $skill);

            if (!$update_user || !$acknowledgement || !$available || !$cert || !$comment || !$education || !$experience || !$language || !$resume || !$skill) {
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update user data');
            }

            DB::commit();
            return redirect()->route('profile.show')->with('message', 'Your information has been received, we will communicate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
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

    public function profileCategory($category_id)
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
            ->where('jobs.job_category_id', $category_id)
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
}
