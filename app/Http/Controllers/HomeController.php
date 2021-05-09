<?php

namespace App\Http\Controllers;

use App\Models\Reddit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reddits = Reddit::orderBy("original_posted_utc", "desc")->limit(100)->get();

        return view('home')->with([
            "reddits" => $reddits,
        ]);
    }
}
