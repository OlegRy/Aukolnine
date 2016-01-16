<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Auctions_model extends CI_Model

{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function lastFive() {
		$query = $this->db->query('SELECT * FROM ay_lots ORDER BY id DESC LIMIT 5');
		$result = $query->result();
		return $result;
	}

	public function all($type) {
		switch ($type) {
			case 1:
				$this->db->order_by('start_time', 'desc');		
				break;
			case 2:
				$this->db->order_by('category', 'desc');
				break;
			case 3:
				$this->db->order_by('genre', 'desc');
				break;
			default:
				break;
		}
		$query = $this->db->get('ay_lots');
		$result = $query->result();
		return $result;
	}

	public function getById($post) {
		$query = $this->db->get_where('ay_lots', array('id' => $post['auct_id']));
		$result = $query->result();
		return $result;
	}

	public function updateAuction($auct_id, $price, $login, $user_id, $time) {
		$update_data = array('price' => $price, 'login' => $login);
		$insert_data = array('auction_id' => $auct_id, 'user_id' => $user_id, 'time' => $time, 'price' => $price);
		$this->db->update('ay_lots', $update_data, array('id' => $auct_id));
		$this->db->insert('ay_lots_users', $insert_data);
		return true;
	}

	public function has_user($user_login) {
		$query = $this->db->query('SELECT auction_id FROM ay_lots_users lu WHERE lu.user_id IN (SELECT id FROM ay_users WHERE login = "' . $this->db->escape_str($user_login) . '")');
		$result = $query->result();
		return $result;

	}

	public function game_zones($type) {
		switch ($type) {
			case 1:
				$this->db->order_by('start_time', 'desc');		
				break;
			case 2:
				$this->db->order_by('category', 'desc');
				break;
			case 3:
				$this->db->order_by('genre', 'desc');
				break;
			default:
				break;
		}
		$query = $this->db->get_where('ay_lots', array('game_zone' => 1));
		$result = $query->result();
		return $result;
	}

	public function getAllRates() {
		$query_string = "SELECT lu.time, u.login, lu.price FROM ay_users u INNER JOIN ay_lots_users lu ON u.id = lu.user_id ORDER BY lu.time DESC";
		$query = $this->db->query($query_string);
		$result = $query->result();
		return $result;
	}

	public function update($post) {
		$this->db->update('ay_lots', $post['data'], $post['where_clause']);
		return $this->db->affected_rows();
	}

	public function ratesNum($get) {
		$query = $this->db->query("SELECT COUNT(*) FROM ay_lots_users WHERE auction_id = " . $get['id']);
		$result = $query->result();
		return $result;
	}

	public function getTimer($get) {
		$this->db->select('timer');
		$query = $this->db->get_where('ay_lots', $get);
		$result = $query->result();
		return $result;
	}

	public function updateTimer($post) {
		$this->db->where('id', $post['id']);
		$data = array('timer' => $post['timer']);
		$this->db->update('ay_sample', $data);
		return true;
	}
}