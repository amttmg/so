<?php 
class So
{
	var $login_url='';
	var $logout_url='';
	public function __construct()
	{
		/*$CI =& get_instance();
		$CI->config->load('so');*/
	}

	public function check_user($username,$password)
	{
		$CI =& get_instance();
		$users=$CI->db->from('users')
			   ->where('username',$username)
			   ->where('password',$password)
			   ->get();
		if ($users->num_rows()>0) 
		{

			$this->set_session($username,$users->row()->id);
			/*redirect($this->login_url,'refresh');*/
			return true;
		}
		else
		{
			return false;
		}
	}

	public function user_logged_in()
	{
		$CI =& get_instance();
		if ($CI->session->has_userdata('logged_in')) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function set_session($username,$user_id)
	{
		$CI =& get_instance();
		$newdata = array(
        'username'  => $username,
        'userid'     =>$user_id,
        'logged_in' => TRUE
		);
		$CI->session->set_userdata($newdata);
	}

	public function log_out()
	{
		$CI =& get_instance();
		$unset_data = array('username', 'userid','logged_in');

		$CI->session->unset_userdata($unset_data);
	}

}
 ?>