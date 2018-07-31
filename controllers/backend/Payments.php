<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Payments extends CI_Controller {


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

	public function index(){

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
			  {
			          redirect('backend/auth/login', 'refresh');
			  }
                  $this->template->load('backend/admin_front','backend/auth/payments',array());
                
              }


public function payment(){


             
       $pay = $this->Pagination_Model->pd();
          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $data = array();

           
          foreach($pay as $a) {
            
               $data[] = array(
                   $a->first_name." ".$a->last_name,
                    $a->email,
                    $a->Total,
                    $a->txn_id,
                    $a->CreateTime,
                    anchor('backend/payments/inprint/'.$a->pay_id,'invoice')
                  );
               

          }

          $output = array(
                 "draw" => $draw,
                 "recordsTotal" => $this->db->count_all('payments'),
                 "recordsFiltered" => $this->db->count_all('payments'),
                 "data" => $data
            );
            
          echo json_encode($output);
          exit();



}

public function inprint()
{
  $pay_id = $this->uri->segment(4);
   $data['pay'] = $this->Pagination_Model->pdedit($pay_id);
   
   $this->load->view('backend/auth/invoice',$data);

}

      


}

?>