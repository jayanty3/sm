<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Del_student extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');

		$this->load->model('subscription');
    }

    function info() {
        $data['title']= 'Admin|Deleted Student';
		
		$this->template->load('backend/admin_front','backend/auth/deleted_user',$data);
    }

    



function del_student(){


   if ((!$this->ion_auth->logged_in()) )
              {
                redirect('backend/auth', 'refresh');
              }
          
                   

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

        $count=Acc_delete::count();
        $query=' SELECT * FROM acc_deletes ORDER BY name DESC LIMIT ' .$offset.','. $limit;
        $sub= Acc_delete::find_by_sql($query); //result with limit

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
            
             
            $sub_array[] = '<button type="button" name="delete" id="'.$s->del_id.'" class="btn btn-danger  btn-xs">Delete</button>'; 
            $sub_array[] ='row_'.$s->del_id;
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


  

	public function fetch() 
	{
		$result = array('data' => array());

		
       
        $sub = Acc_delete::find('all'); 
    
   
		$data =  $sub;

		 $k=1;
		foreach ($data as $key => $value) {
			 $name = $value->name;

			// button
			$buttons = '
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Action <span class="caret"></span>

			  </button>
			  <ul class="dropdown-menu">
			    
			    <li><a type="button" onclick="removeMember('.$value->del_id.')" data-toggle="modal" data-target="#removeMemberModal">Remove</a></li>			    
			  </ul>
			</div>
			';

			$result['data'][$key] = array(
				$k++,
				$name,

				$value->email_id,
				
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

	
	public function remove($id = null)
	{
		if($id) {
			$validator = array('success' => false, 'messages' => array());

			$indi = Acc_delete::find_by_del_id($id);

			$removeMember = $indi->delete();
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






 

public function sub_delete(){

	$id = $_POST["subscribe_id"];
	$post = Sub::find_by_subscribe_id($id);
	$post->delete();
      echo 'Data Deleted';
	
 } 



}













?>