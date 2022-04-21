<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function store(Request $request)
    {

        $data = $request->all();

        $validation = Validator::make($data, [
            'username' => "required|string",
            'content' => "nullable|text",
            'vote' => "nullable|integer",
            'user_id' => "exists:users,id"
        ]);

        // if ($request->fails()) {
        //     dd($request->errors());
        //     return response()->json([
        //         "success" => false,
        //         "errors" => $request->errors(),
        //         "data" => $data
        //     ], 400);
        // };

        $newReview = new Review();
        $newReview->username = $data['username'];
        $newReview->vote = $data['vote'];
        $newReview->content = $data['content'];
        $newReview->user_id = $data['user_id'];
        $newReview->save();

        return response()->json([
            "success" => true
        ]);
    }

    public function index($userid)
    {
        $review = Review::where('user_id', $userid)->with('user')->get();
        return response()->json($review);
    }
}
