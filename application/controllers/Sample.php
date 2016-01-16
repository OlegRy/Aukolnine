<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$this->load->model('sample_model');
	} 

	public function index() {
		$data['sample'] = $this->sample_model->getAll();
		$this->load->view('sample_view', $data);
	}

	public function get() {
		if (isset($_GET) && sizeof($_GET) > 0) {
			$data = $this->cache->get('timer_'.$_GET['id']);
			if (!$data) {
				$get = array('id' => $_GET['id']);	
				$time = $this->sample_model->get($get);
				$data = $time[0];
				$this->cache->save('timer_'.$_GET['id'], $data['timer']);
				echo $data['timer'];
			} else {
				echo $data;
			}
		}
	}

	public function ins() {
		if (isset($_POST)) {
			$this->sample_model->ins();
		}
	}

	public function update() {
		if (isset($_POST) && sizeof($_POST) > 0) {
			$this->cache->save('timer_'.$_POST['id'], $_POST['timer']);
			$post['id'] = $_POST['id'];
			$post['timer'] = $_POST['timer'];
			$this->sample_model->update($post);
		}
	}

	public function getSample() {
		$data = $this->cache->get('sample');
		if (!$data) {
			echo 'Save to cache';
			$data = 'Cached data';
			$this->cache->save('sample', $data);
		} else {
			$this->cache->save('sample', 'Refresh cache');
			echo $this->cache->get('sample');
		}

	}

	public function serverTime() {
		$time = localtime(time(), true);
		
		echo $time['tm_sec'];
	}
}