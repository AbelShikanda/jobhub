<?php

namespace App\Http\Controllers;

use App\Mail\emailSignup;
use App\Models\EmailSignUp as ModelsEmailSignUp;
use App\Models\images;
use App\Models\Jobs;
use App\Models\Organizations;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orgs = Organizations::with('images')->get();
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
            ->take(5)
            ->get();

        // dd($orgs);

        return view('home', [
            'organizations' => $jobs,
            'orgs' => $orgs,
        ]);
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
    public function emailSignup(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $email = $request->input('email');

        try {
            $request->validate([
                'email' => 'required|email|unique:email_sign_ups,email',
            ]);
        
            $email = $request->input('email');
        
            DB::beginTransaction();
        
            $mail = ModelsEmailSignUp::create([
                'email' => $email,
            ]);
        
            Mail::to($email)
                ->send(new emailSignup($email));
        
            if (!$mail) {
                DB::rollBack();
                return back()->with('message', 'Something went wrong while saving user data');
            }
        
            DB::commit();
            return back()->with('message', 'Thank you for your subscription, check your email');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1062) { // Error code for duplicate entry
                return back()->with('error', 'Email already exists.');
            } else {
                DB::rollBack();
                return back()->with('error', 'Something went wrong. Please try again later.');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * function to perfrom tests
     *
     * This function does the following:
     * - Step 1
     * - Step 2
     * - Step 3
     *
     * @param  Parameter type  Parameter name Description of the parameter (optional)
     * @return Return type Description of the return value (optional)
     */
    public function test() {
        return view('test');
    }
}
