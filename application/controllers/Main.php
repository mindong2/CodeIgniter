<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(false);

		$this->load->library('pagination');

		$this->config->set_item('scripts', array('script'));
		$this->config->set_item('styles', array('style'));
/*
		$this->config->set_item('title', '');
		$this->config->set_item('og_title', '');
		$this->config->set_item('og_url', '');
		$this->config->set_item('og_image', '');
		$this->config->set_item('og_description', '');
*/
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{	
		$data = array();

		$data['title'] = "Test Title";
		$data['content'] = "Content";

		$this->load->view('main/main',$data);
	}

	public function notice()
	{	
		$this->load->view('main/notice');
	}
}