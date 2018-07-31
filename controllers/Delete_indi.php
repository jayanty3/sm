<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Delete_indi extends CI_Controller {

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

    }

   

    function delete(){


         $user = $this->ion_auth->user()->row();

         

            $indi = User::find_by_id($user->id);

            $data = ['email_id' =>$indi->email,
                     'name'     =>$indi->first_name
                    ];

                 $del =    Acc_delete::create($data);
 
            if ($indi->update_attributes(array('email'=>''))) 
            {
                
                 $this->ion_auth->logout();
                $this->session->set_flashdata('delete1', 'Your account delete succusfully');
               
                redirect('home', 'refresh');
            } 
            else 
            {

                $this->session->set_flashdata('fail', 'UnSuccussful');
                redirect('individual', 'refresh');
            }
            
          }

        
    



   
}

?>