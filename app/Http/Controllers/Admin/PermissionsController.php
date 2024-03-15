<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $permissions = Permission::orderBy('id','ASC')->paginate(7);

    //     return view('admin.permissions.index', [
    //         'permissions' => $permissions
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.permissions.create');
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
    //         // 'name' => 'required|unique:users,name'
    //         'name' => 'required|unique:permissions,name'
    //     ]);

    //     Permission::create($request->only('name'));

    //     return redirect()->route('permissions.index')
    //         ->withSuccess(__('Permission created successfully.'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(Permission $permission)
    // {
    //     return view('admin.permissions.edit', [
    //         'permission' => $permission
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Permission $permission)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:permissions,name,'.$permission->id
    //     ]);

    //     $permission->update($request->only('name'));

    //     return redirect()->route('permissions.index')
    //         ->withSuccess(__('Permission updated successfully.'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Permission $permission)
    // {
    //     $permission->delete();

    //     return redirect()->route('permissions.index')
    //         ->withSuccess(__('Permission deleted successfully.'));
    // }
}
