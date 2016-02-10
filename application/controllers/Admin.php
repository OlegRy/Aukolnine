<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->lang->load('auth', $this->language_lib->detect());
		$login = $this->session->userdata('ay_login');
		if(empty($login) || $login != 'admin')
		{
			redirect('/auth');
		} 
	}

    public function index()
    {
		$this->lang->load('auth', $this->language_lib->detect());
		$this->load->model('admin_model');
		$data['age'] = $this->admin_model->age();
		$data['gender'] = $this->admin_model->gender();
		$data['rate'] = $this->admin_model->rate();
		$data['products'] = $this->admin_model->products();
		$data['type_site'] = $this->admin_model->type_site();
		//$data['array_count'] = count($data['age']);
        $this->load->view('admin_view', $data);
    }
	
	public function add()
	{
		$this->load->model('admin_model');
		//echo "<pre>";print_r($_POST);
		//echo "<pre>";print_r($_FILES);exit;
		$filename = $_FILES['userfile']['name']; // Получаем изображение
		$ext = substr($filename, 1 + strrpos($filename, ".")); // получаем его расширение
		$image_filename = md5(uniqid(rand(), 1)) . "." . $ext; // придумываем ему новое имя и в конце добавляем к нему расширение и получается полноценный файл
		
		
		$upload_dir = 'images/aukc_image/';
		$upload_file = $upload_dir . $image_filename;
		
		// Пользователю можно загрузить изображения с расширениями: jpg и png
		if (! move_uploaded_file($_FILES["userfile"]["tmp_name"], $upload_file))
		{
			redirect('/admin?error=1');
		}
		$login = $this->session->userdata('ay_login');
		if(empty($login))
		{
			$login = 'admin';
		}
		if($_POST['type_auct'] == 'Gamezone')
		{
			$post['game_zone'] = 1;
		}
		else
		{
			$post['game_zone'] = 0;
		}
		$date_begin = date($_POST['time']);
		$post['name'] = $_POST['name'];
		$post['image'] = $image_filename;
		$post['price'] = $_POST['price'];
		$post['full_price'] = $_POST['full_price'];
		$post['genre'] = $_POST['game_genre'];
		$post['category'] = $_POST['category'];
		$post['login'] = $login;
		$post['text'] = $_POST['auk_text'];
		$post['ticket'] = $_POST['ticket'];
		$post['has_bot'] = $_POST['type_bot'];
		$post['start_time'] = $date_begin;
		//echo "<pre>";print_r($post);exit;
		$this->admin_model->add($post);
		
		redirect('/admin?success=1');
	}
}
