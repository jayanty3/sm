<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {
	 public function __construct()
	 {
	 	parent::__construct();
	 	
	 }
	

	public function get_events()
{			 

	$this->db->select('*');
	$this->db->where('calendars.teach_id', $this->uri->segment(3));
	$this->db->join('bookings ', 'bookings.cal_id = calendars.id','left');
	$query = $this->db->get('calendars');


	// $this->db->select('*');
 //    $query = $this->db->where("teach_id" ,$this->uri->segment(3))->get("calendars");
    return $query->result();
}

public function add_event($data)
{
    $this->db->insert("calendars", $data);
}

public function get_event($id)
{
    return $this->db->where("id", $id)->get("calendars");
}

public function update_event($id, $data)
{
    $this->db->where("id", $id)->update("calendars", $data);
}

public function delete_event($id)
{
    $this->db->where("id", $id)->delete("calendars");
}

}

