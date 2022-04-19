<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $user = User::with('categories', 'availabilities', 'sponsorships')->get();
        return response()->json($user);
    }

    public function show($slug)
    {

        $user = User::where('slug', $slug)->with('categories', 'availabilities', 'sponsorships')->first();
        return response()->json($user);
    }
}
