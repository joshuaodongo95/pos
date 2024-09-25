<?php

namespace  App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role', ['only' => ['index']]);
        $this->middleware('permission:create role', ['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:update role', ['only' => ['update','edit']]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::get();
        return view('roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        
        $permissions = Permission::get();
        return view('roles.create',['permissions'=>$permissions]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','unique:roles,name'],
            'permissions.*' => 'required'
        ]);

        $role = new Role; 
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permission);

        return redirect('roles')->with('status','Role Created Successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();
        return view('roles.edit',['role' => $role,'permissions'=>$permissions,'rolePermissions'=>$rolePermissions]);
    }

    public function show(Role $role){

    }
    
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required','string','unique:roles,name,'.$role->id],
            'permissions.*' => 'required'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->syncPermissions($request->permissions);

        return redirect('roles')->with('status','Role Updated Successfully');
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return redirect('roles')->with('status','Role Deleted Successfully');
    }  
}