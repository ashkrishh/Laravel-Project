<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            return view('post.index');
        }

        return view('user.login');
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
        $attributes = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            return redirect('/posts')->with('success', 'Logged in successfully');
        }

        return back()->withErrors(['email' => 'The provided credentials could not be verified..!']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            auth()->logout();
            return redirect('/')->with('success', 'Logged out successfully');
        } catch (Exception $e) {
            Log::error('Error while logging out : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Could not log out !');
        }
    }
}
