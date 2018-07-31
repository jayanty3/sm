<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Calenderview extends CI_Controller {
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


  public function update()
  {
    $this->cart->update($_POST);
    $teacher_id = $this->input->post('id');
    $user = $this->ion_auth->user()->row();
    $name = $user->first_name." ".$user->first_name;
    redirect('calenderview/index/'.$teacher_id);
  }
  public function add_variables()
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
  public function add_events()
  {
    if ((!$this->ion_auth->logged_in()) )
    {
      redirect('frontend/register', 'refresh');
    }

    $id = $this->input->post('id');
    $event_id = $this->input->post('event_id');
    $user = $this->ion_auth->user()->row();
    $name = $user->first_name." ".$user->first_name;
    $query = $this->db->get_where('calendars', array('id' => $id))->row();
    $teacher_id =    $query->teach_id;
    $t['teacher_name1'] = User::find_by_id($teacher_id);
    $teacher_name =    $t['teacher_name1']->first_name." ".$t['teacher_name1']->last_name;

    $user_array = array(
      'teacher_id'=>$this->uri->segment(3),

    );
    $this->session->set_userdata('userdata', $user_array);
    $user_data = $this->session->userdata('userdata');
    $price = Fee::find_by_fee_id(1);



    $data =  array(
      array(
        'id'      => $id,
        'cal_id'      => $id,
        'event_id'    =>$event_id,
        'qty'     => 1,
        'price'   => $price->class_price,
        'teacher_id'=>$teacher_id,
        'indi_id' => $user->id,
        'status' => 1,
        'name'    => $name,
        'teacher_name' => $teacher_name,

      )
    );
    $add = $this->cart->insert($data);


    if ($add)
    {


      redirect('calenderview/index/'.$teacher_id);
    }

    else
    {
      redirect('calenderview/index/'.$teacher_id);
    }
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
    $groups = $this->ion_auth->groups()->result_array();
    $currentGroups = $this->ion_auth->get_users_groups()->result();
    foreach ($currentGroups as $key => $a) {
      $currentGroups = $a->id;

    }
    $name = $user->first_name." ".$user->first_name;
    $query = $this->db->get_where('calendars', array('id' => $id))->row();
    $teacher_id =    $query->teach_id;
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



    // if($subb){

            
    //          $su =   $tt['language']->subject;
    // }
    // else{

    //           $su =   $tt['language']->lang1;

    // }
    

    if($currentGroups == 5)
    {
      $te =    $price->mhrg;
    }
    else
    {
      $te =    ($price->mhri)/2;
    }



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

public function add_eventss1()
  {
    if ((!$this->ion_auth->logged_in()) )
    {
      redirect('frontend/register', 'refresh');
    }

    $id1 = $this->input->post('event_id');
    $date1 = $this->input->post('dateid');
    $user = $this->ion_auth->user()->row();
    $groups = $this->ion_auth->groups()->result_array();
    $currentGroups = $this->ion_auth->get_users_groups()->result();
    foreach ($currentGroups as $key => $a) {
      $currentGroups = $a->id;

    }

    $teacher_id1 =  $this->input->post('id');
    

   $cal_data =  array( 'teacher_id' =>  $this->input->post('id'),
                 'id'       =>  $this->input->post('event_id'),
                 'dateid'  => $this->input->post('dateid')
               );

    
    $add = $this->session->set_userdata('caldata', $cal_data);


    $this->save_order1();
    

    // if ($add)
    // {


    //   redirect('calenderview/teachersdetail/'.$teacher_id1);
    // }

    // else
    // {
    //   redirect('calenderview/teachersdetail/'.$teacher_id1);
    // }

  }













  function remove($rowid) {
    if ((!$this->ion_auth->logged_in()) )
    {
      redirect('frontend/register', 'refresh');
    }
// Check rowid value.
    if ($rowid==="all"){
// Destroy data which store in session.
      $this->cart->destroy();
    }else{
// Destroy selected rowid in session.
      $data = array(
        'rowid' => $rowid,
        'qty' => 0
      );
      $id = $this->input->post('id');
      $user = $this->ion_auth->user()->row();
      $name = $user->first_name." ".$user->first_name;
      $teacher_id = $this->uri->segment(4);

// Update cart data, after cancel.
      $this->cart->update($data);
    }
// This will show cancel data in cart.
    redirect('calenderview/index/'.$teacher_id);
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
        $order_detail = array(
          'orderid' => $ord_id,
          'cal_id' => $item['id'],
          'quantity' => $item['qty'],
          'price' => $item['price'],
          );

    $this->db->where('cal_id',$item['id']);

    $query = $this->db->get('order_details');
    if ($query->num_rows() > 0):





       $fullname = $user->first_name." ".$user->last_name;
        $teacher_id= $item['teacher_id'];
        $email1 = $user->email;
        $use = User::find_by_id($teacher_id);
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
      $mail->addBCC($email);
      $mail->addCC('jayanty333@gmail.com');
      $sen = $mail->Send();

        
         $this->session->set_flashdata('failedd', 'Payment failed Please Check Your Mail');
        redirect('individual'); exit;
    
    else:
        
    
    


        $cust_id = $this->db->insert('order_details',$order_detail);
        $this->data = array(
          'cal_id' => $item['id'],
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
        $teacher_name =     $user->first_name." ".$user->last_name;
        $email =  $use->email;
        $data1 = [
          $fullname   => $user->first_name." ".$user->last_name,
          $teacher_id => $item['teacher_id'],
          $teacher_name =>     $user->first_name." ".$user->last_name,
          $email =>  $use->email,
        ];

      require_once(APPPATH.'libraries/class.phpmailer.php'); 

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
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);"></font>
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
             <tr>
             <td>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Please click this link to activate and confirm class</span>
             </div>
             </td>
             
             <td bgcolor="#048b38" style=" color: #FFFFFF; text-align: center; font-size: 21px; font-family: "Impact"; font-weight: bold; cursor: pointer; text-decoration: none;">
             <a href="' . base_url() . 'calenderview/verify?' .
        'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'].'" target="_blank" style=" color: #FFFFFF; text-align: center; font-size: 21px; font-family: "Impact"; font-weight: bold; cursor: pointer; text-decoration: none;">
             <span style="font-size: 26px; text-decoration: none;">Confirm</span></a>
             </td>
             </tr>
             </tbody>
             </table>










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
             <tr>
             <td>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Please click this link to cancel class</span>
             </div>
             </td>
             
             <td bgcolor="#048b38" style=" color: #FFFFFF; text-align: center; font-size: 26px; font-family: "Impact"; font-weight: bold; cursor: pointer; text-decoration: none;">
             <a href="' . base_url() . 'calenderview/cancel?' .
        'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'].'" target="_blank" style=" color: #FFFFFF; text-align: center; font-size: 26px; font-family: "Impact"; font-weight: bold; cursor: pointer; text-decoration: none;">
             <span style="font-size: 26px; text-decoration: none;">Cancel</span></a>
             </td>
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








      //  'Class is booked, '.'!
      // Please Confirm the Class .
      // Please click this link to activate and confirm class
      // ' . base_url() . 'calenderview/verify?' .
      // 'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'] .
      // '<br>Please click this link to cancel class
      // ' . base_url() . 'calenderview/cancel?' .
      // 'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'] ;
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
      $mail1->addCC('jayanty333@gmail.com');
      $sen1 = $mail1->Send();
      endif;
    endforeach;
     
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
      $mail->addCC('jayanty333@gmail.com');
      $sen = $mail->Send();



  endif;
      // After storing all imformation in database load "billing_success".
 // $this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
                
   $array_items =  [

                       'Total'             => '',
                       'Subtotal'          => '',
                       'Tax'               => '',
                       'PaymentMethod'     => '',
                       'PayerStatus'       => '',
                       'PayerMail'         => '',
                       'saleId'            => '',
                       'CreateTime'        => '',  
                       'UpdateTime'        => '',
                       'State'             => '',
                       'cust_id'           => '', 
                       'payment_id'        => ''
                           ];
                    $this->session->unset_userdata($array_items);
  $distroy= $this->cart->destroy();
  $teacher_id = get_cookie('t_id')?get_cookie('t_id'):$this->session->userdata('t_id');
  echo "<script> swal('Good job!', 'Payment Successful Please Check Your Mail', 'success');</script>";

 
  if($currentGroups == 5){
     $this->session->set_flashdata('payment11', 'Payment Successful Please Check Your Mail');
       redirect('frontend/auth_login/instiprofile');
  }
    else{
         $this->session->set_flashdata('payment11', 'Payment Successful Please Check Your Mail');
      //redirect('calenderview/teachersdetail/'.$teacher_id);
         redirect('individual');
    }
  
}


  public function save_order1()
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


    $item['id'] = $this->input->post('event_id');
    $item['teacher_id'] =  $this->input->post('id');
    $date = $this->input->post('dateid');
   
        $order_detail = array(
          'orderid' => $ord_id,
          'cal_id' => $item['id'],
          'quantity' => 1,
          'price' => 0.0,
          );
 



       
        $cust_id = $this->db->insert('order_details',$order_detail);
        $this->data = array(
          'cal_id' => $item['id'],
          'indi_id' =>  $user->id,
          'teacher_id' => $item['teacher_id'],
          'status' => 1,
          'date1' =>date('Y-m-d H:i:s'),
          'hash' =>md5(rand(0, 1000))
                );
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
                    $teacher_name =>     $user->first_name." ".$user->last_name,
                    $email =>  $use->email,
                  ];

        require_once(APPPATH.'libraries/class.phpmailer.php');
      //   $mail             = new PHPMailer();
      //   $body = $this->load->view('frontend/booking-invoice', $data1, true);
      // //$body = "This is Days Total Report";
      //   $mail->IsSMTP(); // telling the class to use SMTP
      //   $mail->Host       = "mail.designermore.com"; // SMTP server
      //   $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
      //   // 1 = errors and messages
      //   // 2 = messages only
      //   $mail->SMTPAuth   = true;                  // enable SMTP authentication
      //   $mail->Host       = "sg2plcpnl0154.prod.sin2.secureserver.net"; // sets the SMTP server
      //   $mail->SMTPSecure = "tls";
      //   $mail->Port       = 587;      // set the SMTP port for the GMAIL server
      //   //$mail->protocol = 'mail';
      //   $mail->Username   = "contact-gfm@designermore.com"; // SMTP account username
      //   $mail->Password   = "a}+wP8RPD~Am";        // SMTP account password
      //   $mail->SetFrom('contact-gfm@gmail.com', 'Admin');
      //   $mail->Subject    = 'Payments Receipt';
      //   $mail->MsgHTML($body);
      //   $mail->AddAddress($email1);
      //   $mail->addBCC($email);
      //   $mail->addCC('jayanty333@gmail.com');
      //   $sen = $mail->Send();


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
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);"></font>
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
             <table width="100%" cellspacing="0" cellpadding="0" style="padding: 2px; padding-top: 0px; padding-bottom: 15px;">
             <tbody>
             <tr>
             <td>
             <table width="100%" cellpadding="10" cellspacing="0" style="">
             <tbody>
             <tr>
             <td bgcolor="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Please click this link to activate and confirm class.&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Please click this link to cancel class</span>
             </div>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
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
             <tr>
             <td bgcolor="#048b38" style=" color: #FFFFFF; text-align: center; font-size: 26pxpx; font-family: "Impact"; font-weight: bold; cursor: pointer; text-decoration: none;">
             <span style="font-size: 26px; text-decoration: none;"><a href="' . base_url() . 'calenderview/verify?' .
        'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'] .'">Confirm</a></span>
             </td>

             <td bgcolor="#048b38" style=" color: #FFFFFF; text-align: center; font-size: 26pxpx; font-family: "Impact"; font-weight: bold; cursor: pointer; text-decoration: none;">
             <span style="font-size: 26px; text-decoration: none;"><a href="' . base_url() . 'calenderview/cancel?' .
        'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'].'">Cancel The Class</a></span>
             </td>
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





        // 'Class is booked, '.'!
        // Please Confirm the Class .
        // Please click this link to activate and confirm class
        // ' . base_url() . 'calenderview/verify?' .
        // 'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'] .
        // '<br>Please click this link to cancel class
        // ' . base_url() . 'calenderview/cancel?' .
        // 'cal_id=' . $this->data['cal_id'] . '&hash=' . $this->data['hash'] ;
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
        $mail1->addCC('jayanty333@gmail.com');
        $sen1 = $mail1->Send();
   
      // After storing all imformation in database load "billing_success".
 // $this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
                
   $array_items =  [

                       'Total'             => '',
                       'Subtotal'          => '',
                       'Tax'               => '',
                       'PaymentMethod'     => '',
                       'PayerStatus'       => '',
                       'PayerMail'         => '',
                       'saleId'            => '',
                       'CreateTime'        => '',  
                       'UpdateTime'        => '',
                       'State'             => '',
                       'cust_id'           => '', 
                       'payment_id'        => ''
                           ];
                    $this->session->unset_userdata($array_items);
  $distroy= $this->cart->destroy();
  $teacher_id = get_cookie('t_id')?get_cookie('t_id'):$this->session->userdata('t_id');
  echo "<script> swal('Good job!', 'Trail class book', 'success');</script>";

 
  if($currentGroups == 5){
     $this->session->set_flashdata('traill', 'Payment Successful Please Check Your Mail');
       redirect('frontend/auth_login/instiprofile');
  }
    else{
         $this->session->set_flashdata('traill', 'Payment Successful Please Check Your Mail');
      redirect('calenderview/teachersdetail/'.$teacher_id);
    }
  
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
      if ($result->update_attributes(array('varified' => 1,'hash' =>' ','cancel'=>0)))
      {
        $this->session->set_flashdata('mess11',' your Confirmation is confirm');
        require_once(APPPATH.'libraries/class.phpmailer.php');
        $mail             = new PHPMailer();
        $body = '<table width="100%" cellpadding="0" cellspacing="0">
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
             <font style="font-size: 26px; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Class is booked,your Class is confirm </font>
             </div>
             </td>
             </tr>
             </tbody>
             </table>
             </td>
             </tr>
             </tbody>
             </table>
             </div>';

        // 'Class is booked,your Class is confirm';
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
      if ($result->update_attributes(array('varified' => 0,'hash' =>' ','status'=>1,'cancel'=>1)))
      {
        $this->session->set_flashdata('mess12','your Confirmation is confirm');
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
?>