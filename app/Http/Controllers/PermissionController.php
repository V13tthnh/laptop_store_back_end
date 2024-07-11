<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePermissionRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:thêm quyền|sửa quyền|xóa quyền', only: ['index', 'store']),
            new Middleware(middleware: 'permission:thêm quyền', only: ['create', 'store']),
            new Middleware(middleware: 'permission:sửa quyền', only: ['edit', 'update']),
            new Middleware(middleware: 'permission:xóa quyền', only: ['destroy']),
        ];
    }
    public function index()
    {
        return view('role-permission.permission');
    }

    public function listDataTablePermissions(){
        $permissions = Permission::orderByDesc('id')->get();
        return Datatables::of($permissions)->make(true);
    }

    public function store(StoreUpdatePermissionRequest $request)
    {
        $permission = new Permission;
        $permission->name = $request->name;
        $permission->save();
        return response()->json([
            'success' => 200,
            'message' => 'Thêm thành công'
        ]);
    }

    public function edit(string $id)
    {
        $permission = Permission::find($id);
        if(empty($permission)){
            return response()->json([
                'success' => 404,
                'message' => "Có lỗi xảy ra"
            ]);
        }
        return response()->json([
            'success' => 200,
            'data' => $permission
        ]);
    }

    public function update(StoreUpdatePermissionRequest $request, string $id)
    {
        $permission = Permission::find($id);
        if(empty($permission)){
            return response()->json([
                'success' => 404,
                'message' => "Có lỗi xảy ra"
            ]);
        }
        $permission->name = $request->name;
        $permission->save();
        return response()->json([
            'success' => 200,
            'message' => 'Cập nhật thành công'
        ]);
    }

    public function destroy(string $id)
    {
        Permission::find($id)->delete();

        return response()->json([
            'success' => 200,
            'message' => "Xóa thành công!"
        ]);
    }

}
