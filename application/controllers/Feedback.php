<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->lang->load('auth', $this->language_lib->detect());
		$this->load->model('captcha_model');
	} 

	public function index()
	{
		$data['aukcion'] = 'Feedback';
		$data['captcha'] = $this->captcha_model->get_by_id(array('id' => rand(1, 4)));
		$this->load->view('/common/header_view',$data);
		$this->load->view('feedback_view',$data);
		$this->load->view('/common/footer_view',$data);
	}

	public function reload_captcha() {
		$captcha = $this->captcha_model->get_by_id(array('id' => rand(1, 4)));
		echo json_encode($captcha[0]);
	}

	public function send_feedback() {
		if (isset($_POST) && sizeof($_POST)) {
			$headers = "From: OlegRy1994@yandex.ru\r\n";
			$headers .= "Reply-To: some@gmail.com\r\n";
			$headers .= "Return-Path: some2@gmail.com\r\n";
			$headers .= "CC: leitosha15@rambler.ru\r\n";
			$headers .= "BCC: hidden@example.com\r\n";
			$feedback = $_POST['feedback'];
			mail('leitosha94@gmail.com', 'Отзыв', $feedback, $headers);
			echo json_encode(array('success' => 'Ваш отзыв успешно отправлен!'));
		} else {
			echo json_encode(array('error' => 'Что-то пошло не так :('));
		}
	}
}
