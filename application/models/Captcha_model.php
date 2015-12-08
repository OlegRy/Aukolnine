<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha_model extends CI_Model {
	
	public function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($post) {
    	$query = $this->db->get_where('ay_captcha', $post);
    	$result = $query->result();
    	return $result;
    }
}