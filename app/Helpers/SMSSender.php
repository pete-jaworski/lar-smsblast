<?php
namespace App\Helpers;

/**
 * Connects to SMSAPI and sens SMS
 *
 * @author Piotr Jaworski
 */
class SMSSender
{
    /**
     * @var \App\Helpers\Logger
     */
    private $logger;    
    
    /**
     * Constructor
     * @param \App\Helpers\Logger $logger
     */
    public function __construct(\App\Helpers\Logger $logger)
    {
       $this->logger = $logger;
    }    
    
    
    /**
     * Sends SMS
     * @param array $smsMessages
     * @return boolean
     */
    public function send(array $smsMessages)
    {
        if(!$smsMessages){
            return false;
        }

        $smsapi = new \SMSApi\Api\SmsFactory();
        $smsapi->setClient(\SMSApi\Client::createFromToken(env('SMS_API_TOKEN')));        
        $actionSend = $smsapi->actionSend();
        $actionSend->setSender(env('SMS_API_SENDER')); 
        
        $today = new \DateTime();
        $smsCount = 0;
        
        foreach($smsMessages as &$message){
            if($message['valid']){
                try {
                        $actionSend->setTo($message['phoneNumber']);
                        $actionSend->setText($message['message']);
                        
                        $response = $actionSend->execute();
                        
                        $message['sent'] = $today->format('Y-m-d H:i:s');
                        $message['status'] = array(
                            'id'        => $response->getList()[0]->getId(),
                            'status'    => $response->getList()[0]->getStatus(),
                            'error'     => $response->getList()[0]->getError()                            
                        );
                        $smsCount++;
                        
                        

                } catch (\SMSApi\Exception\SmsapiException $exception) {
                        $message['status'] = $exception->getMessage();
                }                
            }
        }
        
        
       $this->logger->log($smsMessages); 
       $this->logger->log(array('SMS sent' => $smsCount)); 
       
    }
    
}
