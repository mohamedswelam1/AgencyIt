<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateUser;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show all users
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return  UserResource::collection($users);
    }
   
    /**
     * Store a new user 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(ValidateUser $request)
    {
        $validateData = $request->validated();
        $user = User::create([
            'name'=>$validateData['name'],
            'email'=>$validateData['email'],
            'password'=> bcrypt($validateData['password']),
        ]);
        return  new UserResource($user);
    }

    /**
     * Update the specified User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUser $request,$id)
    {
        $user = User::findorfail($id);
        $validateData = $request->validated();
        $user->update($validateData);
        return new UserResource($user);
    }
        /**
     * Display the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        return new UserResource($user);
    }
        /**
     * Delete the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return response('user has been deleted',200);
    }
    /**
     * Assign User As Reviewer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignAsReviewer($id)
    {
        $user = User::findorfail($id);
        $user->is_reviewer = true ;
        $user->save();
        return new UserResource($user);
    }
}
