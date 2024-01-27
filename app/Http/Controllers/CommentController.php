<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request)
    {

        $auth = auth()->user();

        Comment::create([
            'username' => $auth->name, 
            'comment' => $request->input('comment'), 
            'product_id' => $request->input('productId'), 
            'user_id' => $auth->id
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        Comment::destroy($id);
        return redirect()->back();
    }
}
