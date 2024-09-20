<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    //This Function for display the all data
    public function index(){
        $roles = Role::with('permissions')->paginate(5);
        return view('superAdmin.RolePermission.showRolePermission', compact('roles'));
    }
    //This function for showing the add permission form
    public function showRolePermissionForm(){
        $roles= Role::all();
        $permissions = Permission::all();
        return view('superAdmin.RolePermission.addRolePermission',compact('roles','permissions'));
    }

    //This function for store the Role-permission Add
    public function storeRolePermission(Request $req)
    {
        $validatedData = $req->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($validatedData['role_id']);

        // Sync the permissions with the role
        $role->permissions()->sync($validatedData['permissions']);

        return redirect()->route('admin.showRolePermission');
    }

    //This function for data sending for edit in role-permission form
    public function editRolePermission($role_id){
        $roleItem = Role::with('permissions')->find($role_id); // Find role by ID with permissions
        if (!$roleItem) {
            return redirect()->route('admin.showRolePermission')->with('error', 'Role not found.');
        }
        $roles = Role::all(); // Fetch all roles
        $permissions = Permission::all(); // Fetch all permissions
        return view('superAdmin.RolePermission.addRolePermission', compact('roleItem', 'roles', 'permissions'));
    }

    //This function is For Update the data and store role in database
    public function updateRolePermission(Request $req, $role_id) {
        $validatedData = $req->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($role_id);

        // Sync the updated permissions with the role
        $role->permissions()->sync($validatedData['permissions']);

        return redirect()->route('admin.showRolePermission');
    }

    //This function use for delete the data
    public function deleteRolePermission($role_id){
        $role = Role::findOrFail($role_id);
        $role->permissions()->detach();

        return redirect()->route('admin.showRolePermission');
    }
}
