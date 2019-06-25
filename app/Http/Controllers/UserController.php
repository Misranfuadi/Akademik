<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_list = User::all();
        $nomor = 0;
        return view('pages.user.index', compact('user_list', 'nomor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.user.create');
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
        $data = $request->all();
        $validasi = Validator::make($data, [
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:100|unique:users',
            'password'  =>  'required|confirmed|min:6',
            'level'     =>  'required|in:admin,operator'
        ]);
        if ($validasi->fails()) {
            return redirect('user/create')->withInput()->withErrors($validasi);
        }

        //hash password
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        Session::flash('flash_message', 'Data user berhasil disimpan.');
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        $user = User::findOrFail($id);
        $data = $request->all();
        $validasi = Validator::make($data, [
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:100|unique:users,email,' . $data['id'],
            'password'  =>  'required|confirmed|min:6',
            'level'     =>  'required|in:admin,operator'
        ]);
        if ($validasi->fails()) {
            return redirect("user/$id/edit")->withErrors($validasi)->withInput();
        }
        if ($request->has('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data = array_except($data, ['password']);
        }
        $user->update($data);
        Session::flash('flash_message', 'Data user berhasil diupdate.');
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        Session::flash('flash_message', 'Data user berhasil dihapus.');
        return redirect('user');
    }
}
