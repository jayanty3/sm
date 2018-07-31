<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remainder extends CI_Model {
	 public function __construct()
	 {
	 	parent::__construct();
	 	
	 }
	

	


  public function classRemainder()
  {
    
    return $this->db->query('SELECT * from bookings b left join calendars c on b.cal_id = c.id where b.status and b.varified')->result();
       
  }
 
  

}

