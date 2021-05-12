<?php

namespace App\Http\Controllers;

use App\Models\Poocoin;
use Illuminate\Http\Request;

class PoocoinController extends Controller
{
    public function show($id) {
        $coin = Poocoin::find($id);

        $reddits = $coin->reddits;

        return view("poocoin.show")->with([
            'coin' => $coin,
            'reddits' => $reddits,
        ]);
    }
}
