<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
	
	public function add($post)
	{
		$this->db->insert('ay_lots', $post);
		return true;
	}
	
	public function age()
	{
		$query = $this->db->query("SELECT age as 'Возраст', COUNT(age) as 'Колючество людей' FROM ay_users GROUP BY age");
		$result = $query->result();
		//echo "<pre>";print_r($result);exit;
		return $result;
	}
	
	public function gender()
	{
		$query = $this->db->query("SELECT gender as 'Пол', COUNT(gender) as 'Колючество людей' FROM ay_users GROUP BY gender");
		$result = $query->result();
		//echo "<pre>";print_r($result);exit;
		return $result;
	}
	
	public function rate()
	{
		$query = $this->db->query("SELECT COUNT(is_rate) as 'Общая активность ставок' FROM ay_lots_users WHERE is_rate = 1");
		$result = $query->result();
		//echo "<pre>";print_r($result);exit;
		return $result;
	}
	
	
	public function products()
	{
		$query = $this->db->query("SELECT COUNT(auction_id) as 'Общее количество ставок' , name as 'Название продукта' FROM ay_lots_users lu INNER JOIN ay_lots l ON lu.auction_id = l.id WHERE auction_id = id GROUP BY auction_id");
		$result = $query->result();
		//echo "<pre>";print_r($result);exit;
		return $result;
	}
	
	public function type_site()
	{
		$query = $this->db->query("SELECT type_site as 'Тип', COUNT(type_site) as 'Количество пользователей' FROM ay_users GROUP BY type_site");
		$result = $query->result();
		//echo "<pre>";print_r($result);exit;
		return $result;
	}
}