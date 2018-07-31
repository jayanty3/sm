<?php

class Register extends CI_Controller {

    public $live = "https://api.paypal.com/v1/";
    public $sandbox = "https://api.sandbox.paypal.com/v1/";

    public function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'session', 'upload'));
        $this->load->helper(array('url', 'language', 'file', 'cookie','email'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('paypal_model', 'paypal');
        $this->config->load('paypal');
    }

    function index() {
        // if (!$this->ion_auth->logged_in())
        //  {
        // 		 	redirect('frontend/auth_login/main', 'refresh');
        //  }

         $data  = array('success'=> false,'message' =>array());
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
        
        if ($this->form_validation->run() == FALSE) {

          foreach ($_POST as $key => $value) {
                $data['message'][$key] = form_error($key);
            }
            
             
        } else {

            $username = $this->input->post('email');
            $email = $this->input->post('email');
            $password = $this->input->post('pass');
            $additional_data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                    // 'hash' => md5(rand(0, 1000)),
            ];

             //   echo  $additional_data['hash'];
             //        echo "<pre>";
             // print_r($additional_data);exit;

            $group = array('2');
            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group) == TRUE) {
                $this->session->set_flashdata('mess', ' Your Account is Succussful Created, Please Login');

                $data['success'] = true;

                //redirect('frontend/auth_login/main', 'refresh');

                
            } 
        }

        echo json_encode($data);
    }

    


    function individual_register() {


        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('skype', 'Skype', 'required');
        $this->form_validation->set_rules('facebook', 'Facebook', 'required');
        $this->form_validation->set_rules('cpass', 'Password', 'required|min_length[8]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('levels[]', 'Select Level', 'required');
        $this->form_validation->set_rules('agree', 'Terms And Conditions', 'required');


        //print_r($this->input->post()); die;

        if ($this->form_validation->run() == FALSE) {
          $this->template->load('frontend/front_end', 'frontend/register-choose-your-profile');
      } 
      else {


        $username = $this->input->post('email');
        $email = $this->input->post('email');
        $password = $this->input->post('cpass');

        $st = $this->input->post('levels[]');

                $st1 = implode(',',$st);

             // $data = ['level' => $st1];

        $additional_data = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'countrys' => $this->input->post('country'),
            'state' => $this->input->post('city'),
            'skype' => $this->input->post('skype'),
            'facebook' => $this->input->post('facebook'),
            'agree' => $this->input->post('agree'),
            'gender' => $this->input->post('gender'),
            'levels' =>$st1,
            'active'=>"0",
            'hash' => md5(rand(0, 1000))

        ];



     // echo   $additional_data['hash']; die;
        //print_r($additional_data); die;

        $group = array('3');

        if ($this->ion_auth->register($username, $password, $email, $additional_data, $group) == TRUE) {

                                     $this->ion_auth->login($username, $password); 

              $user = $this->ion_auth->user()->row();
              
              $post1 = User::find_by_id($user->id);


                                $post1->update_attributes(array('active' => '0'));

                                $this->ion_auth->logout();

           

            require_once(APPPATH.'libraries/class.phpmailer.php');
            $mail             = new PHPMailer();

             $body= /*-----------email body starts-----------*/

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
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Thanks for signing up, '.$_POST['first_name'].'</font>
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
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account has been created.&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Please click this link to activate your account:</span>
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
             <span style="font-size: 26px; text-decoration: none;"><a href="' . base_url() . 'frontend/register/verify?' . 
                'email=' . $email . '&hash=' . $additional_data['hash'].'">Activate</a></span>
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

            $mail->Subject    = 'Admin - account activation';

           

            $mail->MsgHTML($body);


            $mail->AddAddress($email);

            $mail->Send();
            
            

            $this->session->set_flashdata('acc1', 'Your Account is created check mail for Email varfication');
            $this->session->keep_flashdata('acc1', 'Your Account is created check mail for Email varfication');
                            
            redirect('home', 'refresh');


        } 
        else {
            $this->session->set_flashdata('fail', 'fails');
            redirect(base_url() . 'frontend/register-choose-your-profile');
        }



    }
}

