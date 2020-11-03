<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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
}
