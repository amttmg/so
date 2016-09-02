<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Loader extends CI_Loader 
{
    var $css=array();

    var $js=array();

    var $title='';

    function _render_page($view, $data=array(), $returnhtml=false)//I think this makes more sense
    {
        if (isset($data['title'])) 
        {
           $title['title']=$data['title'];
        }
        else
        {
            $title['title']='';
        }

        $this->view('templates/header',$title,$returnhtml);
        $this->view('templates/sidebar');
    	$this->view($view,$data,$returnhtml);
    	$this->view('templates/footer');
    	return false;
    }

    public function render_generate($view, $data=array(), $returnhtml=false)
    {
    	$this->view('templates/generate/header',$data,$returnhtml);
        //$this->view('templates/side_menu');
    	$this->view($view,$data,$returnhtml);
    	$this->view('templates/generate/footer');
    	return false;
    }
}