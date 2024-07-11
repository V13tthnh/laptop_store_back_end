<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{

    public function shipped(){
        $order = Order::with(['products.firstImage', 'address'])->find(1);
        return view('emails.orders.shipped', compact('order'));
    }
    public function index()
    {
        $totalOrders = $this->totalCompletedOrders();
        $totalProducts = $this->totalProductCost();
        $totalProfit = $this->getTotalProfit();
        $totalCustomers = $this->totalCustomers();
        $bestSellingProducts = $this->getTopSellingProducts();
        $totalQuantityProductSold = $this->getTotalQuantityProductSold();
        $totalOrders = $this->getTotalOrders();
        $newCustomers = $this->getNewCustomerRegister();
        $newOrders = $this->getNewOrdersList();
        $totalProductInventory = $this->getTotalQuantityProduct();
        return view(
            'dashboard.index',
            compact(
                'totalOrders',
                'totalProducts',
                'totalProducts',
                'totalCustomers',
                'bestSellingProducts',
                'totalQuantityProductSold',
                'totalProductInventory',
                'newCustomers',
                'newOrders',
                'totalOrders',
            )
        );
    }

    public function totalCompletedOrders()
    {
        $total = Order::where('status', Order::STATUS_COMPLETED)->sum('total');

        return $total;
    }

    public function totalProductCost()
    {
        $totalCost = Invoice::sum('total');

        return $totalCost;
    }

    public function totalCustomers()
    {
        $customerCount = User::with('roles')->get()->filter(
            fn($user) => $user->roles->where('name', 'customer')->toArray()
        )->count();

        return $customerCount;
    }

    public function totalRevenue()
    {
        $totalRevenue = Order::sum('total') - Invoice::sum('total');

        return $totalRevenue;
    }

    public function getTotalProfit()
    {
        $totalProfit = DB::table('orders')
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->join('invoice_details', 'order_product.product_id', '=', 'invoice_details.product_id')
            ->where('orders.status', 5)
            ->select(DB::raw('SUM((order_product.price - invoice_details.cost_price) * order_product.quantity) as total_profit'))
            ->first();

        return $totalProfit;
    }

    private function getTopSellingProducts()
    {
        $topSellingProducts = Product::select('products.id', 'products.name', 'products.unit_price', 'images.url as image', DB::raw('SUM(order_product.quantity) as total_quantity'))
            ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->join('orders', function ($join) {
                $join->on('order_product.order_id', '=', 'orders.id')
                    ->where('orders.status', '=', 5);
            })
            ->join(DB::raw('(SELECT product_id, MIN(id) as image_id FROM images GROUP BY product_id) as pi'), function ($join) {
                $join->on('products.id', '=', 'pi.product_id');
            })
            ->join('images', 'pi.image_id', '=', 'images.id')
            ->groupBy('products.id', 'products.name', 'products.unit_price', 'images.url')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();

        return $topSellingProducts;
    }

    private function getTotalQuantityProductSold()
    {
        $totalQuantitySold = OrderProduct::join('orders', 'order_product.order_id', '=', 'orders.id')
            ->where('orders.status', '=', 5)
            ->sum('order_product.quantity');

        return $totalQuantitySold;
    }

    private function getTotalQuantityProduct()
    {
        $totalInventory = Product::sum('quantity');
        return $totalInventory;
    }

    private function getNewOrdersList()
    {
        $latestOrders = Order::orderBy('created_at', 'desc')->take(10)->get();
        return $latestOrders;
    }

    private function getNewCustomerRegister()
    {
        $latestCustomers = User::orderBy('created_at', 'desc')->take(10)->get();
        return $latestCustomers;
    }

    private function getTotalOrders()
    {
        $totalOrders = Order::where('status', 5)->count();
        return $totalOrders;
    }



    public function getOrderStatusSummary()
    {
        $statuses = Order::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        return response()->json($statuses);
    }

    // public function getRevenueData()
    // {
    //     $orders = Order::where('status', 5) // Đã thanh toán
    //         ->selectRaw('DATE(created_at) as date, SUM(total) as revenue')
    //         ->groupBy('date')
    //         ->orderBy('date')
    //         ->get()
    //         ->map(function ($order) {
    //             return [
    //                 'date' => Carbon::parse($order->date)->format('d-m-Y'),
    //                 'revenue' => number_format($order->revenue, 0, ',', '.') . ' đ'
    //             ];
    //         });

    //     return response()->json($orders);
    // }

    public function getRevenueData(Request $request)
    {
        $startDate = \Carbon\Carbon::parse($request->start_date)->format('Y-m-d');
        $endDate = \Carbon\Carbon::parse($request->end_date)->format('Y-m-d');
        //dd($request->all());
        $orders = Order::where('status', 5)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(total) as revenue')
            ->groupBy('date')
            ->orderBy('date')
            ->get();


        $orders->transform(function ($order) {
            $order->date = Carbon::parse($order->date)->format('d-m-Y');
            $order->revenue = number_format($order->revenue, 0, ',', '.') . ' đ';
            return $order;
        });

        return response()->json($orders);
    }
}
