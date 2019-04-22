<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ShowController extends Controller
{
    /*商品一覧*/
    public function list(Request $request)
    {
//        $items = DB::select('select * from products')->simplePaginate(5);
        $items = DB::table('products')->paginate(9);

        $count = DB::table('products')->get();
//        $id = DB::select('select id from products');
        return view('flovis.demo')->with([
            'items' => $items,
            'count' => $count,
        ]);
    }




















    /*商品詳細*/
    public function detail($id)
    {
//        echo var_dump($id);
//        return view('productDetail');

//        $user_id = Auth::id();


        $product = \App\Product::findOrFail($id);

        $productId = \App\Product::find($id);

//        $comments = DB::table('comments')
//            ->join('products','comments.product_id','=','products.id')
//            ->join('users','comments.user_id','=','users.id')
//            ->select(/*'comments.id',*/'users.name','comments.comment','products.id','comments.product_id')
//            ->where('product_id','=',$productId)
////            ->paginate(6);
//            ->get();

        $comments = DB::table('comments')
            ->join('products','comments.product_id','=','products.id')
            ->join('users','comments.user_id','=','users.id')
            ->orderBy('created_at','desc')
            ->select('comments.product_id','comments.comment','users.name','comments.created_at')
            ->get();
//        var_dump($id);


//        $markets = DB::table('markets')
//            ->join('products','markets.id','=','products.market_id')
//            ->select('markets.name','markets.mail','markets.phone','markets.url')
////            ->where('markets.id','=','')
//            ->get();

//        $markets = \App\Market::where('id',$id)->get();

        $markets = DB::table('products')
            ->join('markets','products.market_id','=','markets.id')
            ->where('products.id',$id)
            ->get();




        return view('flovis.productDetail')->with([
            'product' => $product,
            'comments' => $comments,
            'productId' => $productId,
            'id' => $id,
            'markets' => $markets,
        ]);
    }


//    public function comments(Request $request) {
//        $comment = new \App\Product();
//        $comment->comment = $request->comments;
//        $comment->save();
//
//    }





    public function productComments(Request $request,$id) {

        $product = \App\Product::findOrFail($id);

        return view('flovis.productList')->with([
            'product',$product
        ]);
    }

















    /*商品並べ替え*/
    public function sort(Request $request)
    {
        $keyword = $request->keyword;

        $sort = $request->sort;

        if (!empty($keyword) && $sort == "desc") {
            $items = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('created_at', 'desc')
                ->paginate(9);

            $count = DB::table('products')->get();

            return view('flovis.productList')->with([
                'items' => $items,
                'keyword' => $keyword,
                'count' => $count,
                'message' => '新着順',
            ]);

        } elseif (!empty($keyword) && $sort == "asc") {
            $items = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('created_at', 'asc')
                ->paginate(9);

            $count = DB::table('products')->get();

            return view('flovis.productList')->with([
                'items' => $items,
                'keyword' => $keyword,
                'count' => $count,
                'message' => '古い順',
            ]);

        } elseif (!empty($keyword) && $sort == "cheap") {
            $items = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('price', 'asc')
                ->paginate(9);

            $count = DB::table('products')->get();

            return view('flovis.productList')->with([
                'items' => $items,
                'keyword' => $keyword,
                'count' => $count,
                'message' => '安い順',
            ]);

        } elseif (!empty($keyword) && $sort == "expensive") {
            $items = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('price', 'desc')
                ->paginate(9);

            $count = DB::table('products')->get();

            return view('flovis.productList')->with([
                'items' => $items,
                'keyword' => $keyword,
                'count' => $count,
                'message' => '高い順',
            ]);

        } elseif (!empty($keyword) || $sort == "desc") {
            $items = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('created_at', 'desc')
                ->paginate(9);

            $count = DB::table('products')->get();

            return view('flovis.productList')->with([
                'items' => $items,
                'keyword' => $keyword,
                'count' => $count,
                'message' => '新着順',
            ]);

        } elseif (!empty($keyword) || $sort == "asc") {

            $items = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('created_at', 'asc')
                ->paginate(9);

            $count = DB::table('products')->get();

            return view('flovis.productList')->with([
                'items' => $items,
                'keyword' => $keyword,
                'count' => $count,
                'message' => '古い順',
            ]);

        } elseif (!empty($keyword) || $sort == "cheap") {

            $items = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('price', 'asc')
                ->paginate(9);

            $count = DB::table('products')->get();

            return view('flovis.productList')->with([
                'items' => $items,
                'keyword' => $keyword,
                'count' => $count,
                'message' => '安い',
            ]);

        } elseif (!empty($keyword) || $sort == "expensive") {

            $items = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%'.$keyword.'%')
                ->orderby('price', 'desc')
                ->paginate(9);

            $count = DB::table('products')->get();

            return view('flovis.productList')->with([
                'items' => $items,
                'keyword' => $keyword,
                'count' => $count,
                'message' => '高い',
            ]);

        } else {

            $items = DB::table('products')
                ->where('title', 'like', '%' . $keyword . '%')
                ->orwhere('description','like','%' . $keyword . '%')
                ->orderby('created_at', 'asc')
                ->paginate(9);
//            ->get();

            $count = DB::table('products')->get();

            return view('flovis.productList')->with([
                'items' => $items,
                'keyword' => $keyword,
                'count' => $count,
            ]);

        }
    }

}
