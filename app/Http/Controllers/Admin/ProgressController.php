<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Progress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.progress.index')->with([
            'applicants' => $users,
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
        $users = User::find($id);
        $progress = Progress::find($id);
        return view('admin.progress.edit')->with([
            'users' => $users,
            'progress' => $progress,
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
            'approve' => '',

        ]);

        $status = $request->input('approve') ? 1 : 0;
        $threshold = $status ? 25 : null;

        // $data = $request->only([
        //     'approve',
        // ]);
        // dd($data);
        // dd($threshold);
        try {
            DB::beginTransaction();

            $update_progress = Progress::where('user_id', $id)
                ->where('progress', $threshold)
                ->update([
                    'progress' => 100,
                ]);

            if (!$update_progress) {
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update user data');
            }

            DB::commit();
            return back()->with('success', 'The Applicant Status is Updated');
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
