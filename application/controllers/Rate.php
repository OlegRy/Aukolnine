<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		$this->lang->load('auth', $this->language_lib->detect());
		$this->load->model('rate_model');
	}

	public function index() {
		$data['rates'] = $this->rate_model->all();
		$data['aukcion'] = 'rates';
		$this->load->view('/common/header_view',$data);
		$this->load->view('rate_view',$data);
		$this->load->view('/common/footer_view',$data);
	} 
}