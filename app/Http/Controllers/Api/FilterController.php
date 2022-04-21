<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function getAvailability($availability_id)
    {

        $filteredUser = User::whereHas('availabilities', function (Builder $query) use ($availability_id) {
            $query->where('availability_id', $availability_id);
        })->with('availabilities', 'categories')->get();
        return response()->json($filteredUser);
    }

    public function getFullName($nome)
    {

        $part = explode(" ", $nome);

        if (count($part) == 1) {
            $filteredUser = User::where('surname', 'like', $part[0])->with('availabilities', 'categories')->get();
        } else {
            $filteredUser = User::where(function (Builder $query) use ($part) {
                $query->where([
                    ['name', 'like', $part[0]],
                    ['surname', 'like', $part[1]]
                ]);
            })->with('availabilities', 'categories')->get();
        }
        return response()->json($filteredUser);
    }
}
