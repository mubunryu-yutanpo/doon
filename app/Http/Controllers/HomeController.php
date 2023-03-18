<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Drill;
use App\Problem;
use App\Http\Requests\ValidRequest;
use App\Http\Requests\UserValidRequest;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //一覧ページへ
    public function index(){
        $drills = DB::table('drills')->paginate(10);
        
        return view('quiz/index', compact('drills'));
    }


}
