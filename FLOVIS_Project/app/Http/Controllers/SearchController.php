<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function getuser()
    {

//        $users = \App\User::get();

//        $users = DB::table('users')->get();
//
//        return view('flovis.hoge.search')->with([
//            'users' => $users,
//        ]);

    }

    public function getindex(Request $request)
    {

        $keyword = $request->keyword;

        $data = $request->hoge;



        if (!empty($keyword) && $data == "desc") {
            $products = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('created_at', 'desc')
                ->paginate(9)->get();

            return view('flovis.hoge.search')->with([
                'products' => $products,
                'keyword' => $keyword,
                'data' => $data,
                'message' => '新着順',
            ]);

//            if ($data == "desc") {
//                $products = DB::table('products')
//
//                return view('flovis.hoge.search')->with([
//                    'products' => $products,
////                    'message' => '成功！！！！！',
//
//                ]);
//            } else {
//                $products = DB::table('products')
//                    ->orderby('created_at', 'asc')
//                    ->get();
//
//                return view('flovis.hoge.search')->with([
//                    'products' => $products,
////                    'message' => 'ばーーーーーか',
//                ]);
//            }

        }elseif (!empty($keyword) && $data == "asc") {
            $products = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('created_at', 'asc')
                ->paginate(9);

            return view('flovis.hoge.search')->with([
                'products' => $products,
                'keyword' => $keyword,
                'data' => $data,
                'message' => '古い順',
            ]);
        } elseif(!empty($keyword) || $data == "desc"){
            $products = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('created_at', 'desc')
                ->paginate(9);

            return view('flovis.hoge.search')->with([
                'products' => $products,
                'keyword' => $keyword,
                'data' => $data,
                'message' => '新着順',
            ]);

        } elseif(!empty($keyword) || $data == "asc"){
            $products = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('created_at', 'asc')
                ->paginate(9);

            return view('flovis.hoge.search')->with([
                'products' => $products,
                'keyword' => $keyword,
                'data' => $data,
                'message' => '古い順',
            ]);

        } else {

//            $data = $request->input('hoge');
//
//            if ($data == "desc") {
//                $products = DB::table('products')
//                    ->orderby('created_at', 'desc')
//                    ->get();
//
//                return view('flovis.hoge.search')->with([
//                    'products' => $products,
////                    'message' => '成功！！！！！',
//
//                ]);
//            } else {
//                $products = DB::table('products')
//                    ->orderby('created_at', 'asc')
//                    ->get();
//
//                return view('flovis.hoge.search')->with([
//                    'products' => $products,
////                    'message' => 'ばーーーーーか',
//                ]);
//            }
            $products = DB::table('products')
                ->paginate(9);

            return view('flovis.hoge.search')->with([
                'products' => $products,
                'keyword' => $keyword,
                'data' => $data,
                'message' => 'どちらでもない',
            ]);


        }


//        var_dump($data);




//        $products = Product::get();
    }


//    public function asc()
//    {
//
//        $products = DB::table('products')
//            ->orderBy('updated_at', 'asc')
//            ->paginate(9);
//
//        return view('flovis.hoge.search')->with([
//            'products' => $products,
////            'count' => $count,
//        ]);
//
//    }

//    public function desc()
//    {
//        $products = DB::table('products')
//            ->orderBy('updated_at', 'desc')
//            ->paginate(9);
//
//        return view('flovis.hoge.search')->with([
//            'products' => $products,
//        ]);
//    }


//    public function change(Request $request) {
//        $message = $request;
//
//        var_dump($message);
//
//        if($message == "asc"){
//            $products = DB::table('products')
//                ->orderBy('updated_at', 'asc')
//                ->paginate(9);
//            return redirect()->route('change')->with([
//                'products' => $products,
//            ]);
//
//        }elseif ($message == "desc") {
//            $products = DB::table('products')
//                ->orderBy('updated_at', 'desc')
//                ->paginate(9);
//
//            return redirect()->route('change')->with([
//                'products' => $products,
//            ]);
//
//        }else {
//            $products = DB::table('products')->get();
//
//
//            return view('flovis.hoge.search')->with([
//                'products' => $products,
//                'message' => $message,
//            ]);
//        }
//
////        var_dump($last);
//
////        return view('flovis.hoge.search')->with([
//////            'products' => $products,
////            'last' => $last,
////        ]);
//    }


    public function change(Request $request)
    {

//        var_dump($request);


    }


}
