<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aukcion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->lang->load('auth', $this->language_lib->detect());
		$this->load->model('auctions_model');
	} 

	public function index()
	{
		$data['auct'] = $this->auctions_model->all();
		$data['aukcion'] = 'Аукционы';
		$this->load->view('/common/header_view',$data);
		$this->load->view('aukcion_view',$data);
		$this->load->view('auctions_view', $data);
		$this->load->view('/common/footer_view',$data);
	}

	public function id($id) {
		$get['auct_id'] = $id;
		$data['auction'] = $this->auctions_model->getById($get);
		$data['rates'] = $this->auctions_model->getAllRates();
		$data['aukcion'] = 'Lot';
		if ($this->session->userdata('ay_login'))
			$data['user_aucts'] = $this->auctions_model->has_user($this->session->userdata('ay_login'));
		if ($data['auction']) {
			$this->load->view('/common/header_view',$data);
			$this->load->view('show_auction', $data);
			$this->load->view('/common/footer_view',$data);
		} else
			show_404('error_404');
		
	}

	public function update() {
		if (isset($_POST) && sizeof($_POST) > 0) {
			$date = date("Y-m-d H:i:s");
			$post['data'] = array('is_ended' => $_POST['is_ended'], 'end_date' => $date);
			$post['where_clause'] = array('id' => $_POST['id']);
			$updated_rows = $this->auctions_model->update($post);
			if ($updated_rows < 1) echo false;
			else {
				$response = array('date' => date('d.m.Y G:i:s', strtotime($date)));
				echo json_encode($response);
			}
		}
	}

	public function ratesNum() {
		if (isset($_GET) && sizeof($_GET) > 0) {
			$get['id'] = $_GET['id'];
			$count = $this->auctions_model->ratesNum($get);
			echo json_encode($count[0]);
		}
	}
}
