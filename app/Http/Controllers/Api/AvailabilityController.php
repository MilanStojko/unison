<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Availability;

class AvailabilityController extends Controller
{
    public function index()
    {
        $availability = Availability::all();
        return response()->json($availability);
    }
}
