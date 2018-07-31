<?php
 
 class Form extends CI_Model{

 	public function __construct()
 	{
 		parent:: __construct();
 	}


 	public function form($data)
 	{
       $db=$this->db->insert('form',$data);
       return $db;
       
 	}

 	public function view()
 	{
 		$q= $this->db->get('form');
 		return $q->result();
 	}
 }

?>