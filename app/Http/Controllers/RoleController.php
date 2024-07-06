<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateRoleRequest;
use Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::with('roles')->OrderBy('id')->get();
        return view('role-permission.role', compact('roles', 'permissions'));
    }

    public function listDataTableRoles()
    {
        $roles = Role::orderByDesc('id')->get();
        return DataTables::of($roles)->make(true);
    }


    public function store(StoreUpdateRoleRequest $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->save();


        $role->asyncPermission($request->permissions);
        return response()->json([
            'success' => 200,
            'message' => 'Thêm thành công'
        ]);
    }

    public function edit(string $id)
    {
        $role = Role::find($id);
        if (empty($role)) {
            return response()->json([
                'success' => 404,
                'message' => "Có lỗi xảy ra"
            ]);
        }
        return response()->json([
            'success' => 200,
            'data' => $role
        ]);
    }

    public function update(StoreUpdateRoleRequest $request, string $id)
    {
        $request->validate([
            'permissions' => 'required'
        ]);

        $permissions = explode(',', $request->permissions); // Chuyển đổi chuỗi thành mảng
        $permissions = array_map('intval', $permissions);

        $role = Role::findOrFail($id);
        $role->syncPermissions($permissions);

        if (empty($role)) {
            return response()->json([
                'success' => 404,
                'message' => "Có lỗi xảy ra"
            ]);
        }

        $role->name = $request->name;
        $role->save();


        return response()->json([
            'success' => 200,
            'message' => 'Cập nhật thành công'
        ]);
    }

    public function destroy(string $id)
    {
        Role::find($id)->delete();

        return response()->json([
            'success' => 200,
            'message' => "Xóa thành công!"
        ]);
    }

    public function addPermission()
    {

    }

    public function assignPermission(Request $request, $id)
    {
        $request->validate([
            'permission' => 'required'
        ]);
        $permissions = [];
        $post_permissions = $request->input('permission');
        foreach ($post_permissions as $key => $val) {
            $permissions[intval($val)] = intval($val);
        }
        dd($permissions);
        $role = Role::findOrFail($id);
        $role->syncPermissions($permissions);

        return response()->json([
            'success' => 200,
            'data' => $role
        ]);
    }
}
