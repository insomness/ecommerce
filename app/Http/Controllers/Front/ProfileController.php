<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $userOrders = Order::where('user_id', Auth::id())->with('user')->get();
        return view('front.profile.index', compact('userOrders'));
    }

    public function showOrder($id)
    {
        $order = Order::find($id)->with(['user', 'products', 'orderItems'])->first();
        return view('front.profile.show_order', compact('order'));
    }
}
