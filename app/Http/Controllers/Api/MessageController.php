<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $validation = Validator::make($data, [
            'email' => "required|string",
            'content' => "required|text",
            'cellphone' => "nullable",
            'name' => "required|string",
            'surname' => "required|string",
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

        $newReview = new Message();
        $newReview->email = $data['email'];
        $newReview->content = $data['content'];
        $newReview->cellphone = $data['cellphone'];
        $newReview->name = $data['name'];
        $newReview->surname = $data['surname'];
        $newReview->user_id = $data['user_id'];
        $newReview->save();

        return response()->json([
            "success" => true
        ]);
    }

    public function index($userid)
    {
        $review = Message::where('user_id', $userid)->with('user')->get();
        return response()->json($review);
    }
}
