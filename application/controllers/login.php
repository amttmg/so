<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		/*$this->so->log_out();*/
		if ($this->so->user_logged_in()) 
		{
			redirect('dashboard','refresh');
		}
	}

	public function index()
	{
		$this->load->view('login/index');
	}

	public function check()
	{
	
		if ($this->so->check_user($this->input->post('username'),$this->input->post('password'))) 
		{
			redirect('dashboard','refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'Incorrect username or password !');
			$this->load->view('login/index');
		}
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */