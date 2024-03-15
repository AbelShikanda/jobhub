<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(7);

        return view('admin.applicants.index')->with([
            'users' => $users
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.applicants.create')->with([
            // 'users' => $users
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email'
    //     ]);
        
    //     try {
    //         DB::beginTransaction();
    //         // Logic For Save User Data

    //         $create_user = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => Hash::make('password')
    //         ]);

    //         if(!$create_user){
    //             DB::rollBack();

    //             return back()->with('error', 'Something went wrong while saving user data');
    //         }

    //         DB::commit();
    //         return redirect()->route('users.index')->with('success', 'User Stored Successfully.');


    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         throw $th;
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('id', $id)->first();
        // dd($users);

        return view('admin.applicants.show')->with([
            // 'users' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $users =  User::whereId($id)->first();

    //     // if(!$users){
    //     //     return back()->with('error', 'User Not Found');
    //     // }

    //     return view('admin.applicants.edit')->with([
    //         // 'users' => $users
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'user_name' => '',
    //         'first_name' => '',
    //         'last_name' => '',
    //         'email' => 'email',
    //         'gender' => '',
    //         'phone' => '',
    //         'town' => '',
    //         'estate' => '',
    //         'landmark' => '',
    //         'house_no' => '',
    //     ]);
        
    //     try {
    //         DB::beginTransaction();
    //         // Logic For Save User Data

    //         $update_user = User::where('id', $id)->update([
    //             'user_name' => $request->user_name,
    //             'first_name' => $request->first_name,
    //             'last_name' => $request->last_name,
    //             'email' => $request->email,
    //             'gender' => $request->gender,
    //             'phone' => $request->phone,
    //             'town' => $request->town,
    //             'estate' => $request->estate,
    //             'landmark' => $request->landmark,
    //             'house_no' => $request->house_no,
    //         ]);

    //         if(!$update_user){
    //             DB::rollBack();

    //             return back()->with('error', 'Something went wrong while update user data');
    //         }

    //         DB::commit();
    //         return redirect()->route('users.index')->with('success', 'User Updated Successfully.');


    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         throw $th;
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $delete_user = User::whereId($id)->delete();

    //         if(!$delete_user){
    //             DB::rollBack();
    //             return back()->with('error', 'There is an error while deleting user.');
    //         }

    //         DB::commit();
    //         return redirect()->route('users.index')->with('success', 'User Deleted successfully.');



    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         throw $th;
    //     }
    // }
}
