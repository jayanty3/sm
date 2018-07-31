<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Update_teacher extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->config('ion_auth', true);
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'upload', 'pagination', 'session','cart'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');

        if ((!$this->ion_auth->logged_in())) {
            redirect('frontend/auth_login/main', 'refresh');
        }

         $user = $this->ion_auth->user()->row();
         $groups = $this->ion_auth->groups()->result_array();
         $currentGroups = $this->ion_auth->get_users_groups()->result();
    }

    function index() {

        $this->load->view('frontend/teacher-profile-main-edit');
        
    }


    public function about_us(){

        $this->form_validation->set_rules('about_us', 'About us', 'required');

         if ($this->form_validation->run() ==  FALSE) {

              $this->load->view('frontend/teacher-profile-main-edit');
            
         } 
         else {

            $user = $this->ion_auth->user()->row();

             //print_r($user); die;

              $data = ['about_us' => $this->input->post('about_us')];

            $teach = Teacher::find_by_user_id($user->id);

            if ($teach->update_attributes($data)) 
            {
                $post1 = User::find_by_id($user->id);
                $this->session->set_flashdata('succ', 'Succussful updated');
                redirect('teacher-edit-profile', 'refresh');
            } 
            else 
            {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('teacher-edit-profile', 'refresh');
            }
            
          }

        
            

    }


    public function price(){

        $this->form_validation->set_rules('mhri', 'Minimum Hourly Rate', 'required|integer');
        $this->form_validation->set_rules('mhrg', 'Minimum Hourly Rate Group', 'required|integer');
        

         if ($this->form_validation->run() ==  FALSE) {

              $this->load->view('frontend/teacher-profile-main-edit');
            
         } 
         else {

            $user = $this->ion_auth->user()->row();

             //print_r($user); die;

              $data = ['mhri' => $this->input->post('mhri'),
                     'mhrg' => $this->input->post('mhrg'),];

            $teach = Teacher::find_by_user_id($user->id);

            if ($teach->update_attributes($data)) 
            {
                $post1 = User::find_by_id($user->id);
                $this->session->set_flashdata('succ', 'Succussful updated');
                redirect('teacher-edit-profile', 'refresh');
            } 
            else 
            {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('teacher-edit-profile', 'refresh');
            }
            
          }

        
            

    }


     public function level(){

        $this->form_validation->set_rules('level[]', 'Proficiency Level', 'required');
        
        

         if ($this->form_validation->run() ==  FALSE) {

              $this->load->view('frontend/teacher-profile-main-edit');
            
         } 
         else {

            $user = $this->ion_auth->user()->row();

             //print_r($user); die;

                $st = $this->input->post('level[]');

                $st1 = implode(',',$st);

              $data = ['level' => $st1];

             

            $teach = Teacher::find_by_user_id($user->id);

            if ($teach->update_attributes($data)) 
            {
                $post1 = User::find_by_id($user->id);
                $this->session->set_flashdata('succ', 'Succussful updated');
                redirect('teacher-edit-profile', 'refresh');
            } 
            else 
            {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('teacher-edit-profile', 'refresh');
            }
            
          }

        
            

    }

  public function cert(){

        $data  = array('success'=> false,'message' =>array());

        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('cert', 'Certificate', 'required');
        
        

         if ($this->form_validation->run() ==  FALSE) {

               foreach ($_POST as $key => $value) {
                $data['message'][$key] = form_error($key);
            }
            
         } 
         else {

            $user = $this->ion_auth->user()->row();
             $teach = Teacher::find_by_user_id($user->id);

             //print_r($user); die;

              $data = [
                       'year' => $this->input->post('year'),
                       'cert' => $this->input->post('cert'),
                       'user_id'=>$user->id
                     ];

                    // print_r($data1); 

            $updat =  $this->db->insert('certificates',$data);

            if ($updat ==TRUE) 
            {
                 $data['success'] = true;
                
            } 
            else 
            {

                $data['success'] = "failed to update";
            }
            
          }

        
         echo json_encode($data);    

    }

