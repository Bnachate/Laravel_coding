<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        
        if ($user) {
            return view('profile.user')->with('user', $user);
        }
        else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user){
                return view('profile.user')->with('user', $user);
            }
            else {
                return redirect()->back();
            }
        }
        else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user){
            $validate = null;
            if ((Auth::user()->email === $request['email']) && (Auth::user()->username === $request['username'])) {
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
                $user->first_name = $request['firstName'];
                $user->last_name = $request['lastName'];
                $user->username = $request['username'];
                $user->phone_number = $request['phone'];
                $user->email = $request['email'];
                $user->save();

                $request->session()->flash('success', 'Details updated successfully!');
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        }
        else {
            return redirect()->back();
        }
    }

    public function passwordUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user){
            $validate = null;
            if (Hash::check($request['currentPassword'], $user->password)) {
                $validate = $request->validate([
                    'newPassword' => 'required | min:8',
                    'newPasswordConfirm' => 'required | min:8'
                ]);

                if ($validate) {
                    if ($request['newPassword'] == $request['newPasswordConfirm']) {
                        $user->password = Hash::make($request['newPassword']);
                        $user->save();
    
                        $request->session()->flash('successPwd', 'Password updated successfully!');
                        return redirect()->back();
                    } else {
                        // TODO
                    }
                } else {
                    // TO DO
                }
            } else {
                $request->session()->flash('errorPwd', 'The entered password does not match your current password!');
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/login')->with('success', 'Profile deleted successfully!');
    }
}