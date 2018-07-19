<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lock extends CI_Controller
{
       function __construct()
		 {
		  session_start(); //mengadakan session
		  parent::__construct();
		  $this->load->library(array('form_validation','upload'));
		 }
  
        public function index()
        {
			$this->load->view('extra_lock'); 
        }
		
		function login()
		{
              $this->load->library('form_validation'); //load library form_validation
              $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]'); //cek, validasi password

 
              if ( $this->form_validation->run() == TRUE ) { //apabila validasi true(benar semua)
                 $this->load->model('m_user'); // load model m_user
                 $result = $this->m_user->cek_user_login( //jalankan fungsi cek_user_login dari model m_user
                             $this->input->post('username'),  //menangkap username dari form
                             md5($this->input->post('password')) //menangkap password dari form
                          );
                  
                             
                        if ( $result == TRUE) { //apabila result = true(ada data)
                        		$_SESSION['is_login']=TRUE; //create session
                                $_SESSION['log']="";
                                redirect('home'); // redirect controller member
                        }
                        else
                        {
							$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  				<b>password</b> salah
								</div>";
						}
              }
				redirect('lock');
		}
		
		public function logout() //fungsi logout
        {
        	session_destroy(); //session destroy
        	redirect("c_login");//buka halaman login/v_form
        }
}
?>