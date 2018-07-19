<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
   function __construct()
   {
    session_start();
    parent::__construct();
    $this->load->library(array('template','pagination','form_validation','upload'));
    if ( !isset($_SESSION['login_app']) ) {
        redirect('c_login');
    }
}

public function index()
{	
 $data['title']="Home";
 $data['side1']="active";
 $data['side2']="";
 $data['side3']="";
 $data['side4']="";
 $data['side5']="";
 $data['side6']="";
 $data['side7']="";

 $this->template->display('penting',$data);
}

public function logout()
{
    session_destroy();
    redirect("c_login");
}
}
?>