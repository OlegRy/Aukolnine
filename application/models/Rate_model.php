<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Rate_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    public function all() {
    	$query = $this->db->get('ay_rates');
    	$result = $query->result();
    	return $result;
    }
}