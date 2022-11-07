<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('admin/roles/index', compact('roles'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('admin/roles/create', compact('permissions'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        $role = Role::create(['name' => $request->name]);
        if( $request->has('permissions'))
            $role->syncPermissions($request->permissions);
        return redirect()->route('admin_roles.index')->with('info', 'Role ' . $role->name . ' creado correctamente');
    }

    public function edit( $id){
        $role = Role::find($id);
        $permissions = Permission::all();
        
        return view('admin/roles/edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:3|max:50',
        ]);

        $role = Role::find($id);
        $role->update(['name' => $request->name]);

        if( $request->has('permissions'))
            $role->syncPermissions($request->permissions);

        return redirect()->route('admin_roles.index')->with('info', 'Role ' . $role->name . ' editado correctamente');
    }
}
