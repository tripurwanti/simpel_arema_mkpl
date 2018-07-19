<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller
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
        	$this->load->model('m_user');
        	$data['hasil']=$this->m_user->userfromdb();
        	$data['title']="Profile";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="";
			$data['side4']="";
			$data['side5']="";
			$data['side6']="";
			$data['side7']="";
			$this->template->display('user/index',$data);
        }
        
        function hapusdata()
        {
			$id=$this->uri->segment(3);
			$this->load->model('m_user');
			$hasil=$this->m_user->deletedatafromdb($id);
			if($hasil==1)
			{
				$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
			  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  <strong>Data!</strong> Telah Terhapus
				</div>";
			}
			else
			{
				$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			  <strong>Maaf!</strong> Data Gagal dihapus
				</div>";
			}
			redirect('user');
		}
		
		function editdata()
        {
        	$data['title']="User edit";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="";
			$data['side4']="";
			$data['side5']="";
			$data['side6']="";
			$data['side7']="";
			
        	$id=$this->uri->segment(3);
        	$this->load->model('m_user');
			$hasil=$this->m_user->showdataedit($id);
			$data['hasil']=$hasil->result();

			$this->template->display('user/edit',$data);
		}
		
		function dataupdate()
		{
			$data['id']=$this->input->post('id');
			$data['nama']=$this->input->post('nama');
			$data['email']=$this->input->post('email');
			$data['username']=$this->input->post('username');
			$data['password']=$this->input->post('password');
			
			$this->load->model('m_user');
			$hasil=$this->m_user->updatetusertodb($data);
			$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
					  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					  Data User berhasil Diupdate </b>
					  </div>";
			redirect('user/editdata/'.$data['id'].'');
		}
		
		function notif()
		{
			$this->load->model('m_user');
			$hasil = $this->m_user->getnotif();
			$data = $hasil->row();
			echo $data->PESAN;
		}
}
?>