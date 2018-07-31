<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Price extends CI_Controller {

    function __construct() {
        parent::__construct();
			$this->load->config('ion_auth', true);
			$this->load->database();
			$this->load->library(array('ion_auth', 'form_validation','upload','pagination','session'));
			$this->load->helper(array('url', 'language'));
			$this->load->model('Pagination_Model');
			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			$this->lang->load('auth');
    }

 function index() {

  
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			  {
			          redirect('backend/auth/login', 'refresh');
			  }


                    $this->template->load('backend/admin_front','backend/auth/price');


			}


			function activate() {

  
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			  {
			          redirect('backend/auth/login', 'refresh');
			  }
		// 	  		 foreach (users as $k => $user)
  // {
  //  $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
  //     $group_id = 4; 
  //     $this->data['user'] = $this->ion_auth->users($group_id)->result();
  //     $group_id = 5; 
  //     $this->data['user'] = $this->ion_auth->users($group_id)->result();
            
		
  // }
 

                    $this->template->load('backend/admin_front','backend/auth/activate_user');


			}


			public function acti($id)
	{
		 if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			redirect("backend/price/activate", 'refresh');
		}
		
	}


    function class_p() {

  
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			  {
			          redirect('backend/auth/login', 'refresh');
			  }

          
                 $this->form_validation->set_rules('class_price', 'price(USD $)', 'required');
          if ($this->form_validation->run()== FALSE) 
        {
    $this->template->load('backend/admin_front','backend/auth/price');
        }
    else{
                  
              $data = [
                  
                  'class_price' => $this->input->post('class_price'),
                  
                     
              ];

                       $post = Fee::find(1);

                       $post->update_attributes($data);
                  
                       $this->data['fee'] =  $post->update_attributes($data);
        
                    $this->template->load('backend/admin_front','backend/auth/price',$this->data);

    }
}

function center_y() {

  
    if ((!$this->ion_auth->logged_in()) )
              {
                redirect('backend/auth', 'refresh');
              }
          
                   $this->form_validation->set_rules('yearly_price', 'price(USD $)', 'required');
          if ($this->form_validation->run()== FALSE) 
        {
    $this->template->load('backend/admin_front','backend/auth/price');
        }
    else{
         
             
              
              
              $data = [
                  
                  'yearly_price' => $this->input->post('yearly_price'),
                  
                     
              ];
                  
                       $post = Fee::find(1);

                       $post->update_attributes($data);
                  
                       $this->data['fee'] =  $post->update_attributes($data);
        
        
                    $this->template->load('backend/admin_front','backend/auth/price',$this->data);

    }
}
function teacher_price() {

  
    if ((!$this->ion_auth->logged_in()) )
              {
                redirect('backend/auth', 'refresh');
              }
          
                   $this->form_validation->set_rules('teachers_price', 'price(USD $)', 'required');
          if ($this->form_validation->run()== FALSE) 
        {
    $this->template->load('backend/admin_front','backend/auth/price');
        }
    else{
         
             
              
              
              $data = [
                  
                  'teachers_price' => $this->input->post('teachers_price'),
                  
                     
              ];
                  
                       $post = Fee::find(1);

                       $post->update_attributes($data);
                  
                       $this->data['fee'] =  $post->update_attributes($data);
        
                    $this->template->load('backend/admin_front','backend/auth/price',$this->data);

    }
}
function center_m() {

  
    if ((!$this->ion_auth->logged_in()) )
              {
                redirect('backend/auth', 'refresh');
              }
          
                   $this->form_validation->set_rules('monthly_price', 'price(USD $)', 'required');
          if ($this->form_validation->run()== FALSE) 
        {
    $this->template->load('backend/admin_front','backend/auth/price');
        }
    else{
              $data = [
                  
                  'monthly_price' => $this->input->post('monthly_price'),
                  
                     
              ];
                  
                      $post = Fee::find(1);

                       $post->update_attributes($data);
                  
                       $this->data['fee'] =  $post->update_attributes($data);
        
        
                    $this->template->load('backend/admin_front','backend/auth/price',$this->data);

    }
}













        }








?>