function individual_registers() {
        if (!$this->ion_auth->logged_in())
          {
                  redirect('frontend/auth_login/main', 'refresh');
          }

        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('skype', 'Skype', 'required');
        $this->form_validation->set_rules('facebook', 'Facebook', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('levels[]', 'Select Level', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('agree', 'Terms And Conditions', 'required');


        if ($this->form_validation->run() == FALSE) {
          $this->template->load('frontend/front_end', 'frontend/register-choose-your-profile1');
      } 
      else {

            $id = $user->id;
            $user_id = $user->id;
            $group_id = 2;
             
            $st = $this->input->post('levels[]');

             $st1 = implode(',',$st);
  

            $data = [
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'skype' => $this->input->post('skype'),
            'facebook' => $this->input->post('facebook'),
            'countrys' => $this->input->post('country'),
            'state' => $this->input->post('city'),
             'levels' =>$st1,
             'active'=>0,
            'agree' => $this->input->post('agree'),
            'gender' => $this->input->post('gender')

        ];


              if ($this->ion_auth->update($id, $data) == TRUE) {
                if ($this->ion_auth->remove_from_group($group_id, $user_id) == TRUE) {
                    $group_id = 3;
                    if ($this->ion_auth->add_to_group($group_id, $user_id)) {
                      
                        $this->ion_auth->logout();
                         $this->session->set_flashdata('acc1', ' Your Account is Succussful Created, Please Login');
                        redirect('home', 'refresh');
                        // $this->template->load('frontend/front_login_user_end', 'frontend/index');
                    }
                } else {
                    $this->session->set_flashdata('fail', 'fail');
                    redirect(base_url() . 'frontend/register-choose-your-profile1');
                }
            } else {
                $this->session->set_flashdata('fail', 'fail');
                redirect(base_url() . 'frontend/register-choose-your-profile');
            }

    }

}

    function verify() {
         $result = User::find_by_email($_GET['email']); //get the hash value which belongs to given email from database
         if($result){ 
            if($result->hash==$_GET['hash']){  //check whether the input hash value matches the hash value retrieved from the database
                $result->update_attributes(array('active' => 1,'agree'=> 1,'hash'=>md5(rand(0, 1000))));

                $this->session->set_flashdata('verify1', ' Your Account is active, Now you Can Login');

                 redirect('home','refresh');

                 //update the status of the user as verified
                /*---Now you can redirect the user to whatever page you want---*/
            }

            else{

            $this->session->set_flashdata('verifyfail1', ' Your Account is not active, please contact admin');

                 redirect('home','refresh');

            }
         }

         
    }





    function teacher_register() {
       

        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();
        //$this->form_validation->set_rules('fee', 'Fee', 'required');
        $this->form_validation->set_rules('teach1', 'Select', 'required');
        $this->form_validation->set_rules('first_name', ' Name', 'required');
        
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('skype', 'Skype Id', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('education', 'Educational', 'required');
        $this->form_validation->set_rules('university', 'University', 'required');
// print_r($this->input->post()); die;
        if($this->input->post('lang1'))
        {
          
          $this->form_validation->set_rules('lang1', 'Language', 'required');

        }

        if($this->input->post('subject'))
        {
            $this->form_validation->set_rules('subject', 'Subject', 'required');
        }

        $this->form_validation->set_rules('experiance', 'Experiance', 'required');
        //$this->form_validation->set_rules('mhri', 'Minimum Houly Rate Individual Classes ', 'required');
       // $this->form_validation->set_rules('mhrg', 'Minimum Houly Rate Group Classes', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]|matches[cpass]');
        $this->form_validation->set_rules('cpass', 'Password Confirmation', 'required|min_length[8]');
        $this->form_validation->set_rules('agree', 'Terms & Conditions', 'required');
        $this->form_validation->set_rules('agree1', 'Terms  Consulting Agreeement', 'required');
// $this->form_validation->set_rules('agree', 'Agree', 'required');
        // if (empty($_FILES['files']['name'])) {
        //     $this->form_validation->set_rules('files', 'Upload Resume', 'required');
        // }
        // if (empty($_FILES['files1']['name'])) {
        //     $this->form_validation->set_rules('files1', 'Upload vedio', 'required');
        // }
        if ($this->form_validation->run() == FALSE){
            $this->template->load('frontend/front_end', 'frontend/forign-fee-registration');
//$this->template->load('frontend/front_login_user_end', 'frontend/teacherpaid');
        }
        else {
            // $config = array(
            //     'upload_path' => "./uploads",
            //     'allowed_types' => "doc|docx|rtf|pdf",
            //     'max_size' => "300kb",
            //     'encrypt_name' => TRUE);
            // $this->load->library('upload', $config);
            // $this->upload->initialize($config);
            // $this->upload->do_upload('files');
            // $doc = $this->upload->data('file_name');
            // /* upload video */
            // $config = array(
            //     'upload_path' => "./uploads/video",
            //     'allowed_types' => "mp4|avi",
            //     'max_size' => "512000kb",
            //     'encrypt_name' => TRUE);
            // $this->load->library('upload', $config);
            // $this->upload->initialize($config);
            // $this->upload->do_upload('files1');
         //   $ved = $this->upload->data('file_name');
            $username = $this->input->post('email');
            $email = $this->input->post('email');
            $password = $this->input->post('pass');
            $additional_data = [
                'agree' => $this->input->post('agree'),
                'agree1' => $this->input->post('agree1'),
                'gender' => $this->input->post('gender'),
                'first_name' => $this->input->post('first_name')

            ];

                        $group = array('4');
                        $insert_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);

                        $this->ion_auth->login($username, $password); 
               
                           $user = $this->ion_auth->user()->row();
                
                            $data['success'] = true;
               
                
            

                        if ($insert_id) {


                            $data = [
                                'user_id' => $insert_id,
                               // 'fee' => $this->input->post('fee'),
                                'lang1' => $this->input->post('lang1'),
                                'subject' => $this->input->post('subject'),
                                'teach1' =>$this->input->post('teach1'),
                              //  'mhri' => $this->input->post('mhri'),
                               // 'mhrg' => $this->input->post('mhrg'),
                                'mobile' => $this->input->post('mobile'),
                                'education' => $this->input->post('education'),
                                'university' => $this->input->post('university'),
                                'city' => $this->input->post('city'),
                                'country' => $this->input->post('country'),
                                'skype' => $this->input->post('skype'),
                                'age' => $this->input->post('age'),
                                'experiance' => $this->input->post('experiance'),
                                //'certificates' => $this->input->post('certificates'),
                                //'specilization' => $this->input->post('specilization')
                            ];
                            // if (!empty($_FILES['files']['name'])) {
                            //     $data['userfile'] = $doc;
                            // }
                            // if (!empty($_FILES['files1']['name'])) {
                            //     $data['vedio'] = $ved;
                            // }


                            $teacher_data = Teacher::create($data);
                            if ($teacher_data == TRUE)
                            {

                                $user_id = $insert_id;

                                $post1 = User::find_by_id($user_id);


                                $post1->update_attributes(array('active' => '0'));



                                $this->session->set_flashdata('succ', 'Success data is updated');
                                        // if ($this->input->post('fee') == 'free') {
                                        //     $this->ion_auth->logout();
                                        //     $this->template->load('frontend/front_end', 'frontend/completed-registration');
                                        // }
                                        // else{
                                        //     $data['userss'] = $user_id;
                                        //                             $data1 = ['user_id' => $user_id];
                                        //                             $this->session->set_userdata($data1);
                                        //     $this->template->load('frontend/front_end', 'frontend/teacherpaid',$data);
                                        // }



                                                                                                    require_once(APPPATH.'libraries/class.phpmailer.php');
            $mail1             = new PHPMailer();

             $body= /*-----------email body starts-----------*/

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
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Thanks for signing up, '.$_POST['first_name'].'</font>
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
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account has been created.&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account activated in 2 days:</span>
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

            $mail1->Subject    = 'Admin - account activation';

           

            $mail1->MsgHTML($body);


            $mail1->AddAddress($post1->email);

            $mail1->Send();

                                        //print_r($this->session->all_userdata());
                                      // $this->session->sess_destroy();
                                        $this->template->load('frontend/front_end', 'frontend/completed-registration');
                                       // redirect('frontend/auth_login','refresh');


                                    }

                                else
                                {

                                    $this->session->set_flashdata('fail', 'Fail to update');
                                    redirect('frontend/register/teacher_profile', 'refresh');
                                }



                
            }
        }
    }


    function teacher_registers() {

     if (!$this->ion_auth->logged_in())
     {
      redirect('frontend/auth_login/main', 'refresh');
  }
  $user = $this->ion_auth->user()->row();
  $groups = $this->ion_auth->groups()->result_array();
  $currentGroups = $this->ion_auth->get_users_groups()->result();

  $this->form_validation->set_rules('fee', 'Fee', 'required');
  $this->form_validation->set_rules('teach1', 'Select', 'required');
  $this->form_validation->set_rules('first_name', ' Name', 'required');


  $this->form_validation->set_rules('skype', 'Skype Id', 'required');
  $this->form_validation->set_rules('gender', 'Gender', 'required');
  $this->form_validation->set_rules('country', 'Country', 'required');
  $this->form_validation->set_rules('city', 'City', 'required');
  $this->form_validation->set_rules('education', 'Educational', 'required');
  $this->form_validation->set_rules('university', 'University', 'required');

  if($this->input->post('lang1'))
  {
    $this->form_validation->set_rules('lang1', 'Language', 'required');
}

if($this->input->post('subject'))
{
    $this->form_validation->set_rules('subject', 'Subject', 'required');
}

$this->form_validation->set_rules('experiance', 'Experiance', 'required');


$this->form_validation->set_rules('agree', 'Terms & Conditions', 'required');
$this->form_validation->set_rules('agree1', 'Terms  Consulting Agreeement', 'required');
// $this->form_validation->set_rules('agree', 'Agree', 'required');
// if (empty($_FILES['files']['name'])) {
//     $this->form_validation->set_rules('files', 'Upload Resume', 'required');
// }
// if (empty($_FILES['files1']['name'])) {
//     $this->form_validation->set_rules('files1', 'Upload vedio', 'required');
// }
if ($this->form_validation->run() == FALSE){
    $this->template->load('frontend/front_end', 'frontend/forign-fee-registration1');
//$this->template->load('frontend/front_login_user_end', 'frontend/teacherpaid');
}
else {
    // $config = array(
    //     'upload_path' => "./uploads",
    //     'allowed_types' => "doc|docx|rtf|pdf",
    //     'max_size' => "300kb",
    //     'encrypt_name' => TRUE);
    // $this->load->library('upload', $config);
    // $this->upload->initialize($config);
    // $this->upload->do_upload('files');
    // $doc = $this->upload->data('file_name');
    //  upload video 
    // $config = array(
    //     'upload_path' => "./uploads/video",
    //     'allowed_types' => "mp4|avi",
    //     'max_size' => "5120kb",
    //     'encrypt_name' => TRUE);
    // $this->load->library('upload', $config);
    // $this->upload->initialize($config);
    // $this->upload->do_upload('files1');
    // $ved = $this->upload->data('file_name');

    $data = [
        'agree' => $this->input->post('agree'),
        'agree1' => $this->input->post('agree1'),
        'gender' => $this->input->post('gender'),
        'first_name' => $this->input->post('first_name')

    ];
    $id = $user->id;


    if ($this->ion_auth->update($id, $data)) {


        $data = [
            'user_id' => $id,
            // 'fee' => $this->input->post('fee'),
            'lang1' => $this->input->post('lang1'),
            'subject' => $this->input->post('subject'),
            'teach1' =>$this->input->post('teach1'),
            
            'mobile' => $this->input->post('mobile'),
            'education' => $this->input->post('education'),
            'university' => $this->input->post('university'),
            'city' => $this->input->post('city'),
            'country' => $this->input->post('country'),
            'skype' => $this->input->post('skype'),
            'age' => $this->input->post('age'),
            'experiance' => $this->input->post('experiance'),
            
        ];
        // if (!empty($_FILES['files']['name'])) {
        //     $data['userfile'] = $doc;
        // }
        // if (!empty($_FILES['files1']['name'])) {
        //     $data['vedio'] = $ved;
        // }


        $teacher_data = Teacher::create($data);



        if ($teacher_data == TRUE) {

            $post1 = User::find_by_id($user->id);


            $user_id = $user->id;
            $group_id = 2;
                          $data1 = ['user_id' => $user_id];
                            $this->session->set_userdata($data1);

            if ($this->ion_auth->remove_from_group($group_id, $user_id) == TRUE) {
                $group_id = 4;
                if ($this->ion_auth->add_to_group($group_id, $user_id)) {

                    $post1->update_attributes(array('active' => '0'));

                    $this->session->set_flashdata('succ', 'Success data is updated');
                        // echo 'YES';
                        //redirect('frontend/auth_login/main', 'refresh');

                    
                                                                    require_once(APPPATH.'libraries/class.phpmailer.php');
            $mail1             = new PHPMailer();

             $body= /*-----------email body starts-----------*/

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
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Thanks for signing up, '.$_POST['first_name'].'</font>
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
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account has been created.&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account activated in 2 days:</span>
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

            $mail1->Subject    = 'Admin - account activation';

           

            $mail1->MsgHTML($body);


            $mail1->AddAddress($user->email);

            $mail1->Send();

                       //$this->ion_auth->logout();
                        //$this->session->sess_destroy();
                       $this->template->load('frontend/front_end', 'frontend/completed-registration');
                   
                   
            }
        } else {
            $this->session->set_flashdata('fail', 'Fail to update');
            $this->template->load('frontend/front_end', 'frontend/completed-registration');
        }
    } else {
        $this->session->set_flashdata('fail', 'Fail to update');
        $this->template->load('frontend/front_end', 'frontend/completed-registration');
    }


}
else {
    $this->session->set_flashdata('fail', 'Fail to update');
    $this->template->load('frontend/front_end', 'frontend/completed-registration');
}

}
}

    function institution_register() {

       
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();

        $this->form_validation->set_rules('institute_name', 'Institute Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('agree', 'Terms & Conditions', 'required');
       
        $this->form_validation->set_rules('cpass', 'Password', 'required|min_length[8]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
       // $this->form_validation->set_rules('fee', 'Select Fee Type', 'required');

        


        if ($this->form_validation->run() == FALSE) 
            {
                $this->template->load('frontend/front_end', 'frontend/teaching-center-fee');
            } 
        else 
        {



            $username = $this->input->post('email');
            $email = $this->input->post('email');
            $password = $this->input->post('cpass');
            $additional_data = [
                'agree' => $this->input->post('agree'),
                 'hash' => md5(rand(0, 1000))
                
                
            ];


            //print_r($additional_data);die;

            
            $group = array('5');
           $insert_id = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
           //echo $insert_id; die;
            if ($insert_id) {
                
                 $data = [
                'user_id' => $insert_id,
                'contact_name'  =>$this->input->post('contact_name'),
                'institute_name'  =>$this->input->post('institute_name'),
                'skype_id'  =>$this->input->post('skype_id'),
                'mobile'  =>$this->input->post('mobile'),
                'fee_insti'     =>$this->input->post('fee'),
                'website'     =>$this->input->post('website')
                
            ];
                    $post1 = User::find_by_id($insert_id);
                    $post1->update_attributes(array('active' => '0'));

            $teacher_data = Center::create($data);
            
                             if ($teacher_data == TRUE)
                              {
                                
                                

                                                // $post1 = User::find_by_id($insert_id);

                                                $group_id1 = $users_groups = $this->ion_auth_model->get_users_groups($insert_id)->result();
                                               $user_id = $insert_id;
                                               

                                            
                                        if(($group_id1[0]->id) == 5)
                                        {
                                            


                                                            $group_id = 5;
                                                        if ($this->ion_auth->remove_from_group($group_id, $user_id) == TRUE) 
                                                        {
                                                            $group_id = 5;
                                                                if ($this->ion_auth->add_to_group($group_id, $user_id)) 
                                                                {

                                                                     $post1->update_attributes(array('active' => '0'));

                                                                    
                                                                    $data['userss'] = $user_id;
                                                                    $data1 = ['user_id' => $user_id];
                                                                    $this->session->set_userdata($data1);
                                                                    

                                                                    require_once(APPPATH.'libraries/class.phpmailer.php');
            $mail1             = new PHPMailer();

             $body= /*-----------email body starts-----------*/

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
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Thanks for signing up, '.$_POST['institute_name'].'</font>
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
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account has been created.&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Please click this link to activate your account:</span>
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
             <span style="font-size: 26px; text-decoration: none;"><a href="' . base_url() . 'frontend/register/verify?' . 
                'email=' . $email . '&hash=' . $additional_data['hash'].'">Activate</a></span>
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

            $mail1->Subject    = 'Admin - account activation';

           

            $mail1->MsgHTML($body);


            $mail1->AddAddress($email);

            $mail1->Send();
                                                        $this->session->set_flashdata('acc1', 'Your Account is Created Activated within 2 Days');
           
                                                                    redirect('home','refresh');
                                                                }

                                                         
                                                               else 
                                                                {
                                                                    $this->session->set_flashdata('fail', 'Fail to update');
                                                                    redirect('frontend/register/center', 'refresh');
                                                                }

                                                        }
                 
                                
                            }
                            else
                            {
                              $this->session->set_flashdata('mess', '<div class="alert alert-success text-center" > Your Account is Succussful Created, Please Login</div>',5);
                                    redirect('frontend/auth_login/institute_fee', 'refresh');
                                
                            }
                
             

        }
    }
  }
}


   function institution_registers() {

       if (!$this->ion_auth->logged_in())
         {
          redirect('frontend/auth_login/main', 'refresh');
         }
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();

        $this->form_validation->set_rules('institute_name', 'Institute Name', 'required');
        $this->form_validation->set_rules('agree', 'Terms & Conditions', 'required');
       
        //$this->form_validation->set_rules('fee', 'Select Fee Type', 'required');

        


        if ($this->form_validation->run() == FALSE) 
            {
                $this->template->load('frontend/front_end', 'frontend/teaching-center-fee1');
            } 
        else 
        {



            
            $data = [
                'agree' => $this->input->post('agree'),
                 'hash' => md5(rand(0, 1000))
                

                
            ];


            //print_r($additional_data);die;

            
            $id = $user->id;
            $insert_id =$id;
           //echo $insert_id; die;
            if ($this->ion_auth->update($id, $data)) {
                
                 $data = [
                'user_id' => $insert_id,
                'contact_name'  =>$this->input->post('contact_name'),
                'institute_name'  =>$this->input->post('institute_name'),
                'skype_id'  =>$this->input->post('skype_id'),
                'mobile'  =>$this->input->post('mobile'),
                'fee_insti'     =>$this->input->post('fee'),
                'website'     =>$this->input->post('website')
                
            ];
                   

            $teacher_data = Center::create($data);
            
                                 if ($teacher_data == TRUE) {

                 $post1 = User::find_by_id($user->id);

                $user_id = $user->id;
                $group_id = 2;

                $data1 = ['user_id' => $user_id];
                            //$this->session->set_userdata($data1);

                if ($this->ion_auth->remove_from_group($group_id, $user_id) == TRUE) {
                    $group_id = 5;
                    if ($this->ion_auth->add_to_group($group_id, $user_id)) {

                         $post1->update_attributes(array('active' => '0'));

                        $this->session->set_flashdata('acc1', 'Your Account is Created Activated within 2 Days');

                                                                 require_once(APPPATH.'libraries/class.phpmailer.php');
            $mail1             = new PHPMailer();

             $body= /*-----------email body starts-----------*/

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
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Thanks for signing up, '.$_POST['institute_name'].'</font>
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
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Your account has been created.&nbsp;</font>
             </div>
             <div style="">
             <font style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">
             <br>
             </font>
             </div>
             <div style="">
             <span style="font-family: Impact; font-size: x-large; color: rgb(0, 51, 0);">Please click this link to activate your account:</span>
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
             <span style="font-size: 26px; text-decoration: none;"><a href="' . base_url() . 'frontend/register/verify?' . 
                'email=' . $email . '&hash=' . $additional_data['hash'].'">Activate</a></span>
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

            $mail1->Subject    = 'Admin - account activation';

           

            $mail1->MsgHTML($body);


            $mail1->AddAddress($email);

            $mail1->Send();
                        redirect('home','refresh');
                    }
                } else {
                    $this->session->set_flashdata('fail', 'Fail to update');
                    redirect('frontend/register/centers', 'refresh');
                }
            } else {
                $this->session->set_flashdata('fail', 'Fail to update');
                redirect('frontend/register/centers', 'refresh');
            }
                
             

        }

         else {
                $this->session->set_flashdata('fail', 'Fail to update');
                redirect('frontend/register/centers', 'refresh');
            }
    }
  }

              
        
    

    public function payment_registration() {
        $this->template->load('frontend/front_login_user_end', 'content/payment_credit_form');
    }

    function view() {
        $data['title'] = "Choose Your Profile";
        $this->template->load('frontend/front_login_user_end', 'frontend/choose-your-profile', $data);
    }

    function main() {
        $data['title'] = "Home";
        $this->template->load('frontend/front_login_user_end', 'frontend/index', $data);
    }

    function teacher_profile() {
        $data['title'] = "profile";
        $this->template->load('frontend/front_login_user_end', 'frontend/forign-fee-registration', $data);
    }

    function teacher_profiles() {
        $data['title'] = "profile";
        $this->template->load('frontend/front_login_user_end', 'frontend/forign-fee-registration1', $data);
    }

    function center() {
        $data['title'] = "profile";
        $this->template->load('frontend/front_login_user_end', 'frontend/teaching-center-fee', $data);
    }

    function centers() {
        $data['title'] = "profile";
        $this->template->load('frontend/front_login_user_end', 'frontend/teaching-center-fee1', $data);
    }

}
