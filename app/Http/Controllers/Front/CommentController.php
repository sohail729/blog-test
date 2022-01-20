<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PostComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $comment = PostComment::create($request->values);
        if($comment){           
            return response()->json(['status' => 200, 'message' => 'Comment Posted!']);
        }
        return response()->json(['status' => 500, 'message' => 'Something wnet wrong!']);

    }
}
