<?php

namespace App\Http\Controllers;

use App\Models\Poocoin;
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
        $poocoins = Poocoin::orderBy("created_at", "desc")->limit(100)->get();

        return view('home')->with([
            "poocoins" => $poocoins,
        ]);
    }
}
