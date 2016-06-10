<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_out extends CI_Controller {

	public function index()
	{
		$this->so->log_out();
		redirect('login','refresh');
	}

}

/* End of file log_out.php */
/* Location: ./application/controllers/log_out.php */