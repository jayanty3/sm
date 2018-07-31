<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of email
 *
 * @author raakesh
 */
require_once FCPATH . 'class.phpmailer.php';
require_once FCPATH . 'class.smtp.php';
        
class Custom_email {

    //put your code here
    public $host;
    public $username;
    public $password;
    public $port;
    public $from_email;
    public $from_name;
    
    public function __construct() {
        $CI = & get_instance();
        $this->host = $CI->config->item('email_host');  // specify email server
        $this->username = $CI->config->item('mail_username');  // SMTP username
        $this->password = $CI->config->item('mail_password'); // SMTP password
        $this->port = 465;
        $this->from_email = $CI->config->item('from_email'); // From Email
        $this->from_name = $CI->config->item('from_name'); // From Name        
    }

    public function send($to_email = NULL, $to_name = NULL, $subject = NULL, $message = NULL) {       

        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->IsHTML(true); // telling the class to use HTML
        $mail->CharSet = 'UTF-8';
        $mail->SMTPSecure = 'ssl';
        $mail->Host = $this->host;  // specify main and backup server
        $mail->SMTPAuth = true;     // turn on SMTP authentication
        $mail->Port = $this->port;                    // set the SMTP port
        $mail->Username = $this->username;  // SMTP username
        $mail->Password = $this->password; // SMTP password
        $mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
        $mail->From = $this->from_email;
        $mail->FromName = $this->from_name;
        $mail->AddAddress($to_email, $to_name);
        $mail->Subject = $subject;
        $mail->Body = $message;

        if (!$mail->Send()) {
            return FALSE;
        }
        return TRUE;
    }

}