<?php


class Subscription extends CI_Model
{
	public function create() 
	{
		$data = array(
			'email_id' => $this->input->post('email_id')
			
		);

		$sql = $this->db->insert('subs', $data);

		if($sql === true) {
			return true; 
		} else {
			return false;
		}
	} // /create function

	public function edit($id = null) 
	{
		if($id) {
			$data = array(
			'email_id' => $this->input->post('email_id1')
			
		);

			$this->db->where('subscribe_id', $id);
			$sql = $this->db->update('subs', $data);

			if($sql === true) {
				return true; 
			} else {
				return false;
			}
		}
			
	}


	public function fetch($id = null) 
	{
		if($id) {
			$sql = "SELECT * FROM subs WHERE subscribe_id = ? ORDER BY subscribe_id DESC";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM subs";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function remove($id = null) {
		if($id) {
			$sql = "DELETE FROM subs WHERE subscribe_id = ?";
			$query = $this->db->query($sql, array($id));

			// ternary operator
			return ($query === true) ? true : false;			
		} // /if
	}

}

?>