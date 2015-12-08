<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gamezone extends CI_Controller {

	public function index()
	{
		$this->lang->load('auth', $this->language_lib->detect());
		$data['aukcion'] = 'Gamezone';
		$this->load->model('auctions_model');
		$data['auct'] = $this->auctions_model->game_zones();
		$this->load->view('/common/header_view',$data);
		$this->load->view('gamezone_view',$data);
		$this->load->view('/common/footer_view',$data);
	}
}