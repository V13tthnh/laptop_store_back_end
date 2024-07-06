<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePermissionRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
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
