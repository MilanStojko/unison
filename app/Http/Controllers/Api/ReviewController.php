<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $validation = [
        'username' => "required|string",
        'content' => "nullable|text",
        'vote' => "nullable|integer",
        'user_id' => "exists:users,id"
    ];

    public function store(Request $request)
    {

        $request->validate($this->validation);

        $data = $request->all();

        if ($request->fails()){
            dd($request->errors());
            return response()->json([
                "success" => false,
                "errors" => $request->errors(),
                "data" => $data            
            ], 400);
        };

        $newReview = new Review();
        $newReview->username = $data ['username'];
        $newReview->content = $data ['content'];
        $newReview->vote = $data ['vote'];
        $newReview->post_id = $data ['post_id'];
        $newReview->save();

        return response()->json([
            "success" => true
        ]);
    }
}
