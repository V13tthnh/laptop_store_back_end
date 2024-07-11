<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:thêm khách hàng|sửa khách hàng|xóa khách hàng', ['only' => ['index','store']]);
        $this->middleware('permission:thêm khách hàng', ['only' => ['create','store']]);
        $this->middleware('permission:sửa khách hàng', ['only' => ['edit','update']]);
        $this->middleware('permission:xóa khách hàng', ['only' => ['destroy']]);
    }

    public function index()
    {

        return view('employee.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
