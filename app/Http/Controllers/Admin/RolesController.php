<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin', 'permission:View Roles'])->only(['index', 'show']);
        $this->middleware(['auth:admin', 'permission:Create Roles'])->only(['create', 'store']);
        $this->middleware(['auth:admin', 'permission:Edit Roles'])->only(['edit', 'update']);
        $this->middleware(['auth:admin', 'permission:Delete Roles'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('admin.admins.roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.admins.roles.create', [
            'permissions' => $permissions,
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
        $this->validate($request, [
            'rName' => 'required|unique:roles,name,',
            'permission' => 'required',
        ]);

        $roleName = $request->get('rName');
        $permissions = $request->get('permission');

        $role = Role::create([
            'name' => $roleName,
            'guard_name' => 'admin',
        ]);

        $role->syncPermissions($permissions);
        // $role->revokePermissionTo($permission);

        return redirect()
        ->route('roles.index')
        ->with('message','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = $role;
        $rolePermissions = $role->rolePermissions;

        dd($role, $rolePermissions);

        return view('admin.admins.roles.show',  [
            'role' => $role,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = $role;
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::get();

        return view('admin.admins.roles.edit',  [
            'role' => $role,
            'rolePermissions' => $rolePermissions,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'rName' => 'required|unique:roles,name,'.$role->id,
            'permission' => 'required',
        ]);

        $roleName = $request->get('rName');
        $permissions = $request->get('permission');

        $role->update([
            'name' => $roleName
        ]);

        $role->syncPermissions($permissions);

        return redirect()
        ->route('roles.index')
        ->with('message','Role created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
        ->route('roles.index')
        ->with('message','Role deleted successfully');
    }
}
