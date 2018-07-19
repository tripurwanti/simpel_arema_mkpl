<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Daftar extends CI_Controller
{
       function __construct()
        {
                session_start();
                parent::__construct();
                $this->load->model('m_captcha');
		  		$this->load->helper('captcha');
                $this->load->library(array('template','pagination','form_validation','upload'));
                if ( !isset($_SESSION['login_app']) ) {
                        redirect('c_login');
                }
        }
  
        public function index()
        {
			$data['log']=$_SESSION['log'];
			$data['captcha'] = $this->m_captcha->setCaptcha();
			$this->load->view('v_daftar',$data); //apabila session kosong load login/v_form
        }
		
		function sigup()
        {
			$this->load->library('form_validation'); //load library form_validation
              $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]'); //cek, validasi password
              $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_valid_captcha');
              $this->form_validation->set_message('valid_captcha','%s tidak sama');
 
              if ( $this->form_validation->run() == TRUE ) {
					$config['upload_path']   = './assets/img/dp';
					$config['allowed_types'] = 'gif|jpg|png|bmp';
					$config['max_size']      = '1000000';
					$config['max_width']  = '1000';
	    			$config['max_height']  = '2000';
	                   
	                $this->upload->initialize($config);
	                if(!$this->upload->do_upload('foto')){
	                    $gambar="";
	                }else{
	                    $gambar=$this->upload->file_name;
	                }
	                 $_SESSION['log']="<div class='alert alert-success alert-dismissable'>
			  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  				Anda Telah Terdaftar
								</div>";
		              $this->load->model('m_user'); // load model m_user
		              $data['gambar']=$gambar;
		              $data['nama']=$this->input->post('fullname');
					  $data['email']=$this->input->post('email');
					  $data['akses']=$this->input->post('akses');
					  $data['user']=$this->input->post('username');
					  $data['pass']=md5($this->input->post('password'));
		              $result = $this->m_user->daftartodb($data);
				}
				else
				{
					$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  				<strong><font size='4'>Maaf!</font></strong> Ada kesalahan saat mendaftar
								</div>";
				}
				redirect('daftar');
		}
		
		function valid_captcha($str)
		{
		  $expiration = time()-300; // 5 minutes
                $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
 
                // Then see if a captcha exists:
                $word=$_POST['captcha'];
                $ip=$this->input->ip_address();
                $time=$expiration;
                $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ".$word." AND ip_address = '".$ip."' AND captcha_time >".$time."";
                //$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
                $query = $this->db->query($sql);
                $row = $query->row();
 
                if ($row->COUNT == 0)
                {
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
		}
         
}
?>