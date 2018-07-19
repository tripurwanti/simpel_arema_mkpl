<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller
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
        	$data['title']="Profile";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="";
			$data['side4']="";
			$this->template->display('v_profile',$data);
        }
        
        function ubahpass()
		{
              $this->load->library('form_validation'); //load library form_validation
              $this->form_validation->set_rules('curpass', 'Username', 'required|min_length[4]'); //cek, validasi username
              $this->form_validation->set_rules('newpass', 'Username', 'required|min_length[4]'); //cek, validasi username
              $this->form_validation->set_rules('repass', 'Password', 'required|min_length[4]'); //cek, validasi password

 
              if ( $this->form_validation->run() == TRUE ) { //apabila validasi true(benar semua)
                 $this->load->model('m_user'); // load model m_user
                 $result = $this->m_user->cekubahpass(
                             md5($this->input->post('curpass')) //menangkap password dari form
                          );
                  
                             
                        if ( $result == TRUE) { //apabila result = true(ada data)
                        		$data['new']=$this->input->post('newpass');
                        		$data['re']=$this->input->post('repass');
                        		if($data['new']==$data['re'])
                        		{
									$this->m_user->ubahpass($data);
									$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
					  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					  				Password baru tersimpan
									</div>";
								}
								else
								{
									$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
					  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					  				Data password baru dan pengetikan ulang tidak sama
									</div>";
								}
                        }
                        else
                        {
							$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  				Password Sekarang Tidak Sesuai
								</div>";
						}
              }
              else
              {
			  	$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  				isikan data password dengan benar
								</div>";
			  }
			redirect('profile');
		}
}
?>