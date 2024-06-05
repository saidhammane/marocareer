<?php

namespace App\Http\Controllers;

use App\Models\EmailSubscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //hello
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataEmailSubscriptions = DB::table('email_subscriptions')->select('id', 'email', 'created_at')->orderBy('created_at', 'desc')->get();
        // print_r($data);
        return view('home', ['dataEmailSubscriptions' => $dataEmailSubscriptions]);
    }
}