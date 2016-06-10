<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Loader extends CI_Loader 
{
    
    function _render_page($view, $data=array(), $returnhtml=false)//I think this makes more sense
    {
        $this->view('templates/header',$data,$returnhtml);
        $this->view('templates/sidebar');
    	$this->view($view,$data,$returnhtml);
    	$this->view('templates/footer');
    	return false;
    }
}