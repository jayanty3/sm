<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sub_list extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');

		$this->load->model('subscription');
    }

    function index() {
        $data['title']= 'Admin|Subscription';
		
		$this->template->load('backend/admin_front','backend/auth/subscription',$data);
    }

    public function sub_view(){




        $offset=0;
        $limit=10;
        
        //set values according to post elements
        if($_POST){

        $offset=$this->input->post('start');
        $limit=$this->input->post('length');
        $order=$this->input->post('order');
        $search=$this->input->post('search');
        $orderColumn=$order[0]["column"];
        $orderType=$order[0]["dir"];
        

          //for searching data
       

        }
        /* Post condition ends */

        $count=Sub::count();
        $query=' SELECT * FROM subs ORDER BY subdate DESC LIMIT ' .$offset.','. $limit;
        $sub= Sub::find_by_sql($query); //result with limit

     // echo Sub::connection()->last_query; die; //total result count for showing pagination info
                                                   
        $row=array();
        $data=array();
        $k=1;
        foreach($sub as $s){

        	//echo $s->subdate->format('Y-m-d');
            
           // $data[] = array(
            	// 'no'=>$k++,
            	// 'id'=>$s->subscribe_id,
             //    'email'=>$s->email_id,
             //    'date'=>$s->subdate->format('Y-m-d H:i:s'),
                
             //    "DT_RowId"=>"row_".$s->subscribe_id
           //     );
        	$sub_array = array();
            $sub_array[] =$k++;
            $sub_array[] =$s->email_id;
            $sub_array[] =$s->subdate->format('Y-m-d H:i:s');
            $sub_array[] = '<button type="button" name="update" id="'.$s->subscribe_id.'" class="btn btn-warning btn-xs">Update</button>';  
            $sub_array[] = '<button type="button" name="delete" id="'.$s->subscribe_id.'" class="btn btn-danger  btn-xs">Delete</button>'; 
            $sub_array[] ='row_'.$s->subscribe_id;
            $data[] = $sub_array;
            

            }
            $output = array(
                        "draw" => intval($_POST['draw']),
                        "recordsTotal" => $count,
                        "recordsFiltered" => $count,
                        "data" => $data,
                );
      

        echo json_encode($output);



    }


   public function create() 
	{

		$validator = array('success' => false, 'messages' => array());

		$config = array(
	    array(
        'field' => 'email_id',
        'label' => 'Email',
        'rules' => 'trim|required|is_unique[subs.email_id]'
	    )
	   
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		if($this->form_validation->run() === true) {

			$createMember = $this->subscription->create(); 

			if($createMember === true) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully added";
			} else {
				$validator['success'] = false;
				$validator['messages'] = "Error while updating the infromation";
			}			
		} 
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);	
			}			
		}

		echo json_encode($validator);
	}

	public function fetch() 
	{
		$result = array('data' => array());

		$data = $this->subscription->fetch();
		 $k=1;
		foreach ($data as $key => $value) {
			$name = $value['email_id'];

			// button
			$buttons = '
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Action <span class="caret"></span>

			  </button>
			  <ul class="dropdown-menu">
			    <li><a type="button" onclick="editMember('.$value['subscribe_id'].')" data-toggle="modal" data-target="#editMemberModal">Edit</a></li>
			    <li><a type="button" onclick="removeMember('.$value['subscribe_id'].')" data-toggle="modal" data-target="#removeMemberModal">Remove</a></li>			    
			  </ul>
			</div>
			';

			$result['data'][$key] = array(
				$k++,
				$name,

				$value['subdate'],
				
				$buttons
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

	public function edit($id = null) 
	{
		if($id) {
			$validator = array('success' => false, 'messages' => array());

			$config = array(
	    array(
        'field' => 'email_id1',
        'label' => 'Email',
        'rules' => 'trim|required'
	    )
	   
		);

			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

			if($this->form_validation->run() === true) {

				$editMember = $this->subscription->edit($id); 

				if($editMember === true) {
					$validator['success'] = true;
					$validator['messages'] = "Successfully updated";
				} else {
					$validator['success'] = false;
					$validator['messages'] = "Error while updating the infromation";
				}			
			} 
			else {
				$validator['success'] = false;
				foreach ($_POST as $key => $value) {
					$validator['messages'][$key] = form_error($key);	
				}			
			}

			echo json_encode($validator);
		}
	}

	public function remove($id = null)
	{
		if($id) {
			$validator = array('success' => false, 'messages' => array());

			$removeMember = $this->subscription->remove($id);
			if($removeMember === true) {
				$validator['success'] = true;
				$validator['messages'] = "Successfully removed";
			}
			else {
				$validator['success'] = true;
				$validator['messages'] = "Successfully removed";
			}

			echo json_encode($validator);
		}
	}






public function sub_edit(){

	 $id = $this->input->post("subscribe_id");

	$post = Sub::find_by_subscribe_id($id);
	$post->update_attributes(array('email' => $email_id));


} 

public function sub_delete(){

	$id = $_POST["subscribe_id"];
	$post = Sub::find_by_subscribe_id($id);
	$post->delete();
      echo 'Data Deleted';
	
 } 



}

















?>