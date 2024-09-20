<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //This function for the Showing the role with using Filter data filteration is also there
    public function index(Request $request) {
        $query = Role::query();
        if ($request->filled('filter_role_name')) {
            $query->where('role_name', 'like', '%' . $request->input('filter_role_name') . '%');
        }

        $roles = $query->paginate(7);
        return view('superAdmin.Role.showRole',compact('roles'));
    }

    //This function for showing the add Role form
    public function showRolesForm() {
        return view('superAdmin.Role.addRole');
    }

    //This function for the Role store in database
    public function storeRole(Request $req){
        $req->validate([
            'role_name'=> 'required|string|max:255',
        ]);

        $maxId = Role::max('id');
        $newId = $maxId+1;
        Role::create([
            'id' => $newId,
            'role_name' => $req->role_name,
        ]);
        return redirect()->route('admin.rolePage');
    }

    //This function for data sending for edit in permission form
    public function editRole($id){
        $role = Role::findOrFail($id);
        return view('superAdmin.Role.addRole',compact('role'));
    }

    //This function is For Update the data and store role in database
    public function updateRole(Request $req,$id){
        $req->validate([
            'role_name'=> 'required|string|max:255',
        ]);
        $role =Role::findOrFail($id);
        $role->update([
            'role_name' => $req->role_name,
        ]);
        return redirect()->route('admin.rolePage');
    }

    //This function for delete the role
    public function deleteRole($id){
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.rolePage');
    }

}
