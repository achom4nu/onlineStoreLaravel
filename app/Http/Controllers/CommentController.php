<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CommentController extends Controller
{
    /*public function show(){
        $viewData = [];
        $comment = Comment::all();

        $viewData["comment"] = $comment;
        return view('product.show')->with("viewData", $viewData);
    }*/

    public function store(Request $request)
    {
        Comment::validate($request);

        /*Comment::create([
            'username' => $request->input('username'),
            'comment' => $request->input('comment'),
            'product_id' => $request->input('productId'),
            'user_id' => $request->input('userId'),
        ]);*/

        $newComment = new Comment();
        $newComment->setUserName($request->input('username'));
        $newComment->setComment($request->input('comment'));
        $newComment->setProductId($request->input('productId'));
        $newComment->setUserId($request->input('userId'));

        $newComment->save();

        $viewData = [];
        $viewData["comments"] = Comment::all(); 
        return redirect()->route('product.show')->with("viewData", $viewData);

    }

    public function delete($id)
    {
        Comment::destroy($id);
        return back();
    }
}
