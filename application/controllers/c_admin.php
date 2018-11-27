<?php  ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_admin extends CI_Controller
{
	function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->library(array('template','pagination','form_validation','upload'));
		if ( !isset($_SESSION['login_app'])) {
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
		

		
            //var diagram
		$temp = $this->calculate_category();
        //TR
		$data['total_data_belum_survey_TR'] = $temp['total_data_belum_survey_TR'];
		$data['total_data_belum_bayar_TR'] = $temp['total_data_belum_bayar_TR'];
		$data['total_data_belum_rab_TR'] = $temp['total_data_belum_rab_TR'];
		$data['total_data_belum_pelaksanaan_TR'] = $temp['total_data_belum_pelaksanaan_TR'];
		$data['total_data_belum_nyala_TR'] = $temp['total_data_belum_nyala_TR'];
		//TM
		$data['total_data_belum_survey_TM'] = $temp['total_data_belum_survey_TM'];
		$data['total_data_belum_bayar_TM'] = $temp['total_data_belum_bayar_TM'];
		$data['total_data_belum_rab_TM'] = $temp['total_data_belum_rab_TM'];
		$data['total_data_belum_pelaksanaan_TM'] = $temp['total_data_belum_pelaksanaan_TM'];
		$data['total_data_belum_nyala_TM'] = $temp['total_data_belum_nyala_TM'];
		//KOLEKTIF
		$data['total_data_belum_survey_KOLEKTIF'] = $temp['total_data_belum_survey_KOLEKTIF'];
		$data['total_data_belum_bayar_KOLEKTIF'] = $temp['total_data_belum_bayar_KOLEKTIF'];
		$data['total_data_belum_rab_KOLEKTIF'] = $temp['total_data_belum_rab_KOLEKTIF'];
		$data['total_data_belum_pelaksanaan_KOLEKTIF'] = $temp['total_data_belum_pelaksanaan_KOLEKTIF'];
		$data['total_data_belum_nyala_KOLEKTIF'] = $temp['total_data_belum_nyala_KOLEKTIF'];
		
		$this->template->display('v_home',$data);
	}

//SHOW SECTION

	public function count_user_not_approval(){
		$this->load->model('m_user');
		$query=$this->m_user->count_non_approval_user()->row();
   		$total_approval = $query->TOTAL_USER_APPROVAL;
   		echo $total_approval;
	}

	public function show_edit_pass(){
		$data['title']="Profile";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="";
		$data['side4']="";
		$data['side5']="";
		$data['side6']="";
		$this->template->display('v_profile',$data);
	}

	public function show_all_admin(){
		$this->load->model('m_user');
		$data['hasil']=$this->m_user->userfromdb();
		$data['hasil_unapprove']=$this->m_user->userfromdb_unapprove();
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

	public function show_regis_admin(){
		$this->load->model('m_captcha');
		$data['log']=$_SESSION['log'];
		$data['captcha'] = $this->m_captcha->setCaptcha();
		$this->load->view('v_daftar',$data);
	}

	public function show_edit_admin($id){
		$data['title']="User edit";
		$data['side1']="";
		$data['side2']="";
		$data['side3']="";
		$data['side4']="";
		$data['side5']="";
		$data['side6']="";
		$data['side7']="";
		$this->load->model('m_user');
		$hasil=$this->m_user->showdataedit($id);
		$data['hasil']=$hasil->result();

		$this->template->display('user/edit',$data);
	}

	public function show_lockscreen(){
		$this->load->view('v_extra_lock'); 
	}
//END SHOW SECTION

	function cek_email_approve($id){
		$hasil = $this->db->query("SELECT EMAIL as EMAIL FROM tb_pengolah WHERE id='$id'");
		$data = $hasil->row();
		$email = $data->EMAIL;
		return $email;
	}

	function user_approve($id){
		$email=$this->cek_email_approve($id);
		$this->load->model('m_user');
		$this->m_user->approve($id);
		$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<strong>Data!</strong> Berhasil di <b>Setujui</b>
		</div>";
		redirect(site_url('c_email/send_email_approval/'.rawurlencode($email).'/Y'));
	}

	function user_unapprove($id){
		$email=$this->cek_email_approve($id);
		$this->load->model('m_user');
		$hasil=$this->m_user->unapprove($id);
		if($hasil==1)
		{
			$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<strong>Data!</strong> Berhasil Tidak di <b>Setujui</b>
			</div>";
		}
		else
		{
			$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<strong>Maaf!</strong> Data Gagal Tidak di <b>Setujui</b>
			</div>";
		}
		redirect(site_url('c_email/send_email_approval/'.rawurlencode($email).'/N'));
	}

	function login_from_lockscreen()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');


		if ( $this->form_validation->run() == TRUE ) {
			$this->load->model('m_user');
			$result = $this->m_user->cek_user_login(
				$this->input->post('username'),
				md5($this->input->post('password'))
			);
			if ( $result == TRUE) { 
				$_SESSION['is_login']=TRUE;
				$_SESSION['log']="";
				redirect('c_admin');
			}
			else
			{
				$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b>password</b> salah
				</div>";
			}
		}
		redirect('c_admin/show_lockscreen');
	}

	function valid_captcha($str)
	{
		$expiration = time()-300; 
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

	public function edit_foto(){
		$config['upload_path']   = './assets/img/dp/';
		$config['allowed_types'] = '*';
		$config['file_name'] = "FOTO_PROFIL_" .$_SESSION['nama'];
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('foto_profil')){
			$gambar="";
			$_SESSION['log']='<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Maaf!</strong> Tidak Dapat Menyimpan Data</b>
			</div>';
			redirect(site_url('c_admin/show_edit_pass'));
		}else{
			$this->load->model('m_user');
			$gambar=$this->upload->file_name;
			$_SESSION['log']="<div class='alert alert-success alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			Foto profil berhasil dirubah
			</div>";
			$data['foto']=$gambar;
			$data['id_user']=$_SESSION['id'];
			$this->m_user->update_foto_profil($data);
			$_SESSION['foto'] = $gambar;
			redirect(site_url('c_admin'));
		}
	}

	function regis_admin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
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
			$this->load->model('m_user');
			$data['gambar']=$gambar;
			$data['nama']=$this->input->post('fullname');
			$data['email']=$this->input->post('email');
			$data['akses']=$this->input->post('akses');
			$data['user']=$this->input->post('username');
			$data['pass']=md5($this->input->post('password'));
			$data['approval']='Y';
			$result = $this->m_user->daftartodb($data);
			redirect(site_url('c_admin/show_all_admin'));
		}
		else
		{
			$_SESSION['log']="<div class='alert alert-danger alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<strong><font size='4'>Maaf!</font></strong> Ada kesalahan saat mendaftar
			</div>";
			redirect(site_url('c_admin/show_regis_admin'));
		}
	}

	function delete_admin($id){
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
		redirect(site_url('c_admin/show_all_admin'));
	}

	function edit_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('curpass', 'Username', 'required|min_length[4]');
		$this->form_validation->set_rules('newpass', 'Username', 'required|min_length[4]');
		$this->form_validation->set_rules('repass', 'Password', 'required|min_length[4]');


		if ( $this->form_validation->run() == TRUE ) {
			$this->load->model('m_user');
			$result = $this->m_user->cekubahpass(
				md5($this->input->post('curpass'))
			);


			if ( $result == TRUE) {
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
		redirect('c_admin/show_edit_pass');
	}

	function edit_admin(){
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
		redirect('c_admin/show_edit_admin/'.$data['id'].'');
	}

	function notif(){
		$this->load->model('m_user');
		$hasil = $this->m_user->getnotif();
		$data = $hasil->row();
		echo $data->PESAN;
	}

	

	public function logout()
	{
		session_destroy();
		redirect("c_login");
	}


//Calculate Section
	private function calculate_category(){
		$this->load->model('m_pelanggantr');
		$this->load->model('m_pelanggantm');
		$this->load->model('m_kolektif');
            //OLAH DATA TR
		$query=$this->m_pelanggantr->get_total_data_GMBR_TR()->row();
		$total_gmbr_TR = $query->TOTAL_SURVEY;
		$query=$this->m_pelanggantr->get_total_data_BAYAR_TR()->row();
		$total_BAYAR_TR = $query->TOTAL_BAYAR;
		$query=$this->m_pelanggantr->get_total_data_RAB_TR()->row();
		$total_RAB_TR = $query->TOTAL_RAB;
		$query=$this->m_pelanggantr->get_total_data_PELAKSANAAN_TR()->row();
		$total_PELAKSANAAN_TR = $query->TOTAL_PELAKSANAAN;
		$query=$this->m_pelanggantr->get_total_data_NYALA_TR()->row();
		$total_NYALA_TR = $query->TOTAL_NYALA;
		$data['total_data_belum_survey_TR'] = $total_gmbr_TR;
		$data['total_data_belum_bayar_TR'] = $total_BAYAR_TR;
		$data['total_data_belum_rab_TR'] = $total_RAB_TR;
		$data['total_data_belum_pelaksanaan_TR'] = $total_PELAKSANAAN_TR;
		$data['total_data_belum_nyala_TR'] = $total_NYALA_TR;
            //END OLAH DATA TR
            //OLAH DATA TM
		$query=$this->m_pelanggantm->get_total_data_GMBR_TM()->row();
		$total_gmbr_TM = $query->TOTAL_SURVEY;
		$query=$this->m_pelanggantm->get_total_data_BAYAR_TM()->row();
		$total_BAYAR_TM = $query->TOTAL_BAYAR;
		$query=$this->m_pelanggantm->get_total_data_RAB_TM()->row();
		$total_RAB_TM = $query->TOTAL_RAB;
		$query=$this->m_pelanggantm->get_total_data_PELAKSANAAN_TM()->row();
		$total_PELAKSANAAN_TM = $query->TOTAL_PELAKSANAAN;
		$query=$this->m_pelanggantm->get_total_data_NYALA_TM()->row();
		$total_NYALA_TM = $query->TOTAL_NYALA;
		$data['total_data_belum_survey_TM'] = $total_gmbr_TM;
		$data['total_data_belum_bayar_TM'] = $total_BAYAR_TM;
		$data['total_data_belum_rab_TM'] = $total_RAB_TM;
		$data['total_data_belum_pelaksanaan_TM'] = $total_PELAKSANAAN_TM;
		$data['total_data_belum_nyala_TM'] = $total_NYALA_TM;
            //END OLAH DATA TM
            //OLAH DATA KOLEKTIF
		$query=$this->m_kolektif->get_total_data_GMBR_KOLEKTIF()->row();
		$total_gmbr_KOLEKTIF = $query->TOTAL_SURVEY;
		$query=$this->m_kolektif->get_total_data_BAYAR_KOLEKTIF()->row();
		$total_BAYAR_KOLEKTIF = $query->TOTAL_BAYAR;
		$query=$this->m_kolektif->get_total_data_RAB_KOLEKTIF()->row();
		$total_RAB_KOLEKTIF = $query->TOTAL_RAB;
		$query=$this->m_kolektif->get_total_data_PELAKSANAAN_KOLEKTIF()->row();
		$total_PELAKSANAAN_KOLEKTIF = $query->TOTAL_PELAKSANAAN;
		$query=$this->m_kolektif->get_total_data_NYALA_KOLEKTIF()->row();
		$total_NYALA_KOLEKTIF = $query->TOTAL_NYALA;
		$data['total_data_belum_survey_KOLEKTIF'] = $total_gmbr_KOLEKTIF;
		$data['total_data_belum_bayar_KOLEKTIF'] = $total_BAYAR_KOLEKTIF;
		$data['total_data_belum_rab_KOLEKTIF'] = $total_RAB_KOLEKTIF;
		$data['total_data_belum_pelaksanaan_KOLEKTIF'] = $total_PELAKSANAAN_KOLEKTIF;
		$data['total_data_belum_nyala_KOLEKTIF'] = $total_NYALA_KOLEKTIF;
            //END OLAH DATA KOLEKTIF
		return $data;
	}

}
?>