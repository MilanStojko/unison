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

        $newMessage = new Message();
        $newMessage->email = $data['email'];
        $newMessage->content = $data['content'];
        $newMessage->cellphone = $data['cellphone'];
        $newMessage->name = $data['name'];
        $newMessage->surname = $data['surname'];
        $newMessage->user_id = $data['user_id'];
        $newMessage->save();

        return response()->json([
            "success" => true
        ]);
    }

    public function index($userid)
    {
        $message = Message::where('user_id', $userid)->with('user')->get();
        return response()->json($message);
    }
}
