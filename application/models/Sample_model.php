<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Sample_model extends CI_Model
{

	public function __construct()
    {
        parent::__construct();
    }

	public function get($post) {
		$this->db->select('timer');
		$query = $this->db->get_where('ay_sample', $post);
		$result = $query->result();
		return $result;
	}

	public function getAll() {
		$query = $this->db->get('ay_sample');
		$result = $query->result();
		return $result;
	}

	public function update($post) {
		$this->db->where('id', $post['id']);
		$data = array('timer' => $post['timer']);
		$this->db->update('ay_sample', $data);
		return true;
	} 

	public function ins() {
		$this->db->insert('ay_sample', array('timer' => 15));
	}
}