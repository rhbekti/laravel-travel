<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index', [
            'title' => 'Roles',
            'roles' => Role::with('permissions')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|unique:roles,name,id,id'
        ]);

        Role::create(['name' => $request->role_name]);

        flash('Role has created');

        return redirect()->to('roles');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', [
            'title' => 'Update Permission',
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        flash('Role has deleted!');

        return redirect()->to('roles');
    }
}
