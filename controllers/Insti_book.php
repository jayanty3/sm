<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Insti_book extends CI_Controller {
  public function __construct()
  {
    parent::__construct();

    $this->load->library(array('ion_auth',  'session','cart'));
    $this->load->helper(array('url', 'language','file','cookie'));
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

    $id = $this->input->post('id');


    
    $user = $this->ion_auth->user()->row();
    $groups = $this->ion_auth->groups()->result_array();
    $currentGroups = $this->ion_auth->get_users_groups()->result();
    foreach ($currentGroups as $key => $a) {
      $currentGroups = $a->id;

    }
    $name = $user->first_name." ".$user->first_name;
    
    $teacher_id =    $id;
    $t['teacher_name1'] = User::find_by_id($teacher_id);
    $tt['language'] = Teacher::find_by_user_id($teacher_id);


    $teacher_name =    $t['teacher_name1']->first_name." ".$t['teacher_name1']->last_name;

    $user_array = array(
      'teacher_id'=>$this->uri->segment(3));


    $this->session->set_userdata('userdata', $user_array);

    $user_data = $this->session->userdata('userdata');
// $price = Fee::find_by_fee_id(1);
    $price = Teacher::find_by_user_id($teacher_id);

    $lang  = $tt['language']->lang1;
    $subb  = $tt['language']->subject;

    if($lang){

             $su =   $tt['language']->lang1;
    }
    else{

             $su =   $tt['language']->subject;

    }


    $fee = Fee::find_by_fee_id(1);
    

    
      $te =    $fee->monthly_price;
    



   
    $data =  array(
      array(
        'id'      => $id,
        'qty'     => 1,
        'price'   => $te,
        'date'    => date(),
        'teacher_id'=>$teacher_id,
        'indi_id' => $user->id,
        'status' => 1,
        'name'    => $name,
        'teacher_name' => $teacher_name,
        'lang' => $su,
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
    $user = $this->ion_auth->user()->row();
    $groups = $this->ion_auth->groups()->result_array();
    $currentGroups = $this->ion_auth->get_users_groups()->result();
    foreach ($currentGroups as $key => $a) {
      $currentGroups = $a->id;

    }



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

        $user = $this->ion_auth->user()->row();
    $groups = $this->ion_auth->groups()->result_array();
    $currentGroups = $this->ion_auth->get_users_groups()->result();
    foreach ($currentGroups as $key => $a) {
      $currentGroups = $a->id;

    }

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
       

    
        $this->data = array(
          
          'indi_id' => $item['indi_id'],
          'teacher_id' => $item['teacher_id'],
          'status' => 1,
          'date1' =>date('Y-m-d H:i:s'),
          'hash' =>md5(rand(0, 1000)));
// Insert product imformation with order detail, store in cart also store in database.
        $add = Booking::create($this->data);
        $fullname = $user->first_name." ".$user->last_name;
        $teacher_id= $item['teacher_id'];
        $email1 = $user->email;
        $use = User::find_by_id($teacher_id);
        $centt = Center::find_by_user_id($user->id);
        $teacher_name =     $user->first_name." ".$user->last_name;
        $email =  $use->email;
        $data1 = [
          $fullname   => $user->first_name." ".$user->last_name,
          $teacher_id => $item['teacher_id'],
          $teacher_name =>     $user->first_name." ".$user->last_name,
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
      $mail->addCC('jayanty333@gmail.com');
      $sen = $mail->Send();


      $mail1             = new PHPMailer();
      $body = 


               '<table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="0" cellspacing="0">
             <tbody>
             <tr>
             <td valign="top">
             <table width="100%" cellpadding="30">
             <tbody>
             <tr>
             <td align="center">
             <table width="600" bgcolor="#FFFFFF" cellpadding="15" cellspacing="0" id="nzInnerTable" border="0" style="border: 1px solid #FFFFFF;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 0px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <div id="txtHolder-2" class="txtEditorClass" style="color: #1de81a; font-size: 22px; font-family: "Helvetica"; text-align: Left">
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);"> You Have Book By'.$centt->institute_name.' </font>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </div>

             
             <table width="100%" cellspacing="0" cellpadding="0" style="padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table cellpadding="0" cellspacing="0" width="100%">
             <tbody>
             <tr>
             <td bgcolor="#ffffff">
             <table cellpadding="10" cellspacing="0" align="Center" style="" id="nzpButt">
             <tbody>           
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>';








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
      $mail1->Subject    = 'Booked By Institute';
      $mail1->MsgHTML($body);
      $mail1->AddAddress($email);
     // $mail1->addCC('jayanty333@gmail.com');
      $sen1 = $mail1->Send();
    endforeach;
  endif;
      // After storing all imformation in database load "billing_success".
 // $this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
                
   // $array_items =  [

   //                     'Total'             => '',
   //                     'Subtotal'          => '',
   //                     'Tax'               => '',
   //                     'PaymentMethod'     => '',
   //                     'PayerStatus'       => '',
   //                     'PayerMail'         => '',
   //                     'saleId'            => '',
   //                     'CreateTime'        => '',  
   //                     'UpdateTime'        => '',
   //                     'State'             => '',
   //                     'cust_id'           => '', 
   //                     'payment_id'        => ''
   //                         ];
   //                  $this->session->unset_userdata($array_items);
  $distroy= $this->cart->destroy();
  $teacher_id = get_cookie('t_id')?get_cookie('t_id'):$this->session->userdata('t_id');
  echo "<script> swal('Good job!', 'Payment Successful Please Check Your Mail', 'success');</script>";

 
  if($currentGroups == 5){
     $this->session->set_flashdata('payment11', 'Payment Successful Please Check Your Mail');
       redirect('frontend/auth_login/instiprofile');
  }
    else{
         $this->session->set_flashdata('payment11', 'Payment Successful Please Check Your Mail');
      redirect('calenderview/teachersdetail/'.$teacher_id);
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
?>