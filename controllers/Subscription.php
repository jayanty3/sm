<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
           $this->load->library(array('ion_auth', 'form_validation', 'session', 'upload'));
		
	}

	// ------------------------------------------------------------------------

	/**
	 * Index page
	 */
	public function sub1()
	{
		$data  = array('success'=> false,'message' =>array());
		$this->form_validation->set_rules('email1', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email|is_unique[subs.email_id]');
		if ($this->form_validation->run() == FALSE) {

          foreach ($_POST as $key => $value) {
                $data['message'][$key] = form_error($key);
            }
            
             
        } 
        else {     	

        	        $email = $this->input->post('email1');
        	 		$attributes = array('email_id' => $email);
        	        $subs = Sub::create($attributes);
        	         $this->email_sent($email);

        	         $data['success'] = true;
	    }
	    
	  echo json_encode($data);  

}

    public function email_sent($email = null){


    	

    	require_once(APPPATH.'libraries/class.phpmailer.php');
                    $mail             = new PHPMailer();

                    $body = '<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:35px/38px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;">
														Thank you for  Subscribing !
													</td>
												</tr>
												<tr>
													<td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="center" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
														Now that you are a part of the community.You will be the first to know about new upadte.
														Stay tuned
													</td>
												</tr>
												<tr>
													<td style="padding:0 0 20px;">
														<table width="134" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
															<tr>
																<td data-bgcolor="bg-button" data-size="size button" data-min="10" data-max="16" class="btn" align="center" style="font:12px/14px Arial, Helvetica, sans-serif; color:#f8f9fb; text-transform:uppercase; mso-padding-alt:12px 10px 10px; border-radius:2px;" bgcolor="#7bb84f">
																	<a  style="text-decoration:none; color:#f8f9fb; display:block; padding:12px 10px 10px;" href="#">Learn More</a>
																</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>';
			                                                     //$body = "This is Days Total Report";
			        $mail->IsSMTP();                             // telling the class to use SMTP
			        $mail->Host       = "mail.designermore.com"; // SMTP server
			        $mail->SMTPDebug  = 0;                       // enables SMTP debug information (for testing)
			        $mail->Encoding="base64";   
			                                                   // 2 = messages only
			        $mail->SMTPAuth   = true;                  // enable SMTP authentication
			        $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; //sets the SMTP server
			        $mail->SMTPSecure = "tls"; 
			        $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
			                                                   //$mail->protocol = 'mail';                  
			        $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
			        $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password
			        $mail->SetFrom('contact-gfm@gmail.com', 'Admin');
			        $mail->Subject    = 'Subscription';
			        $mail->MsgHTML($body);
			        $mail->AddAddress($email);
			        $mail->addBCC('jayanty333@gmail.com');
			        $mail->Send();
			       

    }

}