<?php
namespace App\Helpers;

/**
 * Description of Validator
 *
 * @author Piotr Jaworski
 */
class Validator
{
    
    /**
     * Validates Phone number
     * @param type $phone
     */
    public function validatePhoneNumber($phone)
    {
        return preg_match('/^\d{9}$/m', $phone);
    }
    
    
    /**
     * Corrects Phone number
     * @param string $phone
     * $return string
     */
    public function formatPhoneNumber($phone)
    {
        $signs = array(' ','-','+48','0048',',');
        return str_replace($signs, '', $phone);
    }
    


    /**
     * Validates Message
     * @param string $message
     */
    public function validateMessage($message)
    {
        return strlen($message) < 160;
    }
    
    
    
}
