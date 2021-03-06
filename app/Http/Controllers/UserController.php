<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('profils.profil');
    }

    public function save(Request $request)
    {
        //return view('users.createUser');
    }

    public function userSend(Request $request)
    {
        //dd($request->all());
        $user = new User();

        $user->pseudo = $request->pseudo;
        $user->firstname = $request->firstname;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = encrypt($request->password);
        $user->campus_id = $request->campus;
        $user->photo = $request->photo;
        $user->save();
        return view('profils.profil');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $inputs = array_merge($request->all(), ['password' => bcrypt($request->password)],
       ['campus_id' => $request->campus()->id]);
       $this->userRepository->store($inputs);
       return redirect()->route('dashboard');
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
    public function edit($id)
    {
        //
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
        // $user = new User();

        // $user->pseudo = $request->pseudo;
        // $user->firstname = $request->firstname;
        // $user->name = $request->name;
        // $user->phone = $request->phone;
        // $user->email = $request->email;
        // $user->password = encrypt($request->password);
        // $user->campus_id = $request->campus;
        // $user->photo = $request->photo;
        // $user->save();
        // return view('profils.profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
