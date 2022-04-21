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

    public function getReviewNumber()
    {
        // $user = User::whereHas('reviews', function (Builder $query) {
        //     $query->where("user_id", "=", "reviews.user.id")->count()->sortByDesc();
        // })->get();
        // dd($user);
        // return response()->json($user);
    }
}
