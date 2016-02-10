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
		$sql = "SELECT auction_id FROM ay_lots_users lu INNER JOIN ay_lots l ON lu.auction_id = l.id INNER JOIN ay_users u ON lu.user_id = u.id WHERE lu.is_rate = 0 AND u.login = '".$user_login."'";
		$query = $this->db->query($sql);
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

	public function enableAutorate($post) {
		$auction_id = $post['auction_id'];
		$user_id = $post['user_id'];
		$second_value = $post['second_value'];
		$rates_count = $post['rates_count'];
		$sql = "INSERT INTO ay_autorates (auction_id, user_id, second_value, rates_count) VALUES (".$auction_id.", ".$user_id.", ".$second_value.", ".$rates_count.") ON DUPLICATE KEY UPDATE second_value = ".$second_value.", rates_count = ".$rates_count;
		$this->db->query($sql);
		return true;
	}

	public function disableAutorate($post) {
		$this->db->delete('ay_autorates', array('user_id' => $post['user_id'], 'auction_id' => $post['auction_id']));
		return true;
	}

	public function autorates($login) {
		$sql = "SELECT ar.user_id, ar.auction_id, ar.rates_count, ar.second_value FROM ay_autorates ar INNER JOIN ay_users ON ar.user_id = ay_users.id WHERE ay_users.login = '".$login."'";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	public function get_all_by_login($post) {
		$login = $post['login'];
		$sql = "SELECT l.id, l.name, l.image, l.price, l.full_price, l.start_time, l.end_date, l.login, l.is_ended, l.game_zone, l.text, l.has_bot, l.ticket, l.timer, l.category, l.genre FROM ay_lots l INNER JOIN ay_lots_users lu ON l.id = lu.auction_id INNER JOIN ay_users u ON u.id = lu.user_id WHERE u.login = '".$login."' GROUP BY l.id";
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
}