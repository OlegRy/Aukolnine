<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Personal_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
	
	
	public function get($post)
	{
		$query = $this->db->get_where('ay_users', array('login' => $post['login']));
		$result = $query->result();
		return $result;
	}
	
	public function get_password($post)
	{
		$query = $this->db->get_where('ay_users', array('password' => $post['current']));
		$result = $query->num_rows();
		return $result;
	}
	
	public function change_password($array, $login)
	{
		$this->db->update('ay_users', $array, array('login' => $login));
		return true;
	}
	
	public function info_personal($post, $login)
	{
		$this->db->update('ay_users', $post, array('login' => $login));
		return true;
	}
	
	public function address($post)
	{
		$this->db->insert('users_address', $post);
		return true;
	}
	
	public function avatar($post, $login)
	{
		$this->db->update('ay_users', $post, array('login' => $login));
		return true;
	}
}