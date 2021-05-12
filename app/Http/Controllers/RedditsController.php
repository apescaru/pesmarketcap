<?php

namespace App\Http\Controllers;

use App\Models\Reddit;
use Illuminate\Http\Request;

class RedditsController extends Controller
{
    public function unassigned() {

        $unassignedReddits = Reddit::doesntHave("poocoin")->get();

        return view('reddits.unassigned')->with([
            'reddits' => $unassignedReddits,
        ]);
    }
}
