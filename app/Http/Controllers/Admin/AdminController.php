<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $admins = Admin::orderBy('id', 'ASC')->paginate(7);

    //     return view('admin.admins.index')->with([
    //         'admins' => $admins
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $admins = Admin::all();
    //     return view('admin.admins.create', compact('admins'));
    // }

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
    //         return redirect()->route('admins.users.index')->with('success', 'User Stored Successfully.');


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
    // public function show($id)
    // {
    //     $admins = Admin::where('id', $id)->first();
    //     // dd($admins);

    //     return view('admin.admins.show')->with([
    //         'admins' => $admins
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $admins =  Admin::whereId($id)->first();

    //     if(!$admins){
    //         return back()->with('error', 'admins Not Found');
    //     }

    //     return view('admin.admins.edit')->with([
    //         'admins' => $admins
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email'
    //     ]);
        
    //     try {
    //         DB::beginTransaction();
    //         // Logic For Save User Data

    //         $update_user = User::where('id', $id)->update([
    //             'name' => $request->name,
    //             'email' => $request->email
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
