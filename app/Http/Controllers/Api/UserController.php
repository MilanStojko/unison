<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('categories', 'availabilities', 'sponsorships', 'reviews')->get();
        return response()->json($user);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->with('categories', 'availabilities', 'sponsorships', 'reviews')->first();
        return response()->json($user);
    }

    public function getCountReview()
    {
        $user = User::join("reviews", "user_id", "=", "reviews.user_id")
            ->select(array('users.*', DB::raw('COUNT(`user_id`) as num_rev')))
            ->groupBy(DB::raw("CONVERT(users.id, CHAR)"), 'users.id')
            ->whereRaw("`users`.id = `reviews`.user_id")
            ->orderBy('users.id', 'desc')->with("availabilities")->get();
        return response()->json($user);
    }

    public function getAvgVote($minvote)
    {
        $user = User::join("reviews", "user_id", "=", "reviews.user_id")
            ->select(array('users.*', DB::raw('AVG(`vote`) as avg_vote')))
            ->groupBy(DB::raw("CONVERT(users.id, CHAR)"), 'users.id')
            ->havingRaw("avg_vote BETWEEN ? AND ?", [$minvote, 5])
            ->whereRaw("`users`.id = `reviews`.user_id")
            ->orderBy('users.id', 'desc')->with("availabilities")->get();
        return response()->json($user);
    }
}
