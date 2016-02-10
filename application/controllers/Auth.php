<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->lang->load('auth', $this->language_lib->detect());
		$this->load->model('auth_model');
		$this->load->model('auctions_model');
	} 

	public function index()
	{
		
		$data['auct'] = $this->auctions_model->lastFive();
		$data['aukcion'] = 'Авторизация';
		if ($this->session->userdata('ay_login')) {
			$data['user_aucts'] = $this->auctions_model->has_user($this->session->userdata('ay_login'));
			$data['autorates'] = $this->auctions_model->autorates($this->session->userdata('ay_login'));
		}
		$this->load->view('/common/header_view',$data);
		$this->load->view('auth_view',$data);
		$this->load->view('auctions_view', $data);
		$this->load->view('/common/footer_view',$data);
	}

	public function reg()
	{
		if(isset($_POST) && sizeof($_POST) > 0)
		{
			$post['email'] = $_POST['email'];
			$post['password'] = md5($_POST['password']);
			$post['login'] = $_POST['login'];
			$post['promocod'] = $_POST['promo'];
			$result = $this->auth_model->insert($post);
			if ($result) redirect('/auth');
			else {
				echo "<script>alert('Пользователь с такими данными уже существует'); window.location = '/#openModal';</script>";
				redirect('/#openModal');
			}
		}
	}
	
	public function auth()
	{
		if(isset($_POST) && sizeof($_POST) > 0)
		{
			$post['email'] = $_POST['email'];
			$post['password'] = md5($_POST['password']);
			$user = $this->auth_model->get($post);
			//echo "<pre>";print_r($user[0]->login);exit;
			if(empty($user))
			{
				redirect('/auth?error=1#openModal'); // Логин или пароль введены неверно
			}
			else
			{
				 $newdata = array(
					   'ay_login' =>  $user[0]->login,
					   'logged_in' => TRUE
				 );
				 $this->session->set_userdata($newdata);
				 redirect('/');
			}
			
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function rate() {
		if (isset($_POST) && sizeof($_POST) > 0) {
			$post['user'] = $this->session->userdata('ay_login');
			if (!empty($post['user']) && !isset($_POST['is_bot'])) {
				$user = $this->auth_model->getByLogin($post);
				if ($user[0]->rates_count > 0) {
					$post['auct_id'] = $_POST['id'];
					$post['time'] = date("Y-m-d H:i:s");
					$auction = $this->auctions_model->getById($post);
					$rates_count = $user[0]->rates_count;
					if ($auction[0]->ticket == 1 && $user[0]->ticket_status == 1 || $auction[0]->ticket == 0) {
						$rates_count -= 1;
						$this->auth_model->updateRatesCount($rates_count, $user[0]->id);
						$price = $auction[0]->price;
						$price = $price + 0.1;
						$this->auctions_model->updateAuction($auction[0]->id, $price, $user[0]->login, $user[0]->id, $post['time']);
						$auction = $this->auctions_model->getById($post);
						$response = array('auction' => $auction[0], 'date' => date('H:i:s', strtotime($post['time'])));
						echo json_encode($response);
					} else {
						$message = array('message' => 'У Вас нет билета для участия в этом аукционе!');
						echo json_encode($message);
					}
				} else {
					$message = array('message' => 'На Вашем счете нет ставок!');
					echo json_encode($message);
				}	
			} else if (!isset($_POST['is_bot'])) {
				$message = array('message' => 'gjdogdjgs');
				echo json_encode($message);
			}
			if (isset($_POST['is_bot']) && $_POST['is_bot']) {
					$post['bot'] = array('id' => 35);
					$bot = $this->auth_model->get_by_id($post['bot']);
					$rates_count = $bot[0]->rates_count;
					$rates_count -= 1;
					$this->auth_model->updateRatesCount($rates_count, $bot[0]->id);
					$post['auct_id'] = $_POST['id'];
					$post['time'] = date("Y-m-d H:i:s");
					$auction = $this->auctions_model->getById($post);
					$price = $auction[0]->price;
					$price = $price + 0.1;
					$this->auctions_model->updateAuction($auction[0]->id, $price, $bot[0]->login, $bot[0]->id, $post['time']);
					$auction = $this->auctions_model->getById($post);
					$response = array('auction' => $auction[0], 'date' => date('H:i:s', strtotime($post['time'])));
					echo json_encode($response);
			
			}
			
		}
	}

	public function apply() {
		if (isset($_POST) && sizeof($_POST) > 0) {
			$post['user'] = $this->session->userdata('ay_login');
			if (!empty($post['user'])) {
				$data['auct_id'] = $_POST['auction_id'];
				$auction = $this->auctions_model->getById($data);
				$post['user_id'] = $this->auth_model->getByLogin($post);
				if ($post['user_id'][0]->ticket_status == 1 && $auction[0]->ticket == 1 || $auction[0]->ticket == 0) {
					$apply['auction_id'] = $_POST['auction_id'];
					$apply['user_id'] = $post['user_id'][0]->id;
					$apply['is_rate'] = 0;
					$this->auth_model->apply($apply);
					$message = array('message' => 'Вы успешно подали заявку на участие!');
					echo json_encode($message);
				} else {
					$message = array('message' => 'У Вас нет билета для участия в этом аукционе!');
					echo json_encode($message);
				}
			} else {
				$message = array('message' => 'Зарегистрируйтесь и войдите!');
				echo json_encode($message);
			}
		}
	}
}
