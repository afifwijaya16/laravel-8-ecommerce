<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $order = Order::where('status', '1')->orderBy('created_at', 'desc')->get();
        $dataTransaction = 'active';
        return view('admin/transaction/order/index', compact('order','dataTransaction'));
    }

    public function show($id) 
    {
        $order = Order::findorfail($id);
        $orderDetail = OrderDetail::where('order_id', $id)->get();
        $dataTransaction = 'active';
        return view('admin.transaction.order.show', compact('order', 'orderDetail', 'dataTransaction'));
    }
}
