<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chat extends CI_Controller
{
       function __construct()
        {
                session_start();
                parent::__construct();
        		$this->load->model('m_chat');
                $this->load->library(array('template','pagination','form_validation','upload'));
                if ( !isset($_SESSION['login_app']) ) {
                        redirect('c_login');
                }
        }
  
        public function index()
        {
        	$data['data']= $this->m_chat->getPesan();
        	$data['title']="Chats";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="";
			$data['side4']="";
			$data['side5']="active";
			$data['side6']="";
			$data['side7']="";
			$this->template->display('v_chat',$data);
        }
        
	function tampil_pesan()
	{
		$hasil = $this->m_chat->getPesan();
		$data = $hasil->result();
		$query = $this->db->query("SELECT COUNT(*) AS count FROM tbl_chat");
		$count = $query->row();
		if ($count->COUNT < 1){
			echo '<li class="in">';
				// echo '<img class="avatar" width="20px" alt="" src="'.base_url().'assets/img/pln.PNG"/>';
				echo	'<div class="message">';
				echo		'<span class="arrow"></span>';
				echo		'<a href="#" class="name">SYSTEM </a>';
				echo		'<span class="body">TIDAK ADA PESAN MASUK, SILAHKAN MASUKAN PESAN</span>';
				echo	'</div>';
				echo '</li>';
		}else{
			foreach ($data as $key):
				if($key->NAMA==$_SESSION['nama'])
				{
					$status="out";
				}
				else
				{
					$status="in";
				}
				echo '<li class="'.$status.'">';
				if($key->FOTO=="")
				{
					// echo '<img class="avatar" width="20px" alt="" src="'.base_url().'assets/img/dp/no-img.jpg"/>';
				}
				else
				{
					// echo '<img class="avatar" width="20px" alt="" src="'.base_url().'assets/img/dp/'.$key->FOTO.'"/>';
				}
				echo	'<div style="margin :0px 15px 0px 15px;" class="message">';
				echo		'<span class="arrow"></span>';
				echo		'<a href="#" style="font-size: 11px; font-weight : bold;" class="name">'.$key->NAMA.' </a>';
				echo		'<span style="font-size: 11px; font-weight : bold;" class="datetime"><font color="#fca503">('.$key->BAGIAN.')</font>
							<br/><font color="red">'.$key->WAKTU.'</font> </span>';
				echo		'<span style="font-size: 14px;" class="body">'.$key->PESAN.' </span>';
				echo	'</div>';
				echo '</li>';
			endforeach;	
		}
	}
	public function insert_pesan(){
		$data['pesan'] = $_POST['pesan'];
		$data = $this->m_chat->insertPesan($data);
		if($data >= 1){
			echo "<span style='color:green;'>pesan terkirim...</span>";
			redirect('chat/tampil_pesan');
		}
	}
       
}
?>