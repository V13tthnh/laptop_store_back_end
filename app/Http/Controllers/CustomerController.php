<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function listDataTableCustomers()
    {
        $customers = User::role('customer')
            ->withCount('orders as total_orders')
            ->withSum('orders as total_order_amount', 'total') // Giả sử `amount` là cột lưu trữ tổng số tiền của hóa đơn
            ->get();
        return Datatables::of($customers)->make(true);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
