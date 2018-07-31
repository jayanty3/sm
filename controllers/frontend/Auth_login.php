<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->config('ion_auth', true);
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'upload', 'pagination', 'session','cart'));
        $this->load->helper(array('url', 'language'));
        $this->load->model('Pagination_Model');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    function index() {
        $group = array('teacher', 'student', 'institute', 'members');
        if (!$this->ion_auth->logged_in()) {
            redirect('frontend/Auth_login/main', 'refresh');
        } elseif (!$this->ion_auth->in_group($group)) {
            $this->session->set_flashdata('message', 'You must be an teacher or student or institute to view this page.');
            redirect('home', 'refresh');
        } else {

            if ($this->ion_auth->in_group('teacher')) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->data['users'] = $this->ion_auth->users()->result();
                foreach ($this->data['users'] as $k => $user) {
                    $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
                }
                // $this->template->load('frontend/front_login_user_end', 'frontend/teacher-profile-main', $this->data);
                //$this->load->view('frontend/teacher-profile-main', $this->data);
                redirect('teacher-profile', 'refresh');
            } elseif ($this->ion_auth->in_group('student')) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->data['users'] = $this->ion_auth->users()->result();
                foreach ($this->data['users'] as $k => $user) {
                    $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
                }
                // $this->template->load('frontend/front_login_user_end','frontend/teacher-list',$this->data);
                redirect('individual', 'refresh');
            } elseif ($this->ion_auth->in_group('institute')) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->data['users'] = $this->ion_auth->users()->result();
                foreach ($this->data['users'] as $k => $user) {
                    $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
                }
                    redirect('institute-profile', 'refresh');
                //$this->template->load('frontend/front_login_user_end', 'frontend/index', $this->data);
            } elseif ($this->ion_auth->in_group('members')) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->data['users'] = $this->ion_auth->users()->result();
                foreach ($this->data['users'] as $k => $user) {
                    $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
                }
                $this->template->load('frontend/front_login_user_end', 'frontend/choose-your-profile', $this->data);
            } else {
                
            }
        }
    }

    public function login() {
    
    $data  = array('success'=> false,'message' =>array());

        $this->data['title'] = $this->lang->line('login_heading');
        //validate form input
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required|valid_email');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        if ($this->form_validation->run() === TRUE) {

            //$data['success'] = true;
       if($this->ion_auth->email_check($this->input->post('identity'))){
      
             if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'))) {
                //$this->session->set_flashdata('', $this->ion_auth->messages());
                $user = $this->ion_auth->user()->row();
                // echo "<pre>";
                // print_r($user->is_verified);exit;
               $data['success'] = true;
               // redirect('frontend/Auth_login', 'refresh');
                
            } else {
                

                // redirect('frontend/Auth_login/main', 'refresh');
                $data['error'] = $this->ion_auth->errors();
        header("content-type:application/json");
        echo json_encode($data);
        exit;
              $data['error'] = $this->ion_auth->errors();
                
            }
         } else{

                $data['error'] = "Email id not Exist";

         }


        } else {
            
            foreach ($_POST as $key => $value) {
                $data['message'][$key] = form_error($key);
            }
          
        }
        echo json_encode($data);
    }




    public function logout() {
        $this->data['title'] = "logout";
        $logout = $this->ion_auth->logout();
        // $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('home', 'refresh');
    }

    public function fb_login() {
        if ($this->facebook->fb_callback()) {
            redirect('frontend/Auth_login');
        } else {
            show_error('erreur');
        }
    }

    public function fb_register() {
        if ($this->facebook->fb_callback()) {
            redirect('frontend/Auth_login');
        } else {
            show_error('erreur');
        }
    }


     public function disconnectFacebook() {
        $this->facebook->disconnectFacebookAccount();
        redirect();
    }

    public function connectFacebook() {
        $this->facebook->connectFacebookAccount();
        redirect();
    }


    public function editprofile() {
        $this->data['title'] = 'edit profile';
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('skype', 'Skype', 'required');
        $this->form_validation->set_rules('facebook', 'Facebook', 'required');
        $this->form_validation->set_rules('levels[]', 'Select Level', 'required');

        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_rules('image', 'images');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('frontend/front_login_user_end', 'frontend/editindiprofile', $this->data);
        } else {
            $config = array(
                'upload_path' => "./uploads/images",
                'allowed_types' => "png|jpg|jpeg",
                'max_size' => "2048kb",
                'encrypt_name' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('image');
            $id = $user->id;

            $st = $this->input->post('levels[]');

                $st1 = implode(',',$st);

            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('city'),
                'skype' => $this->input->post('skype'),
                'facebook' => $this->input->post('facebook'),
                'levels' =>$st1,
                    // 'images'     => $this->upload->data('file_name'),
            ];
            if (!empty($_FILES['image']['name'])) {
                $data['images'] = $this->upload->data('file_name');
            }

            if ($this->ion_auth->update($id, $data) == TRUE) {
                $this->session->set_flashdata('succ', 'update');
                redirect('frontend/auth_login/indiprofile');
            } else {
                $this->session->set_flashdata('fail', 'fail');
                redirect('frontend/auth_login/editindiprofile');
            }
        }
    }

    public function edit_forign_registration() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
          
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
        

        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();
        

      
        if ($this->form_validation->run() == FALSE) {
             $this->load->view('frontend/teacher-profile-main-edit');
        } else {

            
                    $config = array(
                'upload_path' => "./uploads",
                'allowed_types' => "doc|docx|rtf|pdf",
                'max_size' => "300kb",
                'encrypt_name' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('files');
            $doc = $this->upload->data('file_name');


            $data = [


                               
                                'lang1' => $this->input->post('lang1'),
                                'subject' => $this->input->post('subject'),
                                'teach1' =>$this->input->post('teach1'),
                                // 'mhri' => $this->input->post('mhri'),
                                // 'mhrg' => $this->input->post('mhrg'),
                                'mobile' => $this->input->post('mobile'),
                                'education' => $this->input->post('education'),
                                'university' => $this->input->post('university'),
                                'city' => $this->input->post('city'),
                                'country' => $this->input->post('country'),
                                'skype' => $this->input->post('skype'),
                                'age' => $this->input->post('age'),
                                'experiance' => $this->input->post('experiance'),
                                
                                'specilization' => $this->input->post('specilization')
                
            ];
             if (!empty($_FILES['files']['name'])) {
                               
                                $data = ['userfile' => $doc ];
                            }
           

            // $teacher =   Teacher::find_by_sql('SELECT * FROM teachers LEFT OUTER JOIN users
            //                       ON teachers.user_id = users.id');
            //     foreach($teacher as $g) 
            //       {
            //             $id  = $g->id;
            //       }
            $teach = Teacher::find_by_user_id($user->id);

            if ($teach->update_attributes($data)) {
                $post1 = User::find_by_id($user->id);
                
                $post1->update_attributes(array('gender' => $this->input->post('gender'),'first_name'=>$this->input->post('first_name')));
                $this->session->set_flashdata('succ', 'Succussful updated');
                redirect('frontend/auth_login/edit_forign_fee_registration', 'refresh');
            } else {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('frontend/auth_login/edit_forign_fee_registration', 'refresh');
            }
        }
    }

    public function teacherpaid() {

        
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();
        $this->form_validation->set_rules('fee', 'Fee', 'required');
        $this->form_validation->set_rules('teach1', 'Select', 'required');
        $this->form_validation->set_rules('first_name', ' Name', 'required');
        
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email');
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
        $this->form_validation->set_rules('mhri', 'Minimum Houly Rate Individual Classes ', 'required');
        $this->form_validation->set_rules('mhrg', 'Minimum Houly Rate Group Classes', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]|matches[cpass]');
        $this->form_validation->set_rules('cpass', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('agree', 'Terms & Conditions', 'required');
// $this->form_validation->set_rules('agree', 'Agree', 'required');
      if ($this->form_validation->run() == FALSE) {

            $this->template->load('frontend/front_end', 'frontend/teacherpaid');
        }

         else {

            
            $email = $this->input->post('email');
            $config = array(
                'upload_path' => "./uploads",
                'allowed_types' => "doc|docx|rtf|pdf",
                'max_size' => "300kb",
                'encrypt_name' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('files');
            $doc = $this->upload->data('file_name');
            /* upload video */
            $config = array(
                'upload_path' => "./uploads/video",
                'allowed_types' => "mp4|avi",
                'max_size' => "5120kb",
                'encrypt_name' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('files1');
            $ved = $this->upload->data('file_name');
            

                        


                            $data = [
                               
                                'fee' => $this->input->post('fee'),
                                'lang1' => $this->input->post('lang1'),
                                'subject' => $this->input->post('subject'),
                                'teach1' =>$this->input->post('teach1'),
                                'mhri' => $this->input->post('mhri'),
                                'mhrg' => $this->input->post('mhrg'),
                                'mobile' => $this->input->post('mobile'),
                                'education' => $this->input->post('education'),
                                'university' => $this->input->post('university'),
                                'city' => $this->input->post('city'),
                                'country' => $this->input->post('country'),
                                'skype' => $this->input->post('skype'),
                                'age' => $this->input->post('age'),
                                'experiance' => $this->input->post('experiance'),
                                'certificates' => $this->input->post('certificates'),
                                'specilization' => $this->input->post('specilization')
                            ];
                            if (!empty($_FILES['files']['name'])) {
                                $data['userfile'] = $doc;
                            }
                            if (!empty($_FILES['files1']['name'])) {
                                $data['vedio'] = $ved;
                            }


         

                             $user = User::find_by_id($this->session->userdata('user_id'));

          $email1 =  $user->email;
            $teach = Teacher::find_by_user_id($user->id);

            if ($teach->update_attributes($data)) {
                $post1 = User::find_by_id($user->id);
                
                $post1->update_attributes(array('active' => 0));
                $this->session->set_flashdata('succ', 'Succussful updated');

                  require_once(APPPATH.'libraries/class.phpmailer.php');
        $mail             = new PHPMailer();
        $body = $this->load->view('frontend/booking-invoice',$teach,true);
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

       $mail->Send(); 
        
            
       
       //$distroy= $this->cart->destroy();

 echo "<script> alert('Payment Successful Please Check Your Mail');</script>";

                //redirect('frontend/auth_login/teacherprofile', 'refresh');
               // $this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
                 $this->ion_auth->logout();
                 $this->template->load('frontend/front_end', 'frontend/completed-registration');
            } else {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('frontend/auth_login/teacherpaid', 'refresh');
            }
        }
    }


    public function teacherpaids() {
if ((!$this->ion_auth->logged_in())) {
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
        $this->form_validation->set_rules('mhri', 'Minimum Houly Rate Individual Classes ', 'required');
        $this->form_validation->set_rules('mhrg', 'Minimum Houly Rate Group Classes', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[8]|matches[cpass]');
        $this->form_validation->set_rules('cpass', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('agree', 'Terms & Conditions', 'required');
// $this->form_validation->set_rules('agree', 'Agree', 'required');
      if ($this->form_validation->run() == FALSE) {

            $this->template->load('frontend/front_end', 'frontend/teacherpaids');
        }

         else {

            
            $email = $this->input->post('email');
            $config = array(
                'upload_path' => "./uploads",
                'allowed_types' => "doc|docx|rtf|pdf",
                'max_size' => "300kb",
                'encrypt_name' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('files');
            $doc = $this->upload->data('file_name');
            /* upload video */
            $config = array(
                'upload_path' => "./uploads/video",
                'allowed_types' => "mp4|avi",
                'max_size' => "5120kb",
                'encrypt_name' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('files1');
            $ved = $this->upload->data('file_name');
            

                        


                            $data = [
                               
                                'fee' => $this->input->post('fee'),
                                'lang1' => $this->input->post('lang1'),
                                'subject' => $this->input->post('subject'),
                                'teach1' =>$this->input->post('teach1'),
                                'mhri' => $this->input->post('mhri'),
                                'mhrg' => $this->input->post('mhrg'),
                                'mobile' => $this->input->post('mobile'),
                                'education' => $this->input->post('education'),
                                'university' => $this->input->post('university'),
                                'city' => $this->input->post('city'),
                                'country' => $this->input->post('country'),
                                'skype' => $this->input->post('skype'),
                                'age' => $this->input->post('age'),
                                'experiance' => $this->input->post('experiance'),
                                'certificates' => $this->input->post('certificates'),
                                'specilization' => $this->input->post('specilization')
                            ];
                            if (!empty($_FILES['files']['name'])) {
                                $data['userfile'] = $doc;
                            }
                            if (!empty($_FILES['files1']['name'])) {
                                $data['vedio'] = $ved;
                            }


         

                             $user = User::find_by_id($this->session->userdata('user_id'));

          $email1 =  $user->email;
            $teach = Teacher::find_by_user_id($user->id);

            if ($teach->update_attributes($data)) {
                $post1 = User::find_by_id($user->id);
                
                $post1->update_attributes(array('active' => 0));
                $this->session->set_flashdata('succ', 'Succussful updated');

                  require_once(APPPATH.'libraries/class.phpmailer.php');
        $mail             = new PHPMailer();
        $body = $this->load->view('frontend/booking-invoice',$teach,true);
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

       $mail->Send(); 
        
            
       
       //$distroy= $this->cart->destroy();

 echo "<script> alert('Payment Successful Please Check Your Mail');</script>";

                //redirect('frontend/auth_login/teacherprofile', 'refresh');
               // $this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
                 $this->ion_auth->logout();
                 $this->template->load('frontend/front_end', 'frontend/completed-registration');
            } else {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('frontend/auth_login/teacherpaids', 'refresh');
            }
        }
    }

    public function insti_edit_profile() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();

         $this->form_validation->set_rules('institute_name', 'Institute Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email');
        
       
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('frontend/front_login_user_end', 'frontend/edit_teaching_center');
        } else {

           


            $data = [

                'contact_name'  =>$this->input->post('contact_name'),
                'institute_name'  =>$this->input->post('institute_name'),
                'skype_id'  =>$this->input->post('skype_id'),
                'mobile'  =>$this->input->post('mobile'),
                'website'     =>$this->input->post('website')
                
            ];
         

            $center = Center::find_by_user_id($user->id);
            //               echo "<pre>";
            // print_r($center);exit;
            if ($center->update_attributes($data)) {
                $post1 = User::find_by_id($user->id);
                
                $post1->update_attributes(array('email' => $this->input->post('email')));
                $this->session->set_flashdata('succ', 'Succussful updated');
                redirect('frontend/auth_login/instiprofile', 'refresh');
            } else {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('frontend/auth_login/edit_insti_profile', 'refresh');
            }
        }
    }

    public function centerpaid() {
      
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();


        $this->form_validation->set_rules('institute_name', 'Institute Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email');
        $this->form_validation->set_rules('agree', 'Terms & Conditions', 'required');
        $this->form_validation->set_rules('fee', 'Select Fee Type', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->template->load('frontend/front_end', 'frontend/centerpaid');
        }

         else {

            
            $email = $this->input->post('email');
                   
           $data = [
                
                'contact_name'  =>$this->input->post('contact_name'),
                'institute_name'  =>$this->input->post('institute_name'),
                'skype_id'  =>$this->input->post('skype_id'),
                'mobile'  =>$this->input->post('mobile'),
                'fee_insti'     =>$this->input->post('fee'),
                'website'     =>$this->input->post('website')
                
            ];

           $user = User::find_by_id($this->session->userdata('user_id'));

            $email1 =  $user->email;
            $center = Center::find_by_user_id($user->id);
            //               echo "<pre>";
            // print_r($center);exit;
            if ($center->update_attributes($data)) {
                 $post1 = User::find_by_id($user->id);
                
                $post1->update_attributes(array('email' => $email));
                $this->session->set_flashdata('succ', 'Succussful updated');

                //redirect('frontend/auth_login/instiprofile', 'refresh');

                require_once(APPPATH.'libraries/class.phpmailer.php');
        $mail             = new PHPMailer();
        $body = $this->load->view('frontend/booking-invoice',$center, true);
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

        $mail->Send();
        
        
            
      // $this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
       //$distroy= $this->cart->destroy();

 echo "<script> alert('Payment Successful Please Check Your Mail');</script>";
                //$this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
                $this->ion_auth->logout();
                 $this->template->load('frontend/front_end', 'frontend/completed-registration');
            } else {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('frontend/auth_login/edit_insti_profile', 'refresh');
            }
        }
    }

    public function centerpaids() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
      
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();


        $this->form_validation->set_rules('institute_name', 'Institute Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|regex_match[/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/]|required|valid_email');
        $this->form_validation->set_rules('agree', 'Terms & Conditions', 'required');
        $this->form_validation->set_rules('fee', 'Select Fee Type', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->template->load('frontend/front_end', 'frontend/centerpaids');
        }

         else {

            
            $email = $this->input->post('email');
                   
           $data = [
                
                'contact_name'  =>$this->input->post('contact_name'),
                'institute_name'  =>$this->input->post('institute_name'),
                'skype_id'  =>$this->input->post('skype_id'),
                'mobile'  =>$this->input->post('mobile'),
                'fee_insti'     =>$this->input->post('fee'),
                'website'     =>$this->input->post('website')
                
            ];

           $user = User::find_by_id($this->session->userdata('user_id'));

            $email1 =  $user->email;
            $center = Center::find_by_user_id($user->id);
            //               echo "<pre>";
            // print_r($center);exit;
            if ($center->update_attributes($data)) {
                 $post1 = User::find_by_id($user->id);
                
                $post1->update_attributes(array('email' => $email));
                $this->session->set_flashdata('succ', 'Succussful updated');

                //redirect('frontend/auth_login/instiprofile', 'refresh');

                require_once(APPPATH.'libraries/class.phpmailer.php');
        $mail             = new PHPMailer();
        $body = $this->load->view('frontend/booking-invoice',$center, true);
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

        $mail->Send();
        
        
            
      // $this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
       //$distroy= $this->cart->destroy();

 echo "<script> alert('Payment Successful Please Check Your Mail');</script>";
                //$this->session->unset_userdata(array('email','PayerMail','saleId','Subtotal','Total'));
                $this->ion_auth->logout();
                 $this->template->load('frontend/front_end', 'frontend/completed-registration');
            } else {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('frontend/auth_login/edit_insti_profile', 'refresh');
            }
        }
    }

   
    public function main() {

         $search = ($this->input->post("teachSearch")) ? $this->input->post("teachSearch") : "NIL";


        // $search = ($this->uri->segment(4)) ? $this->uri->segment(4) : $search;

        $config['base_url'] = site_url('home');
        $config['first_url'] = '1';

        $config['total_rows'] = $this->Pagination_Model->get_data_count($search);
        $config['per_page'] = "29";
        $config["uri_segment"] = 2;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 4;  
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;                                 
        //floor($choice)
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Back';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#pag">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;


        // get books list
        $data['sta'] = $this->Pagination_Model->get_data($config["per_page"], $data['page'], NULL);

        $data['pagination'] = $this->pagination->create_links();
        // echo "<pre>";
        // echo $this->db->last_query();
        //  print_r($data["results"]);
        //  exit;
        if (!$this->ion_auth->logged_in()) {
            $data['title'] = 'Home';

            $this->template->load('frontend/front_end', 'frontend/home', $data);
        } else {
            $data['title'] = 'Home';

            $this->template->load('frontend/front_login_user_end', 'frontend/index', $data);
        }
    }

    public function search() {
        // get search string
        $search = ($this->input->get("teachSearch")) ? $this->input->get("teachSearch") : "NIL";
        $search = ($this->uri->segment(4)) ? $this->uri->segment(4) : $search;
        // pagination settings
        $config = array();
        $config['base_url'] = site_url("frontend/auth_login/search/$search");
        $config['total_rows'] = $this->Pagination_Model->get_data_count($search);
        $config['per_page'] = "29";
        $config["uri_segment"] = '5';
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 4;
        //floor($choice);
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // get books list
        $data['sta'] = $this->Pagination_Model->get_data($config['per_page'], $data['page'], $search);
        $data['pagination'] = $this->pagination->create_links();
        // echo "<pre>";
        // echo $this->db->last_query();echo "<br>";
        //  print_r($data['sta']);
        //  exit;
        //load view
        if (!$this->ion_auth->logged_in()) {
            $data['title'] = 'Home';

            $this->template->load('frontend/front_end', 'frontend/home', $data);
        } else {
            $data['title'] = 'Home';

            $this->template->load('frontend/front_login_user_end', 'frontend/index', $data);
        }
    }

    public function teacher_list() {

        $config['base_url'] = site_url('frontend/auth_login/teacher_list');
        $config['total_rows'] = $this->Pagination_Model->get_teacherdata_count();
        $config['per_page'] = "29";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Back';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;



        // get books list
        $data['sta'] = $this->Pagination_Model->get_teacherdata($config["per_page"], $data['page'], NULL);

        $data['pagination'] = $this->pagination->create_links();
         $data['total_record'] = $config['total_rows'];
        // echo "<pre>";
        // echo $this->db->last_query();
        //  print_r($data["results"]);
        //  exit;
        if (!$this->ion_auth->logged_in()) {
            $data['title'] = 'Home';

            $this->template->load('frontend/front_end', 'frontend/home', $data);
        } else {
            $data['title'] = 'Home';

            $this->template->load('frontend/front_login_user_end', 'frontend/teacher-list', $data);
        }
    }



    

    public function search_teacher_list_ajax() {

      // print_r($this->input->post("teachSearch")); die;
        // get search string
       
        $search = ($this->input->post("teachSearch")) ? $this->input->post("teachSearch") : "NIL";


      //  $search = ($this->input->post("teachSearch")) ? $this->input->post("teachSearch") : $search;


        $search = ($this->uri->segment(4)) ? $this->uri->segment(4) : $search;
        // pagination settings
        $config = array();
        $config['base_url'] = site_url("frontend/auth_login/search_teacher_list/$search");
        $config['total_rows'] = $this->Pagination_Model->get_teacherdata_count($search);
        $config['per_page'] = "30";
        $config["uri_segment"] = '5';
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // get books list
        $data['sta'] = $this->Pagination_Model->get_teacherdata($config['per_page'], $data['page'], $search);
        $data['pagination'] = $this->pagination->create_links();
         $data['total_record'] = $config['total_rows'];

        echo json_encode($data);
        //echo "<pre>";
       // echo $this->db->last_query();echo "<br>";
        // print_r($data['sta']);
         //exit;
        // if (!$this->ion_auth->logged_in()) {
        //     $this->data['title'] = 'Home';

        //     $this->template->load('frontend/front_end', 'frontend/home', $data);
        // } else {
             // $this->data['title'] = 'Teacher Search';

             // $this->template->load('frontend/front_login_user_end', 'frontend/teacher-list', $data);
        // }
    }


    public function search_teacher_list() {
        // get search string
        
        $search = ($this->input->post("teachSearch")) ? $this->input->post("teachSearch") : "NIL";


        $search = ($this->uri->segment(4)) ? $this->uri->segment(4) : $search;
        // pagination settings
        $config = array();
        $config['base_url'] = site_url("search-list/$search");
        $config['total_rows'] = $this->Pagination_Model->get_teacherdata_count($search);
        $config['per_page'] = "30";
        $config["uri_segment"] = '5';
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // get books list
        $data['sta'] = $this->Pagination_Model->get_teacherdata($config['per_page'], $data['page'], $search);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_record'] = $config['total_rows'];

        if (!$this->ion_auth->logged_in()) {
            $data['title'] = 'Home';

            $this->template->load('frontend/front_end', 'frontend/home', $data);
        } else {
             $data['title'] = 'Teacher Search';

             //redirect('search-list/','refresh');

             $this->template->load('frontend/front_login_user_end', 'frontend/teacher-list', $data);
        }
    }


public function student_list() {

        $config['base_url'] = site_url('frontend/auth_login/teacher_list');
        $config['total_rows'] = $this->db->count_all('teachers');
        $config['per_page'] = "25";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Back';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        // get books list
        $data['sta'] = $this->Pagination_Model->get_teacherdata($config["per_page"], $data['page'], NULL);

        $data['pagination'] = $this->pagination->create_links();
        // echo "<pre>";
        // echo $this->db->last_query();
        //  print_r($data["results"]);
        //  exit;
        if (!$this->ion_auth->logged_in()) {
            $this->data['title'] = 'Home';

            $this->template->load('frontend/front_end', 'frontend/home', $data);
        } else {
            $this->data['title'] = 'Home';

            $this->template->load('frontend/front_login_user_end', 'frontend/teacher-list', $data);
        }
    }
    

     public function rating() {
   
           $teacher_id = $this->input->post('teacher_id'); 
            $this->form_validation->set_rules('ratings', "Rating", 'required');
            $this->form_validation->set_message('rating_limit', 'Please rate 0 to 5');
            if ($this->form_validation->run() === false) {
                
                 redirect(base_url().'calenderview/teachersdetail/'.$teacher_id);
            } else {
                $data = array(
                    'teacher_id' => $this->input->post('teacher_id'),
                    'users_id' => $this->input->post('users_id'),
                    'ratings' => $this->input->post('ratings')
                );

                // print_r($data);exit;

              $teacher_id = $this->input->post('teacher_id'); 
              $users_id = $this->input->post('users_id');

              $rat = Ratting::find_by_users_id_and_teacher_id($users_id, $teacher_id);
              //print_r($rat);exit;

              if($rat)
                  {
                    $this->session->set_flashdata('fail', '<div class="alert alert-danger col-md-3">you have alreday rate</div>');
                    redirect(base_url().'calenderview/teachersdetail/'.$teacher_id);
                  }
                  else{
                $rating = Ratting::create($data);
                if ($rating) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success col-md-3">Success</div>');
                    redirect(base_url().'calenderview/teachersdetail/'.$teacher_id);
                } else {
                   $this->session->set_flashdata('fail', '<div class="alert alert-danger col-md-3">fail</div>');
                    redirect(base_url().'calenderview/teachersdetail/'.$teacher_id);
                }
              }
            }
        } 
    
    public function remaind(){
        $this->load->model('Remainder');
        $r = new Remainder;

        $data =  $r->classRemainder();
        foreach ($data as $d) {
                $date = $d->start;
                $teach_id = $d->teacher_id;
                $stu_id   = $d->indi_id;
                $user1 = $this->ion_auth->user($teach_id)->row();
                $user2 = $this->ion_auth->user($stu_id)->row();
                $user1->email;
                $user2->email;


         $stop_date = $date; 
         echo 'date before day adding: ' . $stop_date;
         $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' -1 day')); 
         echo 'date after adding 1 day: ' . $stop_date;
         echo $check = substr($stop_date,0,10);
         if(date('Y-m-d') == $check)
           {
            
          

          require_once(APPPATH.'libraries/class.phpmailer.php');
                    $mail             = new PHPMailer();
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
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Class Remainder, '.' tomorrow your class '.$date.'</font>
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







        // 'Class Remainder, '.'!
        //   tomorrow your class '.$date ;
        //$body = "This is Days Total Report";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "mail.designermore.com"; // SMTP server
        $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
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

        $mail->Subject    = 'Remainder for class';

       

        $mail->MsgHTML($body);


         $mail->AddAddress($user1->email);
        $mail->addBCC($user2->email);
        $mail->addCC('jayanty333@gmail.com');
        $sen1 = $mail->Send(); 
 } 

        }
    }

public function remaind1(){
        $this->load->model('Remainder');
        $r = new Remainder;

        $data =  $r->classRemainder();
        foreach ($data as $d) {
                $date = $d->start;
                $teach_id = $d->teacher_id;
                $stu_id   = $d->indi_id;
                $user1 = $this->ion_auth->user($teach_id)->row();
                $user2 = $this->ion_auth->user($stu_id)->row();
                $user1->email;
                $user2->email;


         $stop_date = $date; 
         echo 'date before day adding: ' . $stop_date;
         $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' -2 hours')); 
         echo 'date after adding 1 day: ' . $stop_date;
         echo $check = substr($stop_date,0,10);
         if(date('Y-m-d') == $check)
           {
            
          

          require_once(APPPATH.'libraries/class.phpmailer.php');
                    $mail             = new PHPMailer();
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
             <font style="font-size: -webkit-xxx-large; font-family: &quot;Trebuchet MS&quot;; color: rgb(0, 153, 0);">Class Remainder, '.' Today your class after 2 Hour  '.$date.'</font>
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







        // 'Class Remainder, '.'!
        //   tomorrow your class '.$date ;
        //$body = "This is Days Total Report";

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host       = "mail.designermore.com"; // SMTP server
        $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
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

        $mail->Subject    = 'Remainder for class';

       

        $mail->MsgHTML($body);


         $mail->AddAddress($user1->email);
        $mail->addBCC($user2->email);
        $mail->addCC('jayanty333@gmail.com');
        $sen1 = $mail->Send(); 
 } 

        }
    }


    public function homepage() {
        $this->data['title'] = 'index';

        $this->template->load('frontend/front_end', 'frontend/home', $this->data);
    }


    public function signup() {
        $this->data['title'] = 'signup';

        $this->template->load('frontend/front_end', 'frontend/choose-your-profile', $this->data);
    }

    public function individual() {
        $this->data['title'] = 'Individual signup';

        $this->template->load('frontend/front_end', 'frontend/register-choose-your-profile', $this->data);
    }
    public function individuals() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $this->data['title'] = 'Individual signup';

        $this->template->load('frontend/front_login_user_end', 'frontend/register-choose-your-profile1', $this->data);
    }

    public function forign_fee() {
        $this->data['title'] = 'Teacher signup';

        $this->template->load('frontend/front_end', 'frontend/forign-fee-registration', $this->data);
    }

     public function forign_fees() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $this->data['title'] = 'Teacher signup';

        $this->template->load('frontend/front_login_user_end', 'frontend/forign-fee-registration1', $this->data);
    }

    public function institute_fee() {
        $this->data['title'] = 'Institute signup';

        $this->template->load('frontend/front_end', 'frontend/teaching-center-fee', $this->data);
    }

    public function institute_fees() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        
        $this->data['title'] = 'Institute signup';

        $this->template->load('frontend/front_login_user_end', 'frontend/teaching-center-fee1', $this->data);
    }

    public function teacher() {
        $this->data['title'] = 'Home|Teacher';

        $this->template->load('frontend/front_login_user_end', 'frontend/teacher-list', $this->data);
    }

    public function subject() {
        $this->data['title'] = 'Home|Subject';

        $this->template->load('frontend/front_login_user_end', 'frontend/teacher-list', $this->data);
    }

    public function teacherprofile() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }

        $user = $this->ion_auth->user()->row();
        $this->data['title'] = 'Home|Teacher Profile';


         
          

         $this->load->view('frontend/teacher-profile-main', $this->data);
    }

    public function teacherprofile1() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }

        

          $this->session->set_flashdata('montly_sub','hi');

         redirect('teacher-profile','refresh');
    }

    public function teacherprofiless() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $this->data['title'] = 'Home|Subject';

        $this->load->view('frontend/teacher-details', $this->data);
    }

    public function editindiprofile() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $this->data['title'] = 'Home|Subject';

        $this->template->load('frontend/front_login_user_end', 'frontend/editindiprofile', $this->data);
    }

    public function indiprofile() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $this->data['title'] = 'Home|Subject';

        $this->template->load('frontend/front_login_user_end', 'frontend/indiprofile', $this->data);
    }

    public function instiprofile() {

        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $this->data['title'] = 'Home|Subject';

        $this->template->load('frontend/front_login_user_end', 'frontend/insti-profile-main', $this->data);
    }

    public function edit_insti_profile() {

        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $this->data['title'] = 'Home|Subject';

        $this->template->load('frontend/front_login_user_end', 'frontend/edit_teaching_center', $this->data);
    }

    public function edit_forign_fee_registration() {
        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }
        $this->data['title'] = 'Home|Subject';

       // $this->template->load('frontend/front_login_user_end', 'frontend/edit_forign-fee-registration', $this->data);
         $this->load->view('frontend/teacher-profile-main-edit', $this->data);
    }


    public function reset_password($code = NULL)
    {
        if (!$code)
        {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user)
        {
            // if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() === FALSE)
            {
                // display the form

                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'class'=>'form-control',
                    'placeholder' => 'New Password',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'class'=>'form-control',
                    'placeholder' => 'New confirm password',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'class'=>'form-control',
                    'placeholder' => 'User Id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                // render
                
                $this->template->load('backend/auth/reset_password','backend/auth/reset_password', $this->data);
            }
            else
            {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
                {

                    // something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));

                }
                else
                {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change)
                    {
                        // if the password was successfully changed
                        $this->session->set_flashdata('reset11', $this->ion_auth->messages());
                        redirect("home", 'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('reset-password/' . $code, 'refresh');
                    }
                }
            }
        }
        else
        {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());

            //$this->session->set_flashdata('reset11', $this->ion_auth->errors());

            redirect("forgot-password", 'refresh');
        }
    }

    public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    /**
     * @return bool Whether the posted CSRF token matches
     */
    public function _valid_csrf_nonce()
    {
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


}

?>