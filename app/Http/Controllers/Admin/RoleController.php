<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.roles',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.roles_create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit',$role)->with('info','El rol se creo exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $permissionsSelected = $role->permissions;
        $roleId = collect($permissionsSelected)->pluck('pivot.role_id');
        $roleId = $roleId[0];
        $roleName = Role::find($roleId)->name;
        // $permissionsSelected = $role->getAllPermissions();
        // $permissionsSelected = $role->getPermissionNames();
        return view('admin.roles.roles_edit', compact('permissionsSelected','permissions','roleName','roleId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit',$role)->with('info','El rol se actualizo exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('info','El rol se Elimino exitosamente');

    }
}
