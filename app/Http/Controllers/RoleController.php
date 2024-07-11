<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateRoleRequest;
use Request;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:thêm vai trò|sửa vai trò|xóa vai trò', only: ['index', 'store']),
            new Middleware(middleware: 'permission:thêm vai trò', only: ['create', 'store']),
            new Middleware(middleware: 'permission:sửa vai trò', only: ['edit', 'update']),
            new Middleware(middleware: 'permission:xóa vai trò', only: ['destroy']),
        ];
    }

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
        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($permissions);
        }

        return response()->json([
            'success' => 200,
            'message' => 'Thêm thành công.'
        ]);
    }

    public function edit(string $id)
    {
        $role = Role::with('permissions')->find($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        if (empty($role)) {
            return response()->json([
                'success' => 404,
                'message' => "Có lỗi xảy ra"
            ]);
        }
        return response()->json([
            'success' => 200,
            'data' => $role,
        ]);
    }

    public function update(StoreUpdateRoleRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($permissions);
        }
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
