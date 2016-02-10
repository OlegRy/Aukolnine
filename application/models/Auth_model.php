<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
	
	public function insert($post)
	{
		$query = $this->db->get('ay_users', $post);
		if ($query->num_rows() > 0) {
			return false;
		}
		$this->db->insert('ay_users', $post);
		return true;
	}
	
	public function get($post)
	{
		$this->db->select('login');
		$query = $this->db->get_where('ay_users', array('email' => $post['email'], 'password' => $post['password']));
		$result = $query->result();
		return $result;
	}

	public function getRatesCount($post) {
		$this->db->select('rates_count');
		$query = $this->db->get_where('ay_users', array('login' => $post['login']));
		$result = $query->result();
		return $result;
	}

	public function getByLogin($post) {
		$query = $this->db->get_where('ay_users', array('login' => $post['user']));
		$result = $query->result();
		return $result;
	}

	public function updateRatesCount($rates_count, $user_id) {
		$new_rates_count = array('rates_count' => $rates_count);
		$this->db->update('ay_users', $new_rates_count, array('id' => $user_id));
		return true;
	}

	public function apply($post) {
		$this->db->insert('ay_lots_users', $post);
		return true;
	}

	public function get_by_id($post) {
		$query = $this->db->get_where('ay_users', $post);
		$result = $query->result();
		return $result;
	}
}