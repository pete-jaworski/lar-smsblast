<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $today = new \DateTime();
//        echo $today->format('d-m-Y');
//        
//        echo "Dzień tygodnia: ".$today->format('l').'<br>';
//        echo "Dzień miesiąca: ".$today->format('d').'<br>';
//        echo "Dzień i miesiąc roku: ".$today->format('d-m').'<br>';        
//        
//        $tasks = array(
//            array('name' => 'Task #1', 'schedule' => 'l', 'date' => 'Wednesday'),
//            array('name' => 'Task #2', 'schedule' => 'd', 'date' => '12'),
//            array('name' => 'Task #3', 'schedule' => 'd-m', 'date' => '13-12'),
//            array('name' => 'Task #4', 'schedule' => 'l', 'date' => 'Tuesday'),
//            array('name' => 'Task #5', 'schedule' => 'l', 'date' => 'Friday'),
//            array('name' => 'Task #6', 'schedule' => 'd', 'date' => '21'),
//            array('name' => 'Task #7', 'schedule' => 'd-m', 'date' => '12-12'),
//            array('name' => 'Task #8', 'schedule' => 'l', 'date' => 'Tuesday'),
//            array('name' => 'Task #9', 'schedule' => 'd', 'date' => '12'),
//            array('name' => 'Task #10', 'schedule' => 'd', 'date' => '13'),            
//            
//        );
//        
//        foreach($tasks as $task){
//            if($today->format($task['schedule']) == $task['date']){
//                echo "Wykonaj zadanie ".$task['name']."<br>";
//            }
//        }
        
        return view('home');
    }
}
