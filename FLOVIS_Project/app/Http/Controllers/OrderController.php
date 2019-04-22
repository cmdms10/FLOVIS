<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {

        $id = Auth::id();

//        $contents = DB::table('orders')->get();

        $products = DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->join('users','orders.user_id','=','users.id')
            ->join('markets','products.market_id','=','markets.id')
            ->orderBy('created_at','desc')
            ->select('users.id','products.id','products.title','products.price','orders.qty','orders.created_at','products.main_image','orders.firstZip','orders.lastZip','markets.name')
            ->where('user_id',$id)
            ->paginate(6);

        $qty = DB::table('orders')
            ->where('qty')
            ->get();

        $prices = DB::table('products')
            ->join('orders','products.id','=','orders.product_id')
            ->select('products.id','products.title','orders.qty','orders.created_at','products.price','orders.user_id')
            ->get();

        $buyers = \App\Order::where('user_id',$id)->get();

//        $orders = DB::table('orders')
//            ->join('products','orders.product_id','=','products.id')
//            ->where('product_id','=','products.id')
//            ->get();




        return view('flovis.orderhistory')->with([
            'id' => $id,
//            'orders' => $orders,
            'products' => $products,
            'qty' => $qty,
            'buyers' => $buyers,
            'prices' => $prices,
        ]);
    }
}
