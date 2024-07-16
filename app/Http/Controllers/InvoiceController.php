<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\Supplier;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controllers\Middleware;
class InvoiceController extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:thêm đơn nhập', only: ['create', 'store']),
            new Middleware(middleware: 'permission:sửa đơn nhập', only: ['edit', 'update']),
        ];
    }

    public function index()
    {
        $pending_status_count = Invoice::where('status', 1)->count();
        $approved_status_count = Invoice::where('status', 2)->count();
        $delivered_status_count = Invoice::where('status', 3)->count();
        $cancel_status_count = Invoice::where('status', 4)->count();
        return view('invoice.index', compact('pending_status_count', 'approved_status_count', 'delivered_status_count', 'cancel_status_count'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $mytime = \Carbon\Carbon::now();
        $currentDate = $mytime->format('d/m/Y');
        return view('invoice.create', compact('suppliers', 'currentDate'));
    }

    public function dataTable()
    {
        $invoices = Invoice::with('supplier')->with('user')->get();
        return Datatables::of($invoices)->addColumn('supplier_name', function ($invoices) {
            return $invoices->supplier->name;
        })->addColumn('user_name', function ($invoices) {
            return $invoices->user->full_name;
        })->make(true);
    }

    public function store(StoreUpdateInvoiceRequest $request)
    {
        $invoice = new Invoice();
        $invoice->supplier_id = $request->supplier_id;
        $invoice->formality = $request->formality;
        $invoice->user_id = Auth::user()->id;
        $invoice->total = 0;
        $invoice->status = 1;
        $invoice->formality = $request->formality;
        $invoice->save();

        $total = 0;

        for ($i = 0; $i < count($request->product_id); $i++) {
            $detail = new InvoiceDetail();
            $detail->invoice_id = $invoice->id;
            $detail->product_id = $request->product_id[$i];
            $detail->quantity = $request->quantity[$i];
            $detail->cost_price = $request->cost_price[$i];
            if (isset($request->profit)) {
                $detail->selling_price = $request->cost_price[$i] * (1 + $request->profit);
            } else {
                $detail->selling_price = $request->cost_price[$i];
            }
            $detail->save();

            $total += $request->total[$i];

            $updateProduct = Product::find($request->product_id[$i]);
            $updateProduct->quantity += $request->quantity[$i];
            $updateProduct->unit_price = $detail->selling_price;
            $updateProduct->supplier_id = $request->supplier_id;
            $updateProduct->save();
        }

        $updateInvoice = Invoice::find($invoice->id);
        $updateInvoice->total = $total;
        $updateInvoice->save();

        return response()->json([
            'success' => 200,
            'message' => "Thêm hóa đơn thành công."
        ]);
    }

    public function show(string $id)
    {
        $invoiceDetails = InvoiceDetail::where('invoice_id', $id)
            ->with(['product.images'])
            ->get();
        $invoice = Invoice::with(['supplier', 'user', 'invoiceDetails'])->find($id);
        return view('invoice.detail', compact('invoice', 'invoiceDetails'));
    }

    public function edit(string $id)
    {
        $invoiceDetails = InvoiceDetail::where('invoice_id', $id)
            ->with(['product.images'])
            ->get();
        $invoice = Invoice::with(['supplier', 'user', 'invoiceDetails'])->find($id);
        $suppliers = Supplier::all();
        $myTime = \Carbon\Carbon::now();

        $profit = 0;

        if (!empty($invoice->invoiceDetails) && isset($invoice->invoiceDetails[0])) {
            $profit = (($invoice->invoiceDetails[0]->selling_price - $invoice->invoiceDetails[0]->cost_price) / $invoice->invoiceDetails[0]->cost_price) * 100;
        }

        return view('invoice.edit', compact('invoice', 'invoiceDetails', 'suppliers', 'profit'));
    }


    public function update(StoreUpdateInvoiceRequest $request, string $id)
    {
        //dd($request);
        $invoice = Invoice::findOrFail($id);
        $invoice->supplier_id = $request->supplier_id;
        $invoice->formality = $request->formality;
        $invoice->user_id = Auth::user()->id;
        $invoice->total = 0;
        $invoice->status = 1;
        $invoice->formality = $request->formality;
        $invoice->save();

        $total = 0;
        InvoiceDetail::where('invoice_id', $id)->delete();

        for ($i = 0; $i < count($request->product_id); $i++) {
            $detail = new InvoiceDetail;
            $detail->invoice_id = $invoice->id;
            $detail->product_id = $request->product_id[$i];
            $detail->quantity = $request->quantity[$i];
            $detail->cost_price = $request->cost_price[$i];
            if (isset($request->profit)) {
                $detail->selling_price = $request->cost_price[$i] * (1 + $request->profit);
            } else {
                $detail->selling_price = $request->cost_price[$i];
            }
            $detail->save();
            if($request->total[$i] == null){
                $total += ($request->cost_price[$i] *  $request->quantity[$i]);
            }else{
                $total += $request->total[$i];
            }


            $updateProduct = Product::find($request->product_id[$i]);
            $updateProduct->quantity = $request->quantity[$i];
            $updateProduct->unit_price = $detail->selling_price;
            $updateProduct->supplier_id = $request->supplier_id;
            $updateProduct->save();
        }

        $updateInvoice = Invoice::findOrFail($id);
        $updateInvoice->total = $total;
        $updateInvoice->save();

        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công"
        ]);
    }


    public function updateStatus(Request $request)
    {
        $invoice = Invoice::findOrFail($request->id);
        $invoice->status = $request->status + 1;
        $invoice->save();
        return response()->json([
            'success' => 200,
            'message' => "Cập nhật thành công",
        ]);
    }

    public function addToInvoice(Request $request)
    {
        $productIds = $request->product_ids;
        $products = Product::with('images')->whereIn('id', $productIds)->get();

        return response()->json([
            'success' => 200,
            'data' => $products
        ]);
    }
}
