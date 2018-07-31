<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers_book_center extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

       
        $this->load->library(array('ion_auth',  'session','cart'));
        $this->load->helper(array('url', 'language','file'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model(array('Calendar_model','Booking_model'));



		
	}

	public function index()
	{
         if ((!$this->ion_auth->logged_in()) )
                {
                    redirect('frontend/register', 'refresh');
                }
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();
        $data['calc'] = $this->Calendar_model->get_events();
        $data['teacher_id']= $this->uri->segment(3);
		$this->load->view('frontend/calender_view',$data);
	}


public function teachersdetail(){

if ((!$this->ion_auth->logged_in()) )
                {
                    redirect('frontend/auth_login/main', 'refresh');
                }
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();
        $data['calc'] = $this->Calendar_model->get_events();
        $data['teacher_id']= $this->uri->segment(3);
        $this->load->view('frontend/teacher-details',$data);


}
    

    
 
   
    


public function add_eventss()
    {

       if ((!$this->ion_auth->logged_in()) )
                {
                    redirect('frontend/register', 'refresh');
                }
      
        $id = $this->input->post('event_id');
        $date = $this->input->post('dateid');
        $user = $this->ion_auth->user()->row();
        $name = $user->first_name." ".$user->first_name;


        $query = $this->db->get_where('calendars', array('id' => $id))->row();
                 $teacher_id =    $query->teach_id;
     
        $user_array = array(
          'teacher_id'=>$this->uri->segment(3));
          
         

        $this->session->set_userdata('userdata', $user_array);
        
        $user_data = $this->session->userdata('userdata');

       // $price = Fee::find_by_fee_id(1);

         $price = Teacher::find_by_user_id($teacher_id);
          
          
              $te =    $price->mhri;

              

               $mhri1 =  ($te)*(100+10)/100;


   $data =  array( 
                        array(
                                'id'      => $id,
                                'cal_id'      => $id,
                                'qty'     => 1,
                                'event_id'    =>$event_id,
                                'date' => $date,
                                'price'   => $mhri1,
                                'teacher_id'=>$teacher_id,
                                'indi_id' => $user->id,
                                'status' => 1,
                                'name'    => $name,
                               
                          )
                    );

        $add = $this->cart->insert($data);
         
          if ($add) 
          {
            
              
              redirect('calenderview/teachersdetail/'.$teacher_id);
          }
          
          else
          {
                redirect('calenderview/teachersdetail/'.$teacher_id);
          }


             

    }



     



      function removes() {
        if ((!$this->ion_auth->logged_in()) )
                {
                    redirect('frontend/register', 'refresh');
                }

                        // Check rowid value.
                      // $delid = $_POST['del'];
                        // Destroy selected rowid in session.
                    $delid = $_POST['del'];
                      $bhu = count($delid);
                   $data = array();
           for($i=0; $i<$bhu ;$i++){
         //echo  $delid[$i]; echo "<br>";
                      $data[] = array(
                                  'rowid' => $delid[$i],
                                  'qty' => 0
                                 );
                     

                         }
       
                        $delid = $_POST['del'];
                        $id = $this->input->post('id');
                        $user = $this->ion_auth->user()->row();
                        $name = $user->first_name." ".$user->first_name;
                        $teacher_id = $this->input->post('id1');
                    
                        // Update cart data, after cancel.
                         
                        $this->cart->update($data);
                        // This will show cancel data in cart.
                        if($currentGroups==5)
                        {

                          redirect('frontend/auth_login/instiprofile');
                        }
                        else{
                          redirect('calenderview/teachersdetail/'.$teacher_id);
                        }
                        
                        }


public function save_order()
{
                    // This will store all values which inserted from user.
if ((!$this->ion_auth->logged_in()) )
                {
                    redirect('frontend/register', 'refresh');
                }

                    
$user = $this->ion_auth->user()->row();

       



                    $order = array(
                    'date' => date('Y-m-d'),
                    'cust_id' => $user->id,
                    );

                  
                    $ord_id =   $this->db->insert('orders',$order);
                    $id = $this->db->insert_id();
                              


                    if ($cart = $this->cart->contents()):
                    foreach ($cart as $item):
                    $order_detail = array(
                    'orderid' => $ord_id,
                    'cal_id' => $item['id'],
                    'quantity' => $item['qty'],
                    'price' => $item['price']);
                    

              $cust_id = $this->db->insert('order_details',$order_detail);

                    $this->data = array(
                    'cal_id' => $item['id'],
                    'indi_id' => $item['indi_id'],
                    'teacher_id' => $item['teacher_id'],
                    'status' => 1,
                     'hash' =>md5(rand(0, 1000)));


// Insert product imformation with order detail, store in cart also store in database.


          $add = Booking::create($this->data);

                         $fullname = $user->first_name." ".$user->last_name;
                         $teacher_id= $item['teacher_id'];
                         $email1 = $user->email;
                         $use = User::find_by_id($teacher_id);
                         $teacher_name =     $use->first_name." ".$user->last_name;
                         $email =  $use->email;

           $data1 = [
                        $fullname   => $user->first_name." ".$user->last_name,
                        $teacher_id => $item['teacher_id'],
                         $teacher_name =>     $use->first_name." ".$user->last_name,
                          $email =>  $use->email,
                    ];

              
        require_once(APPPATH.'libraries/class.phpmailer.php');
        $mail             = new PHPMailer();
        $body = $this->load->view('frontend/booking-invoice', $data1, true);
        //$body = "This is Days Total Report";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "mail.designermore.com"; // SMTP server
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
        $mail->SMTPSecure = "tls"; 
        $mail->Port       = 587;      // set the SMTP port for the GMAIL server
        //$mail->protocol = 'mail';                  
        $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
        $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password

        $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

        $mail->Subject    = 'Payments Receipt';

       

        $mail->MsgHTML($body);


        $mail->AddAddress($email1);
        $mail->addBCC($email);

       $sen = $mail->Send(); 
        

        $mail1             = new PHPMailer();
        $body = 'Class is booked, '.'!
        Please Confirm the Class . 
        
        Please click this link to activate and confirm class 
        ' . base_url() . 'calenderview/verify?' . 
        'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'] .
        '<br>Please click this link to cancel class  
        ' . base_url() . 'calenderview/cancel?' . 
        'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'] ;
        //$body = "This is Days Total Report";

        $mail1->IsSMTP(); // telling the class to use SMTP
        $mail1->Host       = "mail.designermore.com"; // SMTP server
        $mail1->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $mail1->SMTPAuth   = true;                  // enable SMTP authentication
        $mail1->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
        $mail1->SMTPSecure = "tls"; 
        $mail1->Port       = 587;      // set the SMTP port for the GMAIL server
        //$mail->protocol = 'mail';                  
        $mail1->Username   = "contact-gfm@designermore.com"; // SMTP account username
        $mail1->Password   = "a}+wP8RPD~Am";        // SMTP account password

        $mail1->SetFrom('contact-gfm@gmail.com', 'Admin');

        $mail1->Subject    = 'confirmation';

       

        $mail1->MsgHTML($body);


        $mail1->AddAddress($email);
        

       $sen1 = $mail1->Send(); 
        
            


