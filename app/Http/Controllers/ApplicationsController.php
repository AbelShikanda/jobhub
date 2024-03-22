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
use App\Models\JobsCategoties;
use App\Models\Language;
use App\Models\Organizations;
use App\Models\Resumes;
use App\Models\Skills;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApplicationsController extends Controller
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
        $categories = JobsCategoties::all();
        $organizations = Organizations::all();
        $jobs = Jobs::all();
        // dd($jobs);

        return view('applications.index')->with([
            'categories' => $categories,
            'jobs' => $jobs,
        ]);
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'aemail' => 'required|email',
            'gender' => 'required',
            'selectedDobDate' => 'required',
            'phoneNumber' => 'required',
            'country' => 'required',
            'education' => 'required',
            'proff' => 'required',
            'language' => 'required',
            'experience' => 'required',
            'qualify' => 'required',
            'platform' => 'required',
            'aName' => 'required',
            'filepath' => 'required',
            'selectedAvailDate' => 'required',
            'comment' => 'required',
            'agree' => 'required',

            'position' => 'required',
            'selectedStartDate' => 'required',
            'selectedEndDate' => 'required',
            'cert' => 'required',
            'auth' => 'required',
            'selectedDobDate' => 'required',
            'selectedExDate' => 'required',
            'language' => 'required',
            'proficiency' => 'required',
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $create_user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => Hash::make('password')
            ]);

            if(!$create_user){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Stored Successfully.');


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
        $request->validate([
            'phoneNumber' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'selectedDobDate' => 'required',
            // 'job' => 'required',
            'range' => 'required',
            'sName' => 'required',
            // 'level' => 'required',
            'sDesc' => 'required',
            'education' => 'required',
            'field' => 'required',
            'institution' => 'required',
            'selectedGradDate' => 'required',
            'sName' => 'required',
            'cName' => 'required',
            'position' => 'required',
            // 'wDate' => 'required',
            'selectedExDate' => 'required',
            'wDesc' => 'required',
            'wLocation' => 'required',
            'certName' => 'required',
            // 'Issue' => 'required',
            'certIssue' => 'required',
            'selectedCertDate' => 'required',
            'selectedCertExDate' => 'required',
            'certDesc' => 'required',
            'plevel' => 'required',
            'slevel' => 'required',
            'certificate' => 'required',
            'Passport' => 'required',
            'platform' => 'array',
            'agentName' => 'required',
            'selectedAvailDate' => 'required',
            'filepath' => 'required|file',
            'comment' => 'required',
            'agree' => 'required',
            'selectedPosDate' => 'required',
            'sLocation' => 'required',
            'jobz' => 'array',
            'language' => 'required',
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
            return redirect()->route('applications.index')->with('message', 'Your information has been received, we will communicate.');
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
        //
    }
}