function cert_view(){

         $user = $this->ion_auth->user()->row();

        $data =$this->db->where("user_id", $user->id)->get('certificates')->result();

        echo json_encode($data);
    }

    function cert_delete(){

         $user = $this->ion_auth->user()->row();

         $cert_id=$this->input->post('cert_id');
       
        $data= $this->db->where('cert_id', $cert_id)->delete('certificates');
        

        //$data =$this->db->where("user_id", $user->id)->get('cvs')->result();

        echo json_encode($data);
    }

    function cert_update(){


         $user = $this->ion_auth->user()->row();

        $cert_id=$this->input->post('cert_id');
        $year=$this->input->post('year');
        $cert=$this->input->post('cert');
       
 
        $this->db->set('year', $year);
        $this->db->set('cert', $cert);
        
       

        $data= $this->db->where('cert_id', $cert_id)->update('certificates');

        echo json_encode($data);

        
    }


     function contact(){


         $user = $this->ion_auth->user()->row();

        

        $email    =  $this->input->post('email');
        $skype    =  $this->input->post('skype');
        $facebook =  $this->input->post('facebook');
        $whatsup  =  $this->input->post('whatsup');
        $mobile   =  $this->input->post('mobile');
       
         
       // $this->db->set('email'   ,   $email);
        $this->db->set('skype'   ,   $skype);
        $this->db->set('facebook',   $facebook);
        $this->db->set('whatsup' ,   $whatsup);
        $this->db->set('mobile'  ,   $mobile);

        $cont = User::find_by_id($user->id);

        $cont->update_attributes(array('email'=>$email));
       
        $teach = Teacher::find_by_user_id($user->id);

        $data= $this->db->where('id', $teach->id)->update('teachers');

        //$data['success'] = true;

       // echo json_encode($data);
        redirect('teacher-edit-profile', 'refresh');

        
    }
 





    public function cv(){

        $data  = array('success'=> false,'message' =>array());

        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('exp', 'Experience', 'required');
        

         if ($this->form_validation->run() ==  FALSE) {

               foreach ($_POST as $key => $value) {
                $data['message'][$key] = form_error($key);
            }
            
         } 
         else {

            $user = $this->ion_auth->user()->row();
             $teach = Teacher::find_by_user_id($user->id);

             //print_r($user); die;

              $data = [
                       'year' => $this->input->post('year'),
                       'company' => $this->input->post('company'),
                       'exp' => $this->input->post('exp'),
                       'user_id'=>$user->id
                     ];

                    // print_r($data1); 

            $updat =  $this->db->insert('cvs',$data);

            if ($updat ==TRUE) 
            {
                 $data['success'] = true;
                
            } 
            else 
            {

                $data['success'] = "failed to update";
            }
            
          }

        
         echo json_encode($data);    

    }




    function cv_view(){

         $user = $this->ion_auth->user()->row();

        $data =$this->db->where("user_id", $user->id)->get('cvs')->result();

        echo json_encode($data);
    }

    function cv_delete(){

         $user = $this->ion_auth->user()->row();

         $cv_id=$this->input->post('cv_id');
       
        $data= $this->db->where('cv_id', $cv_id)->delete('cvs');
        

        //$data =$this->db->where("user_id", $user->id)->get('cvs')->result();

        echo json_encode($data);
    }

    function cv_update(){


         $user = $this->ion_auth->user()->row();

        $cv_id=$this->input->post('cv_id');
        $year=$this->input->post('year');
        $company=$this->input->post('company');
        $exp=$this->input->post('exp');
 
        $this->db->set('year', $year);
        $this->db->set('company', $company);
        $this->db->set('exp', $exp);
       

        $data= $this->db->where('cv_id', $cv_id)->update('cvs');

        echo json_encode($data);

        
    }

    function subs_expires()
    {
       $teachers = Teacher::find_all_by_fee('appear home page');

    //echo "<pre>";   print_r($teachers);die;
        

        $data =  $teachers;

        foreach ($data as $d) {
                $date = $d->subs_expire;
                $teach_id = $d->user_id;
                
                $user1 = $this->ion_auth->user($teach_id)->row();
                
                $user1->email;
               


         $stop_date = date('Y-m-d H:i:s', strtotime($date . ' '));
         echo 'date before day adding: '.$stop_date;
         $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' 28 day')); 
         echo 'date after adding 1 day: ' . $stop_date;
         echo $check = substr($stop_date,0,10).'<br>';
         if(date('Y-m-d') == $check)
           {
            
          

          require_once(APPPATH.'libraries/class.phpmailer.php');
                    $mail             = new PHPMailer();
        $body = 'Your Subscription about to End Please recharge it, '.'!
          please Repayment before your class '.$date ;
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

        $mail->Subject    = 'Your Subscription  End Please repayment  ';

       

        $mail->MsgHTML($body);


        $mail->AddAddress($user1->email);
        $mail->addCC('jayanty333@gmail.com');
        $sen1 = $mail->Send(); 
 } 

