<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();		
		$this->lang->load('auth', $this->language_lib->detect());
		$login = $this->session->userdata('ay_login');
		$this->load->model('personal_model');
		if(empty($login))
		{
			redirect('/auth');
		}
	} 
	
	public function lang()
	{
		$this->lang->load('auth', $this->language_lib->change_lang($_GET['lang']));
		redirect('/personal');
	}

    public function index()
    {
		$data['aukcion'] = 'Aукцион';
		$data['personal'] = 'Personal';
		$post['login'] = $this->session->userdata('ay_login');
		$data['user'] = $this->personal_model->get($post);
		$this->load->view('/common/header_view',$data);
		$this->load->view('personal_view', $data);
		$this->load->view('/common/footer_view',$data);
    }
	
	public function change_password()
	{
		$post['current'] = md5($_POST['current']);
		$new_password = md5($_POST['new_password']);
		$my_password = $this->personal_model->get_password($post);
		if($my_password > 0)
		{
			$login = $this->session->userdata('ay_login');
			$array['password'] = $new_password;
			$this->personal_model->change_password($array, $login);
			echo "success";
		}
		else
		{
			echo "error";
		}
	}
	
	public function info_personal()
	{
		//print_r($_REQUEST);exit;
		$login = $this->session->userdata('ay_login');
		$post['login'] = strip_tags(trim($_POST['login']));
		$post['firstname'] = strip_tags(trim($_POST['firstname']));
		$post['lastname'] = strip_tags(trim($_POST['lastname']));
		$post['gender'] = $_POST['pol'];
		$post['age'] = $_POST['age'];
		if($post['login'] == '')
		{
			$post['login'] = $this->session->userdata('ay_login');
		}
		$this->personal_model->info_personal($post, $login);
		echo "success";
	}
	
	public function load_avatar()
	{
		
		$filename = $_FILES['my_avatar']['name']; // Получаем изображение
		$ext = substr($filename, 1 + strrpos($filename, ".")); // получаем его расширение
		$image_filename = md5(uniqid(rand(), 1)) . "." . $ext; // придумываем ему новое имя и в конце добавляем к нему расширение и получается полноценный файл
		
		
		$upload_dir = 'images/users/';
		$upload_file = $upload_dir . $image_filename;
		
		// Пользователю можно загрузить изображения с расширениями: jpg и png
		if (! move_uploaded_file($_FILES["my_avatar"]["tmp_name"], $upload_file))
		{
			redirect('/personal?error_image=1');
		}
		$login = $this->session->userdata('ay_login');
		$post['avatar'] = $image_filename;
		$this->personal_model->avatar($post, $login);
		redirect('/personal');
	}
	
	public function users_address()
	{
		$post['fio'] = strip_tags(trim($_POST['fio']));
		$post['email_index'] = strip_tags(trim($_POST['email']));
		$post['country'] = strip_tags(trim($_POST['country']));
		$post['city'] = strip_tags(trim($_POST['city']));
		$post['address'] = strip_tags(trim($_POST['address']));
		$post['phone'] = strip_tags(trim($_POST['phone']));
		$post['note'] = strip_tags(trim($_POST['note']));
		$address = $this->personal_model->address($post);
		if($address == true)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
	}
}
