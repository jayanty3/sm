<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Paypal_teacher extends CI_Controller
{
   public $live = "https://api.paypal.com/v1/";

   public  $sandbox ="https://api.sandbox.paypal.com/v1/";

    function  __construct()
    {
        parent::__construct();
        $this->load->model('paypal_model', 'paypal');
        $this->load->library(array('ion_auth',  'session','cart'));
        $this->load->helper(array('url', 'language','file','cookie'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        // paypal credentials
        $this->config->load('paypal');


   }


   public function index(){

        $data  = array('success'=> false,'message' =>array());

      
        
        


             $user = $this->ion_auth->user()->row();
             $teach = Teacher::find_by_user_id($user->id);

                    $points =  json_decode($this->input->post('points'));

                    
           
       
                       $Total           = $points->data->transactions[0]->amount->total;
                       $Subtotal        = $points->data->transactions[0]->related_resources[0]->sale->amount->details->subtotal;
                       $Tax             = "0";
                       $PaymentMethod   = $points->data->payer->payment_method;
                       $PayerStatus     = $points->data->payer->status;
                       $PayerMail       = $points->data->payer->payer_info->email;
                       $saleId          = $points->data->transactions[0]->related_resources[0]->sale->id;
                       $CreateTime      = $points->data->create_time;  
                       $UpdateTime      = $points->data->transactions[0]->related_resources[0]->sale->update_time;
                       $State           = $points->data->transactions[0]->related_resources[0]->sale->state;
                       $cust_id         = $user->id; 
                       $payment_id      = $points->data->id;

                       $arraydata =  [

                       'Total'             => $points->data->transactions[0]->amount->total,
                       'Subtotal'          => $points->data->transactions[0]->related_resources[0]->sale->amount->details->subtotal,
                       'Tax'               => "0",
                       'PaymentMethod'     => $points->data->payer->payment_method,
                       'PayerStatus'       => $points->data->payer->status,
                       'PayerMail'         => $points->data->payer->payer_info->email,
                       'saleId'            => $points->data->transactions[0]->related_resources[0]->sale->id,
                       'CreateTime'        => $points->data->create_time,  
                       'UpdateTime'        => $points->data->transactions[0]->related_resources[0]->sale->update_time,
                       'State'             => $points->data->transactions[0]->related_resources[0]->sale->state,
                       'cust_id'           => $user->id, 
                       'payment_id'        => $points->data->id
                           ];

                       $this->session->set_userdata($arraydata);

                       
                       
                       // $Total             = $points->data->transactions[0]->amount->total;
                       // $Subtotal           => $points->data->transactions[0]->related_resources[0]->sale->amount->details->subtotal;
                       // $Tax                = "0";
                       // $PaymentMethod      = $points->data->payer->payment_method;
                       // $PayerStatus        = $points->data->payer->status;
                       // $PayerMail          = $points->data->payer->payer_info->email;
                       // $saleId             = $points->data->transactions[0]->related_resources[0]->sale->id;
                       // $CreateTime         = $points->data->create_time ; 
                       // $UpdateTime         = $points->data->transactions[0]->related_resources[0]->sale->update_time;
                       // $State              = $points->data->transactions[0]->related_resources[0]->sale->state;
                       // $cust_id            = $user->id; 
                       // $payment_id         = $points->data->id;
                        
                        
                      
                 
                      


                               
                       
                      
          $point =      $this->paypal->create($Total,$Subtotal,$Tax,$PaymentMethod,$PayerStatus,$PayerMail,$saleId,$CreateTime,$UpdateTime,$State,$cust_id,$payment_id);

            // $updat =  $this->db->insert('certificates',$data);

            if ($point ==TRUE) 
            {
               
                 

                
                 $data['success'] = true;
                 $data['session'] = $arraydata;
                 
                  $email = $user->email;

                  $teach = Teacher::find_by_user_id($user->id);

                    $dt2 = new DateTime("+1 month");
                    $sub_exp = $dt2->format("Y-m-d H:i:s");
                  // $sub_exp = date('Y-m-d H:i:s', strtotime('+1 month', $today));

                    

                   $teach->update_attributes(array('fee' => 'appear home page',
                                                    'subs_expire' => $sub_exp ));


                   require_once(APPPATH.'libraries/class.phpmailer.php');
                   $teach = Teacher::find_by_user_id($user->id);
 
                      
                    $mail             = new PHPMailer();

                    $body = $this->load->view('frontend/booking-invoice',$teach,true);
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
                    $mail->Subject    = 'Payment Recipt';
                    $mail->MsgHTML($body);
                    $mail->AddAddress($email);
                    $mail->addBCC('jayanty333@gmail.com');
                    $mail->Send();
                   

                    require_once(APPPATH.'libraries/class.phpmailer.php');
                   $teach = Teacher::find_by_user_id($user->id);
 
                      
                    $mail1             = new PHPMailer();

                    $body = "<h2>You Subscribe for  One month appear on Homepage Start Date ".date('Y-m-d h:i')."  expire after 1 month</h2>";
                                                                 //$body = "This is Days Total Report";
                    $mail1->IsSMTP();                             // telling the class to use SMTP
                    $mail1->Host       = "mail.designermore.com"; // SMTP server
                    $mail1->SMTPDebug  = 0;                       // enables SMTP debug information (for testing)
                    $mail1->Encoding="base64";   
                                                               // 2 = messages only
                    $mail1->SMTPAuth   = true;                  // enable SMTP authentication
                    $mail1->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; //sets the SMTP server
                    $mail1->SMTPSecure = "tls"; 
                    $mail1->Port       = 587;                   // set the SMTP port for the GMAIL server
                                                               //$mail->protocol = 'mail';                  
                    $mail1->Username   = "contact-gfm@designermore.com"; // SMTP account username
                    $mail1->Password   = "a}+wP8RPD~Am";        // SMTP account password
                    $mail1->SetFrom('contact-gfm@gmail.com', 'Admin');
                    $mail1->Subject    = 'You Subscribe One month appear on Homepage';
                    $mail1->MsgHTML($body);
                    $mail1->AddAddress($email);
                    $mail1->addBCC('jayanty333@gmail.com');
                    $mail1->Send();

                    
                    $this->session->set_userdata('montly_sub');

            } 
            else 
            {

                $data['success'] = "failed to update";
            }
            
         

        
         echo json_encode($data);    

    }

    
}

 
    
          

