<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
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

        if ($request->fails()) {
            dd($request->errors());
            return response()->json([
                "success" => false,
                "errors" => $request->errors(),
                "data" => $data
            ], 400);
        };

        $newReview = new Review();
        $newReview->username = $data['username'];
        $newReview->content = $data['content'];
        $newReview->vote = $data['vote'];
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

    public function getCountReview()
    {
        $review = User::join("reviews", "user_id", "=", "reviews.user_id")
            ->select(array('users.*', DB::raw('COUNT(`user_id`) as num_rev')))
            ->groupBy(DB::raw("CONVERT(users.id, CHAR)"), 'users.id')
            ->orderBy('users.id', 'desc')
            ->get();
        return response()->json($review);
    }
}