endforeach;

endif;

               



// After storing all imformation in database load "billing_success".
$this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
$distroy= $this->cart->destroy();
$teacher_id = get_cookie('t_id');
 echo "<script> alert('Payment Successful Please Check Your Mail');</script>";
   redirect('calenderview/teachersdetail/'.$teacher_id,'refresh');


}

  

 function verify() {
         $result = Booking::find_by_cal_id($this->input->get('cal_id')); 
           $result->teacher_id;
           $result->indi_id;
              $techmail = User::find_by_id($result->teacher_id);
              $stumail = User::find_by_id($result->indi_id);
 
 
         //get the hash value which belongs to given email from database
         if($result){ 
            if($result->hash==$_GET['hash'])
            {  
               if ($result->update_attributes(array('varified' => 1,'hash' =>' ')))
                {
                   $this->session->set_flashdata('mess',' your Confirmation is confirm');
                    require_once(APPPATH.'libraries/class.phpmailer.php');
                    $mail             = new PHPMailer();
        $body = 'Class is booked,your Class is confirm';
        //$body = "This is Days Total Report";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "mail.designermore.com"; // SMTP server
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
        $mail->SMTPSecure = "tls"; 
        $mail->Port       = 587;      // set the SMTP port for the GMAIL server
        //$mail->protocol = 'mail';                  
        $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
        $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password

        $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

        $mail->Subject    = 'confirmation';

       

        $mail->MsgHTML($body);


        $mail->AddAddress($techmail->email);
        $mail->addBCC($stumail->email);
        $mail->addCC('jayanty333@gmail.com');
        $sen1 = $mail->Send(); 

                   redirect('frontend/auth_login/main','refresh');
                }
               else
               {
                  $this->session->set_flashdata('failed',' failed to activate');
                   redirect('frontend/auth_login/main','refresh');
               }
            }
         }
}


