<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adds;


class AddsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adds = Adds::orderBy('created_at', 'asc')->paginate(5);
        $joins = \DB::table('adds')
            ->join('categories', 'adds.category_id', '=', 'categories.id')
            //->join('users', 'adds.id', '=', 'users.user_id')
            //->select('adds.*', 'users.nickname', 'categories.category')
            ->select('adds.*', 'categories.category')
            ->get();
        
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
        $this->validate($request, ['title' => 'required', 'description' => 'required']);

        $add = new Adds;
        $add->title = $request->input('title');
        $add->description = $request->input('description');
        $add->price = $request->input('price');
        $add->image = $request->input('image');
        $add->location = $request->input('location');
        $add->category_id = $request->input('category_id');
      
        
        
        $add->save();

        return redirect('/adds')->with('success', 'Votre article a été crée');
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
            //->join('users', 'adds.id', '=', 'users.user_id')
            //->select('adds.*', 'users.nickname', 'categories.category')
            ->select('adds.*', 'categories.category')
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
        $this->validate($request, ['title' => 'required', 'description' => 'required']);

        $add = Adds::find($id);
        $add->title = $request->input('title');
        $add->description = $request->input('description');
        $add->price = $request->input('price');
        $add->location = $request->input('location');
        $add->image = $request->input('image');
        $add->category_id = $request->input('category_id');
        
        
        $add->save();

        return redirect('/adds')->with('success', 'Votre article a été modifié');
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
        return redirect('/adds')->with('success', 'Votre article a bien été supprimé!');
    }
}
