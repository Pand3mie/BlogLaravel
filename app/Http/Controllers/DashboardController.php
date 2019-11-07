<?php

namespace App\Http\Controllers;

use App\Jeux;
use App\USer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        $dateMaj = new Carbon(Jeux::max('date_maj'));
        $now = Carbon::now();
        $interval = $dateMaj->diffInDays($now);
        return view('dashboard.index', compact("interval"));
    }


    public function contact()
    {
        return view('dashboard.contact');
    }
}
