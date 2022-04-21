<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function getAvailability(Request $request)
    {
        $data = $request->all();

        $filteredUser = User::whereHas('availabilities', function (Builder $query) use ($data) {
            $query->where('name', "=", $data);
        })->with('availabilities', 'categories')->get();
        return response()->json($filteredUser);
    }


    //DA FIXARE CON POSSIBILE ENTRATA DA PARTE DI REQUEST
    // public function getFullName(Request $request)
    // {
    //     $nome = $request->get("name");

    //     if ($nome = []) {
    //         $fullname = implode($nome);
    //         $part = explode(" ", $fullname);

    //         $filteredUser = User::where(function (Builder $query) use ($part) {
    //             $query->where([
    //                 ['name', 'like', $part[0]],
    //                 ['surname', 'like', $part[1]]
    //             ]);
    //         })->with('availabilities', 'categories')->get();
    //         return response()->json($filteredUser);
    //     } else {

    //         $filteredUser = User::where('surname', 'like', $nome)->with('availabilities', 'categories')->get();
    //     }
    // }
}
