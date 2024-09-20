<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    //This function for the Showing the permission with using Filter data filteration is also there
    public function index(Request $request) {
        $query = Permission::query();

        if ($request->filled('filter_permission_title')) {
            $query->where('permission_title', 'like', '%' . $request->input('filter_permission_title') . '%');
        }

        if ($request->filled('filter_permission_name')) {
            $query->where('permission_name', 'like', '%' . $request->input('filter_permission_name') . '%');
        }

        $permissions = $query->paginate(7);
        return view('superAdmin.Permission.showPermission',compact('permissions'));
    }

    //This function for showing the add permission form
    public function showPermissionForm(){
        return view('superAdmin.Permission.addPermission');
    }

    //This function for the permission store in database
    public function storePermission(Request $req){
        $req->validate([
            'permission_title' => 'required|string|max:255',
            'permission_name' => 'required|string|max:255',
        ]);

        $maxId = Permission::max('id');
        $newId = $maxId + 1;
        Permission::create([
            'id' => $newId,
            'permission_title' => $req->permission_title,
            'permission_name' => $req->permission_name,
        ]);

        return redirect()->route('admin.permissionPage');
    }

    //This function for data sending for edit in permission form
    public function editpermission($id){
        $permission = Permission::findOrFail($id);
        return view('superAdmin.Permission.addPermission', compact('permission'));
    }


    //This function is For Update the data and store permission in database
    public function updatePermission(Request $req, $id){
        $req->validate([
            'permission_title' => 'required|string|max:255',
            'permission_name' => 'required|string|max:255',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update([
            'permission_title' => $req->permission_title,
            'permission_name' => $req->permission_name,
        ]);

        return redirect()->route('admin.permissionPage');
    }

    //This function for delete the permission
    public function deletePermission($id){
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('admin.permissionPage');
    }


}
