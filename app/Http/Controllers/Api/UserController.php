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


    private $musician;
    private $filteredMusician;

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

    public function getAvailability(Request $request)
    {
        $data = $request->get('name');
        $rev = $request->get('rev');

        $this->musician = User::whereHas('availabilities', function (Builder $query) use ($data) {
            $query->where('name', "=", $data);
        })->with('availabilities', 'categories', 'reviews')->get();

        $this->filteredMusician = clone $this->musician; //serve clonare perchè boh l'ho letto su stackoverflow, non sto capendo più un cazzo

        if (null !== $request->get('vote')) {
            $numvote = $request->get('vote');
            $vote = intval($numvote);
            $this->getAvgVote($vote);
        }

        $this->musician = $this->filteredMusician;

        if (null !== ($request->get('rev'))) {
            // dd('dentro');
            $this->getCountReview($rev);
            return response()->json($this->musician);
        }
        return response()->json($this->musician);
    }

    public function getAvgVote($vote)
    {
        $filteredartist = [];
        foreach ($this->filteredMusician as $artist) {
            $sum = 0;
            $count = 0;
            $arrayRev = Review::where("user_id", $artist["id"])->get('vote');
            foreach ($arrayRev as $rev) {
                $sum += $rev['vote'];
                $count++;
            }
            if ($count != 0 && $sum / $count >= $vote) {
                $filteredartist[] = $artist;
            };
        }
        $this->filteredMusician = $filteredartist;
    }



    // public function getCountReview($rev)
    // {
    //     $data = $rev;
    //     if ($data === true) {
    //         $filtered = $this->filteredMusician->join("reviews", "user_id", "=", "reviews.user_id")
    //             ->select(array('users.*', DB::raw('COUNT(`user_id`) as num_rev')))
    //             ->groupBy(DB::raw("CONVERT(users.id, CHAR)"), 'users.id')
    //             ->whereRaw("`users`.id = `reviews`.user_id")
    //             ->orderBy('num_rev', 'desc')->with("availabilities")->get();
    //     }
    // }

    // public function getAvgVote($vote)
    // {
    //     $porcoddio = $this->filteredMusician->join("reviews", "user_id", "=", "reviews.user_id")
    //      ->select(array('users.*', DB::raw('AVG(`vote`) as avg_vote')))
    //      ->groupBy(DB::raw("CONVERT(users.id, CHAR)"), 'users.id')
    //      ->havingRaw("avg_vote BETWEEN ? AND ?", [$vote, 5])
    //      ->whereRaw("`users`.id = `reviews`.user_id")
    //      ->orderBy('avg_vote', 'desc')->with("availabilities", "reviews");
    // }


}
