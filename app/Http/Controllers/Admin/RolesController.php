<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $roles = Role::orderBy('id','ASC')->paginate(7);
    //     return view('admin.roles.index',compact('roles'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $permissions = Permission::get();
    //     return view('admin.roles.create', compact('permissions'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required|unique:roles,name',
    //         'permission' => 'required',
    //     ]);

    //     $role = Role::create(['name' => $request->get('name')]);
    //     $role->syncPermissions($request->get('permission'));

    //     return redirect()->route('roles.index')
    //                     ->with('success','Role created successfully');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Role $role)
    // {
    //     $role = $role;
    //     $rolePermissions = $role->permissions;

    //     return view('admin.roles.show', compact('role', 'rolePermissions'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(Role $role)
    // {
    //     $role = $role;
    //     $rolePermissions = $role->permissions->pluck('name')->toArray();
    //     $permissions = Permission::get();
    //     // dd($role, $rolePermissions, $permissions);

    //     return view('admin.roles.edit', compact('role', 'rolePermissions', 'permissions'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Role $role)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'permission' => 'required',
    //     ]);

    //     $role->update($request->only('name'));

    //     $role->syncPermissions($request->get('permission'));

    //     return redirect()->route('roles.index')
    //                     ->with('success','Role updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request)
    // public function destroy(Role $role)
    // {
    //     $role->delete();

    //     return redirect()->route('roles.index')
    //                     ->with('success','Role deleted successfully');
    // }
}
