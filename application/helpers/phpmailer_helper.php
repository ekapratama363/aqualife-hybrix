<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

//Load Composer's autoloader
require 'vendor/autoload.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (! function_exists('send_email')) {
    
    function send_email($to, $subject, $message)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = getenv('MAIL_HOST');                  
            $mail->SMTPAuth   = getenv('MAIL_SMTP_AUTH');                                   
            $mail->Username   = getenv('MAIL_USERNAME');            
            $mail->Password   = getenv('MAIL_PASSWORD');                         
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = getenv('MAIL_PORT');
            $mail->SMTPDebug  = getenv('MAIL_SMTPDDEBUG');                                  
        
            //Recipients
            $mail->setFrom(getenv('MAIL_USERNAME'), getenv('MAIL_FROM_NAME'));
            $mail->addAddress($to, $to);   
        
            //Content
            $mail->isHTML(true);                                
            $mail->Subject = $subject;
            $mail->Body    = $message;
        
            $mail->send();

            return [
                'status' => true, 
                'message' => 'sukses'
            ];
        } catch (Exception $e) {
            return [
                'status' => false,
                'trace' => $e->getTrace(),
                'message' => $e->getMessage(),
                'mailError' => $mail->ErrorInfo
            ];
        }
    }

}