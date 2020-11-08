<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adds;
use Illuminate\Pagination\LengthAwarePaginator;

class AddsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        //$adds = Adds::paginate(5);
        $adds = Adds::orderBy('created_at', 'asc')->paginate(4);
        $joins = \DB::table('adds')
            ->join('categories', 'adds.category_id', '=', 'categories.id')
            ->join('users', 'adds.user_id', '=', 'users.id')
            ->select('adds.*', 'users.username', 'categories.category')
            //->select('adds.*', 'categories.category')
            ->paginate(4);
        
        return view('adds.index')
        ->with('adds', $adds)
        ->with('adds', $joins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'description' => 'required', 'price' => 'required', 'image' => 'required']);
        
        $add = new Adds;
        //$add = \Auth::user()->id;
        $add->title = $request->input('title');
        $add->description = $request->input('description');
        $add->price = $request->input('price');
        $add->image = $request->input('image');
        $add->location = $request->input('location');
        $add->category_id = $request->input('category_id');
        $add->user_id = $request->user()->id;
      
        
        
        $add->save();

        return redirect('/home')->with('success', 'your ad have been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $add = Adds::find($id);
        
        //innerjoin
        $join = \DB::table('adds')
            ->join('categories', 'adds.category_id', '=', 'categories.id')
            ->join('users', 'adds.user_id', '=', 'users.id')
            ->select('adds.*', 'users.username', 'categories.category')
            //->select('adds.*', 'categories.Category')
            ->where('adds.id', $id)
            ->get();
        return view('adds.show')
        ->with('add', $add)
        ->with('add', $join);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $add = Adds::find($id);
        return view('adds.edit')->with('add', $add);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['title' => 'required', 'description' => 'required', 'price' => 'required']);

       $add = Adds::find($id);
        if($request->input('image') == NULL)
            {
            $add->title = $request->input('title');
            $add->price = $request->input('price');
            $add->location = $request->input('location');
            $add->category_id = $request->input('category_id');
            $add->description = $request->input('description');
            $add->save();
             } 
        else 
            {
            $add->title = $request->input('title');
            $add->price = $request->input('price');
            $add->location = $request->input('location');
            $add->category_id = $request->input('category_id');
            $add->image = $request->input('image');
            $add->description = $request->input('description');
            $add->save();
            }

        $add->save();

        return redirect('/home')->with('success', 'your ad have been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $add = Adds::find($id);
        $add->delete();
        return redirect('/home')->with('success', 'your ad have been deleted!');
    }

    public function search(Request $request)
    {
        $s = $request->input('s');

        $adds =Adds::latest()
        ->search($s)
        ->paginate(20);
        //innerjoin
        
        $joins = \DB::table('adds')
        ->join('categories', 'adds.category_id', '=', 'categories.id')
        ->join('users', 'adds.user_id', '=', 'users.id')
        ->select('adds.*', 'users.username', 'categories.category')
        //->select('adds.*', 'categories.category')
        
        ->get();
       
      

        return view('/Inc.search-ad', compact('adds','s'))
        ->with('adds', $adds)
        ->with('adds', $joins);
    }
}