if(date('Y-m-d') > $check)
           {
            $data3 = [
                       'fee' => '',
                     ];
          $teachers->update_attributes($data3);

          require_once(APPPATH.'libraries/class.phpmailer.php');
                    $mail             = new PHPMailer();
        $body = 'Your Subscription  End Please recharge it, '.'!
          please Repayment before your class '.$date ;


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

        $mail->Subject    = 'Your Subscription about to End Please ';

       

        $mail->MsgHTML($body);


        $mail->AddAddress($user1->email);
        $mail->addCC('jayanty333@gmail.com');
        $sen1 = $mail->Send(); 
 } 
        }
        
    }



   function youtube(){



   

         $user = $this->ion_auth->user()->row();

         $youtube_url=$this->input->post('youtube_url');

           $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

            if (preg_match($longUrlRegex, $youtube_url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            if (preg_match($shortUrlRegex, $youtube_url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }




         $teach = Teacher::find_by_user_id($user->id);

         $config = array(
                'upload_path' => "./uploads/video",
                'allowed_types' => "mp4|avi",
                'max_size' => "9000kb",
                'encrypt_name' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('vid');
            $ved = $this->upload->data('file_name');

            
                $user = $this->ion_auth->user()->row();
             $teach = Teacher::find_by_user_id($user->id);

             


             //print_r($user); die;

             if (!empty($youtube_id)) {

             $data = [  
                          'youtube_url' => $youtube_id,
                     ];
                            }

             
        if (!empty($_FILES['vid']['name'])) {
                                $data = ['vedio' => $ved ];
                            }

          if ($teach->update_attributes($data)) 
            {
                
                $this->session->set_flashdata('succ', 'Succussful updated');
                redirect('teacher-edit-profile', 'refresh');
            } 
            else 
            {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('teacher-edit-profile', 'refresh');
            }

  

}

        


       public function img(){


       			 $config = array(
                'upload_path' => "./uploads/images",
                'allowed_types' => "png|jpg|jpeg",
                'max_size' => "2048kb",
                'encrypt_name' => TRUE);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('image');

            if (!empty($_FILES['image']['name'])) {
                $img = $this->upload->data('file_name');

                $user = $this->ion_auth->user()->row();
             $teach = Teacher::find_by_user_id($user->id);
             $data = [
                       'pic' => $img
                     ];
        

		          if ($teach->update_attributes($data)) 
		            {
		                

                       //echo "Succussful"; 
		                $this->session->set_flashdata('succ', 'Succussful updated');
		                redirect('teacher-edit-profile', 'refresh');
		            } 
		            else 
		            {
                       // echo "fail"; 

		                $this->session->set_flashdata('fail', 'UnSuccussful');
		                redirect('teacher-edit-profile', 'refresh');
		            }
            }
            else
            {
                 //echo "fail"; 
            	//

                 redirect('teacher-edit-profile', 'refresh');
            }

          
       	
       }
 
}

?>