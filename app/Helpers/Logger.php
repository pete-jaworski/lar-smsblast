<?php
namespace App\Helpers;

/**
 * Logs all activity
 *
 * @author Piotr Jaworski
 */
class Logger
{
    /**
     * Logs all activity
     * @param array $smsMessages
     */
    public function log(array $smsMessages)
    {
        if(!$smsMessages){
            $smsMessages = array('error' => "No data");
        }

        $log = new \App\Log([
            'log' => json_encode($smsMessages)
        ]);
        
        $log->save();
    }
}
