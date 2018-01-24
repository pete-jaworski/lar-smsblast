<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChangeNameController extends Controller
{
    
    public function displayForm()
    {
        return view('auth.change_password');
    }
    

    public function change(Request $request)
    {
        if(!Auth::check()){
            return redirect('login');
        }
        
        $this->validate($request, [
            'password'                  => 'required',
            'password_confirmation'     => 'required'
        ]);
        
        if($request->input('password') != $request->input('password_confirmation')){
            return redirect()->back()->with("status", "Hasła muszą być takie same");
        }
        
        $user = \Illuminate\Support\Facades\Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->f5 = 1;
        $user->save();
        
        return redirect()->back()->with("status", "Hasło zostało zmienione");
    }
}

