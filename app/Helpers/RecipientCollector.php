<?php
namespace App\Helpers;

/**
 * Description of RecipientCollector
 *
 * @author Piotr Jaworski
 */
class RecipientCollector
{
    /**
     * Validator \App\Helpers\Validator
     */
    protected $validator;
    
    
    /**
     * Constructor
     * 
     * @param \App\Helpers\Validator $validator
     */
    public function __construct(\App\Helpers\Validator $validator)
    {
        $this->validator = $validator; 
    }
    
    
    
    
    
    /**
     * Loop through tasks to get Recipients
     * @param array $tasks
     * @param int $recipientNumber
     * @return array \App\SMS
     */
    public function getRecipients(array $tasks, $recipientNumber = 0)
    {
        if(!$tasks){
            return;
        }
        
        $recipients = array();

        foreach($tasks as $task){
            foreach($this->getRecipientsData($task) as $recipient){
                
                $validPhone     = $this->validator->validatePhoneNumber($this->validator->formatPhoneNumber($recipient->phone));
                $validMessage   = $this->validator->validateMessage($this->prepareMessage($recipient, $task->message));
                $validTotal     = ($validPhone && $validMessage) ? true : false;
                        
                array_push($recipients, array(
                        'taskId'        => $task->id,
                        'taskName'      => $task->name,
                        'schedule'      => $task->schedule,
                        'date'          => $task->date,
                        'dateFormated'  => $task->convertDates(),
                        'userId'        => $recipient->id,
                        'userName'      => $recipient->name,
                        'phoneNumber'   => $this->validator->formatPhoneNumber($recipient->phone),
                        'message'       => $this->prepareMessage($recipient, $task->message),
                        'validation'    => array(
                                            'phone'     => $validPhone, 
                                            'message'   => $validMessage
                                           ),
                        'valid'         => $validTotal,                    
                        'sent'          => '',
                        'status'        => 0) 
                        );
                
                if($recipientNumber && count($recipients) == $recipientNumber){
                   break;
                }
            }
        }
       
        return $recipients;
    }
    
    
    
    
    /**
     * Gets recipienst Data
     * @param \App\Task $task
     * @return DB results
     */
    public function getRecipientsData(\App\Task $task)
    {
        if(!$task){
            return false;
        }        
        
        if($result = \DB::connection($task->datasource->code)->select($this->prepareSQLStatement($task))){
            return $result;
        }

        return false;
    }
    
    
    
    
 
    
    /**
     * 
     * @param Std Object $recipient
     * @param string $message
     * @return string
     */
    private function prepareMessage($recipient, $message)
    {
        preg_match_all('/~~.*~~/U', $message, $matches, PREG_SET_ORDER, 0);
                
        if(!$matches){
            return $message;
        }
 
        $output = $message;
        
        foreach($matches as $match){
            try {
                $output = str_replace($match[0], trim($recipient->{str_replace('~', '', $match[0])}), $output);
            } catch (\Exception $e) {
                $output = str_replace($match[0], $match[0].' <- NIEZNANA WŁAŚCIWOŚĆ!', $output);
            }
        }
        
        return $output;
    }    
    
    
    
    
    
    
    /**
     * Prepares statement
     * @param \App\Task $task
     * @return string
     */
    private function prepareSQLStatement(\App\Task $task)
    {
        $params = json_decode($task->params);
                
        if(!count($params)){
            return $task->sql;
        } 

        $statement = $task->sql; 
        
        foreach($params as $key => $value){
            $statement = str_replace('~~'.$key.'~~', $value, $statement);
        }
        
        return $statement;
    }
    
    
}
