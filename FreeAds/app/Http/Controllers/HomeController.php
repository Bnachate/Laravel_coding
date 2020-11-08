<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Adds;

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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $joins = \DB::table('adds')
            ->join('categories', 'adds.category_id', '=', 'categories.id')
           // ->join('users', 'adds.user_id', '=', 'users.id')
            //->select('adds.*', 'users.username', 'categories.Category')
            ->select('adds.*', 'categories.Category')
            ->where('adds.user_id', $user_id)
            ->get();
        return view('/home')
        ->with('adds', $user->adds)
        ->with('adds', $joins)
        ;
        
    }
    
}
