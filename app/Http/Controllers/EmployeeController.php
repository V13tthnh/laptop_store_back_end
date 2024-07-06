<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEmployeeRequest;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('employee.index', compact('roles'));
    }

    public function listDataTableUsers()
    {
        $employees = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin')
                ->orWhere('name', 'employee');
        })->get();
        return Datatables::of($employees)->addColumn('roles', function ($row) {
            return $row->roles->pluck('name')->implode(', ');
        })->make(true);
    }

    public function store(StoreUpdateEmployeeRequest $request)
    {

        $request->validate([
            'role' => 'required'
        ]);

        $employee = new User;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file->hashName();
            $path = $file->store('uploads/employees');
            $employee->avatar = $path;
        }

        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->birthday = $request->birthday;
        $employee->gender = $request->gender;
        $employee->phone = $request->phone;
        $employee->status = 1;
        $employee->save();
        $employee->syncRoles($request->role);

        return response()->json([
            'success' => 200,
            'message' => "Thêm thành công"
        ]);
    }

    public function show(string $id)
    {
        $employee = User::findOrFail($id);
        $roles = $employee->roles;
        return view('employee.detail', compact('employee', 'roles'));
    }

    public function edit(string $id)
    {
        $employee = User::with('roles')->findOrFail($id);
        return response()->json([
            'success' => 200,
            'data' => $employee
        ]);
    }

    public function update(StoreUpdateEmployeeRequest $request, string $id)
    {
        $employee = User::find($id);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file->hashName();
            $oldPath = $employee->avatar;
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            $path = $file->store('uploads/employees');
            $employee->avatar = $path;
        }

        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->birthday = $request->birthday;
        $employee->gender = $request->gender;
        $employee->phone = $request->phone;
        $employee->status = $request->status != null ? $request->status : 1;
        $employee->save();
        $employee->syncRoles($request->role);

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công"
        ]);
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => "Xóa thành công!"
        ]);
    }

    public function trash()
    {
        return view('employee.trash');
    }

    public function dataTableTrash()
    {
        $trash = User::onlyTrashed()->get();
        return Datatables::of($trash)->make(true);
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return response()->json([
            'success' => 200,
            'message' => "Khôi phục thành công!"
        ]);
    }
}
