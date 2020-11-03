<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $sales = Order::where('status', '2')->orderBy('created_at', 'desc')->get();
        $dataTransaction = 'active';
        return view('admin/transaction/sales/index', compact('sales','dataTransaction'));
    }
}
