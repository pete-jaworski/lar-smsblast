<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSGateController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    
    /**
     * Sends SMS message
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */     
    public function store(Request $request, \App\Helpers\SMSSender $sender)
    {
        
        $this->validate($request, [
            'phones'          => 'required',
            'message'         => 'required',
        ]);        

        $smsMessages = array();
        $today = new \DateTime();
        
        foreach(explode(',', $request->input('phones')) as $phone){
            array_push($smsMessages, array(
                'phoneNumber'   => $phone,
                'message'       => $request->input('message'),
                'valid'         => true     
                )
            );
        }
        
        $sender->send($smsMessages);
        return redirect()->route('gate.index')->with("status", "Wiadomość została wysłana!");
        
    }   
    
    
    /**
     * Displays SMS gate form
     * 
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {
        return view('sms_gate');
    }
}
