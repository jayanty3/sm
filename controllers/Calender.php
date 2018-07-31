<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calender extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

       
        $this->load->library(array('ion_auth',  'session'));
        $this->load->helper(array('url', 'language','file'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
		
	}

	public function index()
	{
         if ((!$this->ion_auth->logged_in()) )
                {
                    redirect('frontend/register', 'refresh');
                }
        $user = $this->ion_auth->user()->row();

         // echo "<pre>";
         // print_r($this->uri->segment(3));
         // exit;

        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups()->result();
		$this->load->view('frontend/calender');
	}

	public function getevents()
	{
        $this->load->view('frontend/teacher-timing');

		// $this->template->load('frontend/front_login_user_end','frontend/teacher-timing');
    }

    public function events()
    {

        $user = $this->ion_auth->user()->row();

        $teacher_id = $user->user_id ;

         // echo "<pre>";
         // print_r($this->uri->segment(3));
         // exit();
    	
        // $fetch = $this->db->get('calendars');
               $this->db->select('*');
               $this->db->where('calendars.teach_id', $teacher_id);
               $this->db->join('bookings ', 'bookings.cal_id = calendars.id','left');
               $query = $this->db->get('calendars');
               $fetch =  $query;
      //$fetch =  $this->db->get_where('calendars', array('teach_id' => $teacher_id));

    	$json = array();
        // $fetch = Calendar::find('all');

        
   
     foreach($fetch->result() as $r) {

        if ($r->status == 0) {
                                                        
                               $color =  "#2DEE5A";
                               $background = "";
                               }
                                else {
                                 $color = "#F42D2D";
                                 $background = "background";
                                     }

          $json[] = array(
             "id" => $r->id,
             "end" => $r->end,
             "start" => $r->start,
             "color" => $color,
             "rendering" =>$background ,
         );
     }
     echo json_encode( $json);
     
    }

     public function events1()
    {

        $user = $this->ion_auth->user()->row();

        $teacher_id = $user->user_id ;

         // echo "<pre>";
         // print_r($this->uri->segment(3));
         // exit();
        
        // $fetch = $this->db->get('calendars');
               $this->db->select('*');
               $this->db->where('calendars.teach_id', $teacher_id);
               $this->db->join('bookings ', 'bookings.cal_id = calendars.id','left');
               $query = $this->db->get('calendars');
               $fetch =  $query;
      //$fetch =  $this->db->get_where('calendars', array('teach_id' => $teacher_id));

        $json = array();
        // $fetch = Calendar::find('all');

        
   
     foreach($fetch->result() as $r) {

        if ($r->status == 0) {
                                                        
                               $color =  "#2DEE5A";
                               $background = "background";
                               }
                                else {
                                 $color = "#F42D2D";
                                 $background = "background";
                                     }

          $json[] = array(
             "id" => $r->id,
             "end" => $r->end,
             "start" => $r->start,
             "color" => $color,
             "rendering" =>$background ,
         );
     }
     echo json_encode( $json);
     
    }


    public function add_events()
    {
        $user = $this->ion_auth->user()->row();

        $teacher_id = $user->user_id;
        
        if( isset($_POST['start']) || isset($_POST['end'])) {
            # code...
        
     	

		$start = $_POST['start'];

		$end = $_POST['end'];

        
    }
        
        $add = $this->db->insert('calendars',array('start' => $start,'end' => $end,'teach_id'=>$teacher_id));

    }

    public function add_bookings()
    {
        $user = $this->ion_auth->user()->row();

        $teacher_id = get_cookie('t_id');
        
        if( isset($_POST['start']) || isset($_POST['end'])) {
            # code...
        
        

        $start = $_POST['start'];

        $end = $_POST['end'];

        
    }
        
        $add = $this->db->insert('calendars',array('start' => $start,'end' => $end,'teach_id'=>$teacher_id));

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


    function teacherRecord()
    {
         $user = $this->ion_auth->user()->row();
         $user = $user->id;
         $dbs =  $this->db->query('SELECT * from bookings b left join users u on b.teacher_id = u.id left join calendars c on b.cal_id = c.id left join teachers t on b.teacher_id = t.user_id where b.teacher_id ='.$user);
         $dbs = $dbs->result();

      
         $limit = $this->input->post('length');
         $start = $this->input->post('start');
         $order = $columns[$this->input->post('order')[0]['column']];
         $dir = $this->input->post('order')[0]['dir'];
  
         $totalData = count($dbs);
            
         $totalFiltered = $totalData; 

         $data = array();
       
            foreach ($dbs as $post)
            {

                
                $n['start'] = $post->start;
                $n['first_name'] = $post->first_name;
               
                
                $data[] = $n;

            }
        
          
         $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
  


      echo json_encode($json_data);
    }

 

	}


