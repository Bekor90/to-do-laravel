<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( new UserCollection(User::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        $show = User::create($validatedData);

        return $show;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( User::findOrFail($id));
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findLastId()
    {
        return response()->json( User::all()->last() );
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findeEmail($email)
    {
        $user =  DB::table('users')->where('email', $email)->first();
        
        return response()->json( [
            'data' => $user 
        ]);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->email =  $request->get('email');
        $user->email_verified_at =  $request->get('email_verified_at');
        $user->password =  $request->get('password');
        $user->remember_token =  $request->get('remember_token');
        $user->created_at =  $request->get('created_at');
        $user->updated_at = $request->get('updated_at');
        $user->save();

        return response()->json([ 
            'status' => 'OK'
        ] );
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
        
        return response()->json([ 
            'status' => 'OK'
        ] );
    }
}
