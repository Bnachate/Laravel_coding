<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adds;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAddsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.adds.index')->with('adds', Adds::latest()->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'price' => 'required', 'location' => 'required',
                                   'category_id' => 'required', 'image' => 'required','description' => 'required'
                                   ]);

        $add = new Adds;
        $add->title = $request->input('title');
        $add->price = $request->input('price');
        $add->location = $request->input('location');
        $add->category_id = $request->input('category_id');
        $add->image = $request->input('image');
        $add->description = $request->input('description');
        $add->save();

        return redirect('/admin/adds')->with('success', 'Add created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminAdds  $adminAdds
     * @return \Illuminate\Http\Response
     */
    public function show(AdminAdds $adminAdds)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminAdds  $adminAdds
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.adds.edit')->with('adds', Adds::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminAdds  $adminAdds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['title' => 'required', 'price' => 'required', 'location' => 'required',
                                   'category_id' => 'required','description' => 'required'
                                   ]);

        $add = Adds::find($id);
        if($request->input('image') == NULL)
        {
            $add->title = $request->input('title');
            $add->price = $request->input('price');
            $add->location = $request->input('location');
            $add->category_id = $request->input('category_id');
            $add->description = $request->input('description');
            $add->save();
        } else {
            $add->title = $request->input('title');
            $add->price = $request->input('price');
            $add->location = $request->input('location');
            $add->category_id = $request->input('category_id');
            $add->image = $request->input('image');
            $add->description = $request->input('description');
            $add->save();
        }
        

        return redirect('/admin/adds')->with('success', 'Add edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminAdds  $adminAdds
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Adds::destroy($id);
        return redirect()->back()->with('success', 'Add deleted successfully!');
    }
}
