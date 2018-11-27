<?php  ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class c_notifikasi extends CI_Controller
{
	function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->model('m_notifikasi');
		$this->load->library(array('template','pagination','form_validation','upload'));
		if ( !isset($_SESSION['login_app']) ) {
			redirect('c_login');
		}
	}

	function show_notif(){
		$query = $this->db->query("SELECT COUNT(*) AS count FROM tb_notifikasi");
		$hasil = $this->m_notifikasi->get_notif();
		$data = $hasil->result();
		$count = $query->row();
		if ($count->COUNT < 1){
			echo '<div class="list-group-item flex-column p-2 mb-1" style="color:#FAFAFA;background-color:#D91E18;border:none;">
			<div class="d-flex pb-1">
			<span style="display:inline-block;">
			<span style="display:inline-block;font-size:10px;font-weight: bold">TIDAK ADA NOTIFIKASI <span class="fa fa-search-plus"></span></span>
			</div>';
		}else{
			foreach ($data as $key) {
				if ($key->KETERANGAN == "Data Pelanggan Baru") {
					$color = "#525E64";
					$icon = "fa fa-user";
					$ket = "PELANGGAN BARU ";
				} else if ($key->KETERANGAN == "Sudah Survey") {
					$color = "#D91E18";
					$icon = "fa fa-search-plus";
					$ket = "TELAH DI SURVEY ";
				} else if ($key->KETERANGAN == "Sudah Bayar") {
					$color = "#E87E04";
					$icon = "fa fa-money";
					$ket = "TELAH DI BAYAR ";
				} else if ($key->KETERANGAN == "Sudah RAB") {
					$color = "#F3C200";
					$icon = "fa fa-gavel";
					$ket = "TELAH DI RAB & WO TIANG ";
				} else if ($key->KETERANGAN == "Sudah Pelaksanaan") {
					$color = "#4C87B9";
					$icon = "fa fa-wrench";
					$ket = "TELAH DI LAKSANAKAN "; 
				} else if ($key->KETERANGAN == "Sudah Nyala") {
					$color = "#26C281";
					$icon = "fa fa-plug";
					$ket = "TELAH DI NYALAKAN "; 
				}else{
					echo "Hmm";
				}
				echo '
				<div class="list-group-item flex-column p-2 mb-1 lg-item" style="background-color:'.$color.';">
				<div class="d-flex pb-1">
				<span class="line-header">
				<span class="line-ket">'.$ket.'<span class="'.$icon.'"></span></span>
				<span class="line-text">' .$key->WAKTU .'</span>
				<span class="line-text">(' .$key->NAMA_RAYON .')</span>
				</span>
				</div>
				<hr class="line-hr">
				<span class="line-text">PELANGGAN :' .$key->NAMA_PEL .'</span>
				<span class="line-text">ALAMAT :' .$key->ALAMAT_PEL .'</span>
				<span class="line-text">Daya Baru :' .$key->DAYA.'</span>
				<span class="line-text">Jenis Trans :' . $key->JENIS_TRANSAKSI .'</span>
				</div>';
			}
			if ($count->COUNT > 10) {

				echo '<div align="center">
				<span style="display:inline-block;font-size:10px;font-weight: bold"><a class="btn btn-primary btn-sm" onclick="load_notif_more(10)">Load more</a></span>
				</div>';

				// echo '<div class="list-group-item flex-column p-2 mb-1" style="color:#FAFAFA;background-color:#D91E18;border:none;">
				// <div class="d-flex pb-1">
				// <span style="display:inline-block;">
				// <span style="display:inline-block;font-size:10px;font-weight: bold"><a onclick="load_notif_more(2)">Load more</a></span>
				// </div></div>';
			}
		}
	}

	function load_notif_more($last_data){
		$now = $last_data + 10;
		$query = $this->db->query("SELECT COUNT(*) AS count FROM tb_notifikasi");
		$hasil = $this->m_notifikasi->get_more_notif($last_data);
		$data = $hasil->result();
		$count = $query->row();
		if ($count->COUNT < 1){
			echo '<div class="list-group-item flex-column p-2 mb-1" style="color:#FAFAFA;background-color:#D91E18;border:none;">
			<div class="d-flex pb-1">
			<span style="display:inline-block;">
			<span style="display:inline-block;font-size:10px;font-weight: bold">TIDAK ADA NOTIFIKASI <span class="fa fa-search-plus"></span></span>
			</div>';
		}else{
			foreach ($data as $key) {
				if ($key->KETERANGAN == "Data Pelanggan Baru") {
					$color = "#525E64";
					$icon = "fa fa-user";
					$ket = "PELANGGAN BARU ";
				} else if ($key->KETERANGAN == "Sudah Survey") {
					$color = "#D91E18";
					$icon = "fa fa-search-plus";
					$ket = "TELAH DI SURVEY ";
				} else if ($key->KETERANGAN == "Sudah Bayar") {
					$color = "#E87E04";
					$icon = "fa fa-money";
					$ket = "TELAH DI BAYAR ";
				} else if ($key->KETERANGAN == "Sudah RAB") {
					$color = "#F3C200";
					$icon = "fa fa-gavel";
					$ket = "TELAH DI RAB & WO TIANG ";
				} else if ($key->KETERANGAN == "Sudah Pelaksanaan") {
					$color = "#4C87B9";
					$icon = "fa fa-wrench";
					$ket = "TELAH DI LAKSANAKAN "; 
				} else if ($key->KETERANGAN == "Sudah Nyala") {
					$color = "#26C281";
					$icon = "fa fa-plug";
					$ket = "TELAH DI NYALAKAN "; 
				}else{
					echo "Hmm";
				}
				echo '
				<div class="list-group-item flex-column p-2 mb-1 lg-item" style="background-color:'.$color.';">
				<div class="d-flex pb-1">
				<span class="line-header">
				<span class="line-ket">'.$ket.'<span class="'.$icon.'"></span></span>
				<span class="line-text">' .$key->WAKTU .'</span>
				<span class="line-text">(' .$key->NAMA_RAYON .')</span>
				</span>
				</div>
				<hr class="line-hr">
				<span class="line-text">PELANGGAN :' .$key->NAMA_PEL .'</span>
				<span class="line-text">ALAMAT :' .$key->ALAMAT_PEL .'</span>
				<span class="line-text">Daya Baru :' .$key->DAYA.'</span>
				<span class="line-text">Jenis Trans :' . $key->JENIS_TRANSAKSI .'</span>
				</div>';
			}
			if ($count->COUNT > $now) {

				echo '<div align="center">
						<span style="display:inline-block;font-size:10px;font-weight: bold"><a class="btn btn-primary btn-sm" onclick="load_notif_more(' .$now .')">Load more</a></span>
				</div>';

				// echo '<div class="list-group-item flex-column p-2 mb-1" style="color:#FAFAFA;background-color:#D91E18;border:none;">
				// <div class="d-flex pb-1">
				// <span style="display:inline-block;">
				// <span style="display:inline-block;font-size:10px;font-weight: bold"><a onclick="load_notif_more(' .$now .')">Load more</a></span>
				// </div>';
			}
		}
	}
}
?>