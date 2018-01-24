<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'type', 'name', 'params', 'datasource_id', 'schedule', 'date', 'category_id', 'subject', 'user_id', 'message', 'sql', 'f1', 'f2', 'f3', 'f4', 'f5'
    ];
    
    
    /**
     * Owner
     * @return \App\User::class
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
    
    
    /**
     * Datasource
     * @return \App\User::class
     */
    public function datasource()
    {
        return $this->belongsTo(\App\Datasource::class);
    }    
    

    
    
    /**
     * Makes schedule/date format more User friendly 
     * @return string
     */
    public function convertDates()
    {
         $return = '';
         
         switch ($this->date){
             case 'Monday'      : $return = "W każdy poniedziałek";     break;
             case 'Tuesday'     : $return = "W każdy wtorek";           break;
             case 'Wednesday'   : $return = "W każdą środę";            break;
             case 'Thursday'    : $return = "W każdy czwartek";         break;
             case 'Friday'      : $return = "W każdy piątek";           break;
             case 'Saturday'    : $return = "W każdą sobotę";           break;
             case 'Sunday'      : $return = "W każdą niedzielę";        break;
         }     
         
         if($this->schedule == 'd'){
             $return = "Każdego ".$this->date.". dnia miesiąca";
         }
         
         if($this->schedule == 'd-m'){
             $return = $this->convertMonth();
             //$return = "Raz do roku (".$this->date.")";
         }   
         
         if($this->schedule == '*'){
             $return = "Codziennie";
         }           
         
         return $return;
         
    }  
    
    
    /**
     * Makes schedule/date format more User friendly 
     * @return string
     */
    public function convertMonth()
    {
        $output = '';
        $date = explode('-', $this->date);
        $output = $date[0].'.';
        
        switch($date[1])
        {
            case 1 : $output .= ' stycznia'; break;
            case 2 : $output .= ' lutego'; break;
            case 3 : $output .= ' marca'; break;
            case 4 : $output .= ' kwietnia'; break;
            case 5 : $output .= ' maja'; break;
            case 6 : $output .= ' czerwca'; break;
            case 7 : $output .= ' lipca'; break;
            case 8 : $output .= ' sierpnia'; break;
            case 9 : $output .= ' września'; break;
            case 10 : $output .= ' paźdzernika'; break;
            case 11 : $output .= ' listopada'; break;            
            case 12 : $output .= ' grudnia'; break;                    
        }
        
        return $output;
    }
    
}
