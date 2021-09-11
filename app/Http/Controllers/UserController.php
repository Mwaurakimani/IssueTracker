<?php

namespace App\Http\Controllers;

use App\Models\User;
use Redirect;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('App.Back.Users.user')->with([
            'users' => $users
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('App.Back.Users.user-Form')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'title' => 'required|string',
        ]);

        $user1 = \App\Models\User::find($id);


//        check if email is unique
        $user2 = \App\Models\User::where('email', $request->email)->get();

        if (($user1->email == $user2[0]->email) && ($user1->id == $user2[0]->id)) {
            //not updating the email
            $user1->email = $request->email;
        } else if ((count($user2) > 0) && ($user1->id != $user2[0]->id)) {
            return Redirect::back()->withErrors(['Email is already taken']);
        } else {
            $user1->email = $request->email;
        }

        $user1->name = $request->name;
        $user1->title = $request->title;
        $user1->save();

        return Redirect::back()->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resetPassword(Request $request)
    {
        $id = $request->id;

        $user = User::find($id);
        $password_default = "Password";

        $user->password = bcrypt("defaultPassword");

        $user->save();

        return [
            'Message'=>"Password reset successfully"
        ];
    }
}
