<?php
namespace App\Helpers;

/**
 * Description of TaskCollector
 *
 * @author Piotr Jaworski
 */
class TaskCollector
{
    /**
     * Gets Task
     * @param array $dates
     * @return array \App\Task
     */
    public function getTasks(array $dates = null)
    {
        $tasks = array();
        
        if(!count($dates)){
            $today = new \DateTime();
            $dates = array($today->format('d-m-Y'));
        } 
        
        foreach($dates as $date){
            $temp = new \DateTime($date);
            foreach(\App\Task::where('status',1)->where('type', 'sms')->get() as $task){
                if($temp->format($task['schedule']) == $task['date']){
                    $tasks[] = $task;
                }
            }        
        }
        
        return $tasks;
    }
}
