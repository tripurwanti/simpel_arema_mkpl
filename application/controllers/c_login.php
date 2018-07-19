<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_login extends CI_Controller
{
 function __construct()
 {
		  session_start(); //mengadakan session
		  parent::__construct();
		  $this->load->library(array('form_validation','upload'));
		  $this->load->model('m_captcha');
		  $this->load->helper('captcha');
		  if ( isset($_SESSION['login_app']) ) { //cek apakah session ada
		                 redirect('home'); //redirect controller home
                   }
                   if ( !isset($_SESSION['log']) )
                   {
                     $_SESSION['log']="";
                   }
                 }
                 
                 public function index()
                 {
                   $data['log']=$_SESSION['log'];
			$this->load->view('v_login',$data); //apabila session kosong load login/v_form
    }
    
    function login()
    {
              $this->load->library('form_validation'); //load library form_validation
              $this->form_validation->set_rules('username', 'Username', 'required'); //cek, validasi username
              $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]'); //cek, validasi password

              
              if ( $this->form_validation->run() == TRUE ) { //apabila validasi true(benar semua)
                 $this->load->model('m_user'); // load model m_user
                 $result = $this->m_user->cek_user_login( //jalankan fungsi cek_user_login dari model m_user
                             $this->input->post('username'),  //menangkap username dari form
                             md5($this->input->post('password')) //menangkap password dari form
                           );
                 
                 
                        if ( $result == TRUE) { //apabila result = true(ada data)
                        		$_SESSION['login_app']=TRUE; //create session
                            $this->load->model('m_user');
                            $data['hasil']=$this->m_user->adminfromdb($this->input->post('username'));
                            $hasil=$data['hasil'];
                            foreach($hasil as $listdata):
                              $_SESSION['id']=$listdata->ID;
                              $_SESSION['nama']=$listdata->NAMA;
                              $_SESSION['user']=$listdata->USERNAME;
                              $_SESSION['foto']=$listdata->FOTO;
                              $_SESSION['akses']=$listdata->AKSES;
                              $_SESSION['rayon']=$listdata->NAMA_RAYON;
                            endforeach;
                            $_SESSION['log']="";
                                redirect('home'); // redirect controller member
                              }
                              else
                              {
                               $_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
                               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                               Kombinasi <b>username</b>/<b>password</b> salah
                               </div>";
                             }
                           }
                           redirect('c_login');
                         }
                         
                       }
                       ?>