function cancel() {
         $result = Booking::find_by_cal_id($this->input->get('cal_id')); 
           $result->teacher_id;
           $result->indi_id;
              $techmail = User::find_by_id($result->teacher_id);
              $stumail = User::find_by_id($result->indi_id);

         //get the hash value which belongs to given email from database
         if($result){ 
            if($result->hash==$_GET['hash'])
            {  
               if ($result->update_attributes(array('varified' => 0,'hash' =>' ','status'=>0)))
                {
                   $this->session->set_flashdata('mess',' your Confirmation is confirm');
                    require_once(APPPATH.'libraries/class.phpmailer.php');
                    $mail             = new PHPMailer();
        $body = 'Class is Cancel, '.'!
        on chocie refund Money or tranfer class contact us admin@dmin.com' ;
        //$body = "This is Days Total Report";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "mail.designermore.com"; // SMTP server
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
        $mail->SMTPSecure = "tls"; 
        $mail->Port       = 587;      // set the SMTP port for the GMAIL server
        //$mail->protocol = 'mail';                  
        $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
        $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password

        $mail->SetFrom('contact-gfm@gmail.com', 'Admin');

        $mail->Subject    = 'cancel';

       

        $mail->MsgHTML($body);


         $mail->AddAddress($techmail->email);
        $mail->addBCC($stumail->email);
        $mail->addCC('jayanty333@gmail.com');
        $sen1 = $mail->Send(); 


                   redirect('frontend/auth_login/main','refresh');
                }
               else
               {
                  $this->session->set_flashdata('failed',' failed to activate');
                   redirect('frontend/auth_login/main','refresh');
               }
            }
         }
}

    public function delete_event()
    {
        if(isset($_POST['id']))
        {

        $id = $_POST['id'];
        
        }

        $delete =  $this->db->delete('calendars', array('id' => $id)); 
       

    }

    public function update_events()
    {
        if(isset($_POST['id'])  || isset($_POST['start']) || isset($_POST['end'])) 
        {
         
            $id = $_POST['id'];


            $start = $_POST['start'];

            $end = $_POST['end'];
        }
         $data = array('start' => $start,'end' => $end);
         $update = $this->db->update('calendars', $data, array('id' => $id));
      
    }

    public function events()
    {

        $this->load->view('frontend/booking');
          
    }

     public function eventss()
    {

        $this->load->view('frontend/bookingteacher'); 
        
    }

public function Confirm()
    {

        $this->template->load('frontend/front_login_user_end','frontend/confirm');
        
    }

    public function pay()
    {
         $this->load->view('frontend/pay');
    }


      public function adding_events()
      {
        redirect('calenderview/index/'.$teacher_id);
      }


  
	}


