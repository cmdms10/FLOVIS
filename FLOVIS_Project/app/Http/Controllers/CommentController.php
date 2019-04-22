<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comments(Request $request) {

        $validateRule = [
            'comment' => 'required|string|regex:/[^ 　]+$/'
        ];

        $this->validate($request,$validateRule);


        $comment = new \App\Comment();
        $comment->user_id = $request->user_id;
        $comment->product_id = $request->product_id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back();

//        return view('flovis.main');
    }
}
