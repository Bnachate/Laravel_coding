<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return redirect('admin/users');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::latest()->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required | string | min:2 | max:255',
            'lastName' => 'required | string | min:2 | max:255',
            'username' => 'required | string | min:2 | max:255 | unique:users',
            'phone' => 'required | digits_between:10,12 | starts_with:0,+',
            'email' => 'required | email | unique:users',
            'password' => 'required | string | min:8 | confirmed',
        ]);
        
        User::create([
            'first_name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'username' => $request['username'],
            'phone_number' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/admin/users')->with('success', 'User added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUser $adminUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    // AdminUser $adminUser
    {
        if (Auth::user()->id == $id) {
            return redirect()->back()->with('warning', 'You are not allowed to edit yourself.');
        }
        return view('admin.users.edit')->with('users', User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user == $id) {
            return redirect()->back()->with('warning', 'You are not allowed to edit yourself.');;
        }

        if ($user){
            $validate = null;
            if (($user->email === $request['email']) && ($user->username === $request['username'])) {
                $validate = $request->validate([
                    'firstName' => 'required | min:2',
                    'lastName' => 'required | min:2',
                    'username' => 'required | min:2',
                    'phone' => 'required | digits_between:10,12',
                    'email' => 'required | email'
                ]);
            } else {
                $validate = $request->validate([
                    'firstName' => 'required | min:2',
                    'lastName' => 'required | min:2',
                    'username' => 'required | min:2 | unique:users',
                    'phone' => 'required | digits_between:10,12 | starts_with:0,+',
                    'email' => 'required | email | unique:users'
                ]);
            }

            if ($validate) {
                if ($request->filled('password')) {
                    $user->first_name = $request['firstName'];
                    $user->last_name = $request['lastName'];
                    $user->username = $request['username'];
                    $user->phone_number = $request['phone'];
                    $user->email = $request['email'];
                    $user->password = bcrypt($request['password']);
                    $user->save();
                } else {
                    $user->first_name = $request['firstName'];
                    $user->last_name = $request['lastName'];
                    $user->username = $request['username'];
                    $user->phone_number = $request['phone'];
                    $user->email = $request['email'];
                    $user->save();
                }
                

                $request->session()->flash('success', 'UserDetails updated successfully!');
                return redirect('/admin/users');
            } else {
                return redirect()->back();
            }
        }
        else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->back()->with('warning', 'You are not allowed to delete yourself.');
        }

        User::destroy($id);
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
