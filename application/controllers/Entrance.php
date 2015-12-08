<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->lang->load('auth', $this->language_lib->detect());
		$login = $this->session->userdata('ay_login');
		if($login == 'admin')
		{
			redirect('/admin');
		}
	} 


    public function index()
    {
		$this->lang->load('auth', $this->language_lib->detect());
        $this->load->view('entrance_view');
    }
	
	public function input()
	{
		//print_r($_POST);exit;
		$this->load->model('auth_model');
		$post['email'] = $_POST['email'];
		$post['password'] = md5($_POST['password']);
		$admin = $this->auth_model->get($post);
		//print_r($admin);exit;
		if(!empty($admin))
		{
			 $newdata = array(
				   'ay_login' =>  $admin[0]->login,
				   'logged_in' => TRUE
			 );
			$this->session->set_userdata($newdata);
			redirect('/admin');
		}
		else
		{
			redirect('/entrance?error=1');
		}
		
	}
}
