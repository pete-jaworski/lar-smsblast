<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware(array('auth','isAdmin'));        
    }
    
    /**
     * Displays Listing of Users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users')->with('users', \App\User::all());
    }
 
    /**
     * Removes User by id
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\User::find($id)->delete();
        return redirect()->route('users.index')->with('status','Użytkownik został usunięty');        
    }    
    
    
    /**
     * Displays Edit Form
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $roles = \App\Role::All();
      $user  = \App\User::find($id);
      return view('user_edit', compact('user','roles'));
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
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required'
        ]);
        
        \DB::select("DELETE FROM user_roles WHERE user_id = ".$id);
        
        $user = \App\User::find($id);

        foreach($request->input('role_id') as $role){
            $user->roles()->attach($role);             
        }

        $user->update($request->all());
        
        return redirect()->route('users.index')->with('status','Użytkownik został zaktualizowany');
    }
  

}
