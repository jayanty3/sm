<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cancel_class extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');

		$this->load->model('subscription');
    }

    function info1() {
        $data['title']= 'Admin|Cancel Class';
		
		$this->template->load('backend/admin_front','backend/auth/cancel_class',$data);
    }

    function info2() {
        $data['title']= 'Admin|Booked Class by Student';
		
		$this->template->load('backend/admin_front','backend/auth/booked_student',$data);
    }

    function info3() {
        $data['title']= 'Admin|Teacher Class Booked By Institute';
		
		$this->template->load('backend/admin_front','backend/auth/booked_center',$data);
    }

    





  

	public function fetch() 
	{
		$result = array('data' => array());

		     // $user = User::find_by_id()
       
        $sub = Booking::find_by_sql('SELECT b.booking_id,b.teacher_id,b.indi_id,c.start,u.id,u.first_name,u.last_name,u.levels,o.price,b.date1 from bookings b 
				left join users u on b.indi_id = u.id 
				left join calendars c on b.cal_id = c.id 
				left join teachers t on t.user_id = b.teacher_id 
				left join order_details as o on o.cal_id = b.cal_id where  b.cancel=1'); 
    
   
		$data =  $sub;

		 $k=1;
		foreach ($data as $key => $value) {

			      $student11 = User::find_by_id($value->indi_id);
                  

			 
				 $teacher = User::find_by_id($value->teacher_id);
				
						
			$result['data'][$key] = array(
				$k++,
				$teacher->email,
				$teacher->first_name,
				$student11->username,
				$student11->first_name,
				$value->price,
				
				
			);
		} // /foreach

		echo json_encode($result);
	}


public function fetch1() 
	{
		$result = array('data' => array());

		     // $user = User::find_by_id()
       
        $sub = Booking::find_by_sql('SELECT b.booking_id,b.teacher_id,b.indi_id,c.start,u.id,u.first_name,u.last_name,u.levels,o.price,b.date1 from bookings b 
				left join users u on b.indi_id = u.id 
				left join calendars c on b.cal_id = c.id 
				left join teachers t on t.user_id = b.teacher_id 
				inner join order_details as o on o.cal_id = b.cal_id where  b.status=1'); 
    
   
		$data =  $sub;

		//echo "<pre>"; print_r($data); die;

		 $k=1;
		foreach ($data as $key => $value) {

			      $student11 = User::find_by_id($value->indi_id);
                  

			 
				 $teacher = User::find_by_id($value->teacher_id);

				$date = DateTime::createFromFormat('Y-m-d H:i:s', $value->start);
						
			$result['data'][$key] = array(
				$k++,
				$student11->email,
				$student11->first_name,
				$teacher->first_name,
				$value->date1->format('Y-m-d H:i:s'),
				$date->format('Y-m-d H:i:s'),
				$value->price,
				
				
			);
		} // /foreach

		echo json_encode($result);
	}

public function fetch2() 
	{
		$result = array('data' => array());

		     // $user = User::find_by_id()
          $book = Booking::find_by_sql('SELECT * from bookings b inner join  centers c on b.indi_id = c.user_id'); 
        
    
   
		$data =  $book;

		//echo "<pre>"; print_r($data); die;

		 $k=1;
		foreach ($data as $key => $value) {

			
                                   
                                     
			      $center = Center::find_by_user_id($value->indi_id);
                          

			 
				 $teacher = User::find_by_id($value->teacher_id);

				
						
			$result['data'][$key] = array(
				$k++,
				
				$center->institute_name,
				$teacher->email,
				$teacher->first_name,
				
				
				
				
			);
		} // /foreach

		echo json_encode($result);
	}



























	public function getSelectedMemberInfo($id) 
	{
		if($id) {
			$data = $this->subscription->fetch($id);
			echo json_encode($data);
		}
	}

	
	




 





}













?>