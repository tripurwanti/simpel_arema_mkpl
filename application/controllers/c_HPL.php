<?php  ?>
<?php 
class c_HPL extends CI_Controller
{
	function __construct()
	{
		session_start();
		parent::__construct();
		$HPL_TR=array();
		$HPL_TM=array();
		$HPL_KOLEKTIF=array();
		$jumlah_data_pelanggan_bayar_TM = array();
		$jumlah_data_pelanggan_bayar_TR = array();
		$jumlah_data_pelanggan_bayar_KOLEKTIF = array();
		$total_HPL_TR = array();
		$total_HPL_TM = array();
		$total_HPL_KOLEKTIF = array();
		$this->load->library(array('template','pagination','form_validation','upload'));
		if ( !isset($_SESSION['login_app']) ) {
			redirect('c_login');
		}
	}
	function export_to_excel(){
		$this->load->model('m_pelanggantm');
		$this->load->model('m_pelanggantr');
		$this->load->model('m_kolektif');

		for ($i=0; $i < 14 ; $i++) { 
			$HPL_TR[] = 0;
		}
		
		for ($i=0; $i < 14 ; $i++) { 
			$HPL_TM[] = 0;
		}
		
		for ($i=0; $i < 14 ; $i++) { 
			$HPL_KOLEKTIF[] = 0;
		}

		
		for ($i=0; $i < 14 ; $i++) { 
			$jumlah_data_pelanggan_bayar_TM[] = 0;
		}
		
		for ($i=0; $i < 14 ; $i++) { 
			$jumlah_data_pelanggan_bayar_TM[] = 0;
		}
		
		for ($i=0; $i < 14 ; $i++) { 
			$jumlah_data_pelanggan_bayar_KOLEKTIF[] = 0;
		}

		
		for ($i=0; $i < 14 ; $i++) { 
			$total_HPL_TR[] = 0;
		}
		
		for ($i=0; $i < 14 ; $i++) { 
			$total_HPL_TM[] = 0;
		}
		
		for ($i=0; $i < 14 ; $i++) { 
			$total_HPL_KOLEKTIF[] = 0;
		}


		//RAYON LAWANG
		$total_data_TR_LAWANG = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN LAWANG')->row();
		$temp_total_data_TR = $total_data_TR_LAWANG->TOTAL;
		$total_data_TM_LAWANG = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN LAWANG')->row();
		$temp_total_data_TM = $total_data_TM_LAWANG->TOTAL;
		$total_data_KOLEKTIF_LAWANG = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN LAWANG')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_LAWANG->TOTAL;

		$data_TR_LAWANG = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN LAWANG')->result();
		$data_TM_LAWANG = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN LAWANG')->result();
		$data_KOLEKTIF_LAWANG = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN LAWANG')->result();

		$total_HPL_Lawang_TR = 0;
		$total_HPL_Lawang_TM = 0; 
		$total_HPL_Lawang_KOLEKTIF = 0;

		foreach ($data_TR_LAWANG as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Lawang_TR += $selisih_tmp->days;
					// echo "LAWANG TR ".$total_HPL_Lawang_TR ."<br>";
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Lawang_TR += $selisih_tmp->days;
					// echo "LAWANG TR ".$total_HPL_Lawang_TR ."<br>";
				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[0] = intval(floor($total_HPL_Lawang_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR Lawang: " .$HPL_TR[0] ."<br>";

		foreach ($data_TM_LAWANG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Lawang_TM += $selisih_tmp->days;
					// echo "LAWANG TM ".$total_HPL_Lawang_TM ."<br>";
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Lawang_TM += $selisih_tmp->days;
					// echo "LAWANG TM ".$total_HPL_Lawang_TM ."<br>";

				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[0] = intval(floor($total_HPL_Lawang_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM Lawang: " .$HPL_TM[0] ."<br>";

		foreach ($data_KOLEKTIF_LAWANG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Lawang_KOLEKTIF += $selisih_tmp->days;
					// echo "LAWANG KOLEKTIF ".$total_HPL_Lawang_KOLEKTIF ."<br>";
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Lawang_KOLEKTIF += $selisih_tmp->days;
					// echo "LAWANG KOLEKTIF ".$total_HPL_Lawang_KOLEKTIF ."<br>";

				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[0] = intval(floor($total_HPL_Lawang_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF Lawang: " .$HPL_KOLEKTIF[0] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[0] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[0] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[0] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[0] = $total_HPL_Lawang_TR;
		$total_HPL_TM[0] = $total_HPL_Lawang_TM;
		$total_HPL_KOLEKTIF[0] = $total_HPL_Lawang_KOLEKTIF;


		//RAYON BULULAWANG
		$total_data_TR_BULULAWANG = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN BULULAWANG')->row();
		$temp_total_data_TR = $total_data_TR_BULULAWANG->TOTAL;
		$total_data_TM_BULULAWANG = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN BULULAWANG')->row();
		$temp_total_data_TM = $total_data_TM_BULULAWANG->TOTAL;
		$total_data_KOLEKTIF_BULULAWANG = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN BULULAWANG')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_BULULAWANG->TOTAL;


		$data_TR_BULULAWANG = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN BULULAWANG')->result();
		$data_TM_BULULAWANG = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN BULULAWANG')->result();
		$data_KOLEKTIF_BULULAWANG = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN BULULAWANG')->result();


		$total_HPL_Bululawang_TR = 0; 
		$total_HPL_Bululawang_TM = 0; 
		$total_HPL_Bululawang_KOLEKTIF = 0;


		foreach ($data_TR_BULULAWANG as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Bululawang_TR += $selisih_tmp->days;
					// echo "HPL bululawang ".$total_HPL_Bululawang_TR.'<br/>';

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Bululawang_TR += $selisih_tmp->days;
					// echo "HPL bululawang ".$total_HPL_Bululawang_TR.'<br/>';

				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[1] = intval(floor($total_HPL_Bululawang_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR Bululawang: " .$HPL_TR[1] ."<br>";


		foreach ($data_TM_BULULAWANG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Bululawang_TM += $selisih_tmp->days;
					// echo "HPL TM bululawang ".$total_HPL_Bululawang_TM.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Bululawang_TM += $selisih_tmp->days;
					// echo "HPL TM bululawang ".$total_HPL_Bululawang_TR.'<br/>';
				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[1] = intval(floor($total_HPL_Bululawang_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM Bululawang: " .$HPL_TM[1] ."<br>";

		foreach ($data_KOLEKTIF_BULULAWANG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Bululawang_KOLEKTIF += $selisih_tmp->days;
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Bululawang_KOLEKTIF += $selisih_tmp->days;
				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[1] = intval(floor($total_HPL_Bululawang_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF Bululawang: " .$HPL_KOLEKTIF[1] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[1] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[1] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[1] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[1] = $total_HPL_Bululawang_TR;
		$total_HPL_TM[1] = $total_HPL_Bululawang_TM;
		$total_HPL_KOLEKTIF[1] = $total_HPL_Bululawang_KOLEKTIF;

		
		//RAYON BATU
		$total_data_TR_BATU = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN BATU')->row();
		$temp_total_data_TR = $total_data_TR_BATU->TOTAL;
		$total_data_TM_BATU = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN BATU')->row();
		$temp_total_data_TM = $total_data_TM_BATU->TOTAL;
		$total_data_KOLEKTIF_BATU = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN BATU')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_BATU->TOTAL;


		$data_TM_BATU = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN BATU')->result();
		$data_TR_BATU = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN BATU')->result();
		$data_KOLEKTIF_BATU = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN BATU')->result();

		$total_HPL_Batu_TR = 0; 
		$total_HPL_Batu_TM = 0; 
		$total_HPL_Batu_KOLEKTIF = 0;


		foreach ($data_TR_BATU as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Batu_TR += $selisih_tmp->days;
					// echo ' BATU TR '.$total_HPL_Batu_TR.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Batu_TR += $selisih_tmp->days;
					// echo 'BATU TR '.$total_HPL_Batu_TR.'<br/>';
				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[2] = intval(floor($total_HPL_Batu_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR Batu: " .$HPL_TR[2] ."<br>";

		foreach ($data_TM_BATU as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Batu_TM += $selisih_tmp->days;
					// echo 'BATU TM '.$total_HPL_Batu_TM.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Batu_TM += $selisih_tmp->days;
					// echo 'BATU TM '.$total_HPL_Batu_TM.'<br/>';
				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[2] = intval(floor($total_HPL_Batu_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM Batu: " .$HPL_TM[2] ."<br>";


		foreach ($data_KOLEKTIF_BATU as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Batu_KOLEKTIF += $selisih_tmp->days;
					// echo 'BATU KOLEKTIF '.$total_HPL_Batu_KOLEKTIF.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Batu_KOLEKTIF += $selisih_tmp->days;
					// echo 'BATU KOLEKTIF '.$total_HPL_Batu_KOLEKTIF.'<br/>';
				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[2] = intval(floor($total_HPL_Batu_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF Bululawang: " .$HPL_KOLEKTIF[2] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[2] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[2] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[2] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[2] = $total_HPL_Batu_TR;
		$total_HPL_TM[2] = $total_HPL_Batu_TM;
		$total_HPL_KOLEKTIF[2] = $total_HPL_Batu_KOLEKTIF;


		//RAYON SINGOSARI
		$total_data_TR_SINGOSARI = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN SINGOSARI')->row();
		$temp_total_data_TR = $total_data_TR_SINGOSARI->TOTAL;		
		$total_data_TM_SINGOSARI = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN SINGOSARI')->row();
		$temp_total_data_TM = $total_data_TM_SINGOSARI->TOTAL;
		$total_data_KOLEKTIF_SINGOSARI = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN SINGOSARI')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_SINGOSARI->TOTAL;

		$data_TM_SINGOSARI = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN SINGOSARI')->result();
		$data_TR_SINGOSARI = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN SINGOSARI')->result();
		$data_KOLEKTIF_SINGOSARI = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN SINGOSARI')->result();

		$total_HPL_Singosari_TR = 0; 
		$total_HPL_Singosari_TM = 0; 
		$total_HPL_Singosari_KOLEKTIF = 0;


		foreach ($data_TR_SINGOSARI as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Singosari_TR += $selisih_tmp->days;
					// echo 'SINGOSARI TR '.$total_HPL_Singosari_TR.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Singosari_TR += $selisih_tmp->days;
					// echo 'SINGOSARI TR '.$total_HPL_Singosari_TR.'<br/>';
				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[3] = intval(floor($total_HPL_Singosari_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR Singosari: " .$HPL_TR[3] ."<br>";


		foreach ($data_TM_SINGOSARI as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Singosari_TM += $selisih_tmp->days;
					// echo 'SINGOSARI TM '.$total_HPL_Singosari_TM.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Singosari_TM += $selisih_tmp->days;
					// echo 'SINGOSARI TM '.$total_HPL_Singosari_TM.'<br/>';
				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[3] = intval(floor($total_HPL_Singosari_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM Singosari: " .$HPL_TM[3] ."<br>";


		foreach ($data_KOLEKTIF_SINGOSARI as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Singosari_KOLEKTIF += $selisih_tmp->days;
					// echo 'SINGOSARI KOLEKTIF '.$total_HPL_Singosari_KOLEKTIF.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Singosari_KOLEKTIF += $selisih_tmp->days;
					// echo 'SINGOSARI KOLEKTIF '.$total_HPL_Singosari_KOLEKTIF.'<br/>';
				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[3] = intval(floor($total_HPL_Singosari_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF Singosari: " .$HPL_KOLEKTIF[3] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[3] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[3] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[3] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[3] = $total_HPL_Singosari_TR;
		$total_HPL_TM[3] = $total_HPL_Singosari_TM;
		$total_HPL_KOLEKTIF[3] = $total_HPL_Singosari_KOLEKTIF;


		//RAYON KEPANJEN
		$total_data_TR_KEPANJEN = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN KEPANJEN')->row();
		$temp_total_data_TR = $total_data_TR_KEPANJEN->TOTAL;		
		$total_data_TM_KEPANJEN = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN KEPANJEN')->row();
		$temp_total_data_TM = $total_data_TM_KEPANJEN->TOTAL;		
		$total_data_KOLEKTIF_KEPANJEN = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN KEPANJEN')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_KEPANJEN->TOTAL;		


		$data_TM_KEPANJEN = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN KEPANJEN')->result();
		$data_TR_KEPANJEN = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN KEPANJEN')->result();
		$data_KOLEKTIF_KEPANJEN = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN KEPANJEN')->result();

		$total_HPL_Kepanjen_TR = 0; 
		$total_HPL_Kepanjen_TM = 0; 
		$total_HPL_Kepanjen_KOLEKTIF = 0;


		foreach ($data_TR_KEPANJEN as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Kepanjen_TR += $selisih_tmp->days;
					// echo 'KEPANJEN TR '.$total_HPL_Kepanjen_TR.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Kepanjen_TR += $selisih_tmp->days;
					// echo 'KEPANJEN TR '.$total_HPL_Kepanjen_TR.'<br/>';


				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[4] = intval(floor($total_HPL_Kepanjen_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR KEPANJEN: " .$HPL_TR[4] ."<br>";
		
		foreach ($data_TM_KEPANJEN as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Kepanjen_TM += $selisih_tmp->days;
					// echo 'KEPANJEN TM '.$total_HPL_Kepanjen_TM.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Kepanjen_TM += $selisih_tmp->days;
					// echo 'KEPANJEN TM '.$total_HPL_Kepanjen_TM.'<br/>';
				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[4] = intval(floor($total_HPL_Kepanjen_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM KEPANJEN: " .$HPL_TM[4] ."<br>";

		foreach ($data_KOLEKTIF_KEPANJEN as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Kepanjen_KOLEKTIF += $selisih_tmp->days;
					// echo 'KEPANJEN KOLEKTIF '.$total_HPL_Kepanjen_KOLEKTIF.'<br/>';

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Kepanjen_KOLEKTIF += $selisih_tmp->days;
					// echo 'KEPANJEN KOLEKTIF '.$total_HPL_Kepanjen_KOLEKTIF.'<br/>';


				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[4] = intval(floor($total_HPL_Kepanjen_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF KEPANJEN: " .$HPL_KOLEKTIF[4] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[4] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[4] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[4] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[4] = $total_HPL_Kepanjen_TR;
		$total_HPL_TM[4] = $total_HPL_Kepanjen_TM;
		$total_HPL_KOLEKTIF[4] = $total_HPL_Kepanjen_KOLEKTIF;


		//RAYON TUMPANG
		$total_data_TR_TUMPANG = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN TUMPANG')->row();
		$temp_total_data_TR = $total_data_TR_TUMPANG->TOTAL;		
		$total_data_TM_TUMPANG = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN TUMPANG')->row();
		$temp_total_data_TM = $total_data_TM_TUMPANG->TOTAL;		
		$total_data_KOLEKTIF_TUMPANG = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN TUMPANG')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_TUMPANG->TOTAL;		


		$data_TM_TUMPANG = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN TUMPANG')->result();
		$data_TR_TUMPANG = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN TUMPANG')->result();
		$data_KOLEKTIF_TUMPANG = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN TUMPANG')->result();

		$total_HPL_Tumpang_TR = 0; 
		$total_HPL_Tumpang_TM = 0; 
		$total_HPL_Tumpang_KOLEKTIF = 0;


		foreach ($data_TR_TUMPANG as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Tumpang_TR += $selisih_tmp->days;
					// echo 'TUMPANG TR '.$total_HPL_Tumpang_TR.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Tumpang_TR += $selisih_tmp->days;
					// echo 'TUMPANG TR '.$total_HPL_Tumpang_TR.'<br/>';


				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[5] = intval(floor($total_HPL_Tumpang_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR Tumpang: " .$HPL_TR[5] ."<br>";

		foreach ($data_TM_TUMPANG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Tumpang_TM += $selisih_tmp->days;
					// echo 'TUMPANG TM '.$total_HPL_Tumpang_TR.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Tumpang_TM += $selisih_tmp->days;
					// echo 'TUMPANG TM '.$total_HPL_Tumpang_TR.'<br/>';



				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[5] = intval(floor($total_HPL_Tumpang_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM Tumpang: " .$HPL_TM[5] ."<br>";

		foreach ($data_KOLEKTIF_TUMPANG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Tumpang_KOLEKTIF += $selisih_tmp->days;
					// echo 'TUMPANG KOLEKTIF '.$total_HPL_Tumpang_KOLEKTIF.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Tumpang_KOLEKTIF += $selisih_tmp->days;
					// echo 'TUMPANG KOLEKTIF '.$total_HPL_Tumpang_KOLEKTIF.'<br/>';



				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[5] = intval(floor($total_HPL_Tumpang_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF Tumpang: " .$HPL_KOLEKTIF[5] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[5] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[5] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[5] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[5] = $total_HPL_Tumpang_TR;
		$total_HPL_TM[5] = $total_HPL_Tumpang_TM;
		$total_HPL_KOLEKTIF[5] = $total_HPL_Tumpang_KOLEKTIF;


		//RAYON GONDANGLEGI
		$total_data_TR_GONDANGLEGI = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN GONDANGLEGI')->row();
		$temp_total_data_TR = $total_data_TR_GONDANGLEGI->TOTAL;		
		$total_data_TM_GONDANGLEGI = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN GONDANGLEGI')->row();
		$temp_total_data_TR = $total_data_TM_GONDANGLEGI->TOTAL;
		$total_data_KOLEKTIF_GONDANGLEGI = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN GONDANGLEGI')->row();
		$temp_total_data_TR = $total_data_KOLEKTIF_GONDANGLEGI->TOTAL;		

		$data_TR_GONDANGLEGI = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN GONDANGLEGI')->result();
		$data_TM_GONDANGLEGI = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN GONDANGLEGI')->result();
		$data_KOLEKTIF_GONDANGLEGI = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN GONDANGLEGI')->result();


		$total_HPL_Gondanglegi_TR = 0; 
		$total_HPL_Gondanglegi_TM = 0; 
		$total_HPL_Gondanglegi_KOLEKTIF = 0;


		foreach ($data_TR_GONDANGLEGI as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Gondanglegi_TR += $selisih_tmp->days;
					// echo 'GONDANGLEGI TR '.$total_HPL_Gondanglegi_TR.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Gondanglegi_TR += $selisih_tmp->days;
					// echo 'GONDANGLEGI TR '.$total_HPL_Gondanglegi_TR.'<br/>';
				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[6] = intval(floor($total_HPL_Gondanglegi_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR GONDANGLEGI: " .$HPL_TR[6] ."<br>";


		foreach ($data_TM_GONDANGLEGI as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Gondanglegi_TM += $selisih_tmp->days;
					// echo 'GONDANGLEGI TM '.$total_HPL_Gondanglegi_TM.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Gondanglegi_TM += $selisih_tmp->days;
					// echo 'GONDANGLEGI TM '.$total_HPL_Gondanglegi_TM.'<br/>';
				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[6] = intval(floor($total_HPL_Gondanglegi_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM GONDANGLEGI: " .$HPL_TM[6] ."<br>";

		foreach ($data_KOLEKTIF_GONDANGLEGI as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Gondanglegi_KOLEKTIF += $selisih_tmp->days;
					// echo 'GONDANGLEGI KOLEKTIF '.$total_HPL_Gondanglegi_KOLEKTIF.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Gondanglegi_KOLEKTIF += $selisih_tmp->days;
					// echo 'GONDANGLEGI KOLEKTIF '.$total_HPL_Gondanglegi_KOLEKTIF.'<br/>';
				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[6] = intval(floor($total_HPL_Gondanglegi_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF GONDANGLEGI: " .$HPL_KOLEKTIF[6] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[6] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[6] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[6] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[6] = $total_HPL_Gondanglegi_TR;
		$total_HPL_TM[6] = $total_HPL_Gondanglegi_TM;
		$total_HPL_KOLEKTIF[6] = $total_HPL_Gondanglegi_KOLEKTIF;


		//RAYON DAMPIT
		$total_data_TR_DAMPIT = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN DAMPIT')->row();
		$temp_total_data_TR = $total_data_TR_DAMPIT->TOTAL;	
		$total_data_TM_DAMPIT = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN DAMPIT')->row();
		$temp_total_data_TM = $total_data_TM_DAMPIT->TOTAL;	
		$total_data_KOLEKTIF_DAMPIT = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN DAMPIT')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_DAMPIT->TOTAL;	


		$data_TR_DAMPIT = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN DAMPIT')->result();
		$data_TM_DAMPIT = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN DAMPIT')->result();
		$data_KOLEKTIF_DAMPIT = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN DAMPIT')->result();

		$total_HPL_Dampit_TR = 0; 
		$total_HPL_Dampit_TM = 0; 
		$total_HPL_Dampit_KOLEKTIF = 0;


		foreach ($data_TR_DAMPIT as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Dampit_TR += $selisih_tmp->days;
					// echo 'DAMPIT TR '.$total_HPL_Dampit_TR.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Dampit_TR += $selisih_tmp->days;
					// echo 'DAMPIT TR '.$total_HPL_Dampit_TR.'<br/>';					

				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[7] = intval(floor($total_HPL_Dampit_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR DAMPIT: " .$HPL_TR[7] ."<br>";

		foreach ($data_TM_DAMPIT as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Dampit_TM += $selisih_tmp->days;
					// echo 'DAMPIT TM '.$total_HPL_Dampit_TM.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Dampit_TM += $selisih_tmp->days;
					// echo 'DAMPIT TM '.$total_HPL_Dampit_TM.'<br/>';
				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[7] = intval(floor($total_HPL_Dampit_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM DAMPIT: " .$HPL_TM[7] ."<br>";


		foreach ($data_KOLEKTIF_DAMPIT as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Dampit_KOLEKTIF += $selisih_tmp->days;
					// echo 'DAMPIT KOLEKTIF '.$total_HPL_Dampit_KOLEKTIF.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Dampit_KOLEKTIF += $selisih_tmp->days;
					// echo 'DAMPIT KOLEKTIF '.$total_HPL_Dampit_KOLEKTIF.'<br/>';

				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[7] = intval(floor($total_HPL_Dampit_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF DAMPIT: " .$HPL_KOLEKTIF[7] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[7] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[7] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[7] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[7] = $total_HPL_Dampit_TR;
		$total_HPL_TM[7] = $total_HPL_Dampit_TM;
		$total_HPL_KOLEKTIF[7] = $total_HPL_Dampit_KOLEKTIF;


		//RAYON NGANTANG
		$total_data_TR_NGANTANG = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN NGANTANG')->row();
		$temp_total_data_TR = $total_data_TR_NGANTANG->TOTAL;	
		$total_data_TM_NGANTANG = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN NGANTANG')->row();
		$temp_total_data_TM = $total_data_TM_NGANTANG->TOTAL;	
		$total_data_KOLEKTIF_NGANTANG = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN NGANTANG')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_NGANTANG->TOTAL;	

		$data_TR_NGANTANG = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN NGANTANG')->result();
		$data_TM_NGANTANG = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN NGANTANG')->result();
		$data_KOLEKTIF_NGANTANG = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN NGANTANG')->result();

		$total_HPL_Ngantang_TR = 0; 
		$total_HPL_Ngantang_TM = 0; 
		$total_HPL_Ngantang_KOLEKTIF = 0;


		foreach ($data_TR_NGANTANG as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Ngantang_TR += $selisih_tmp->days;
					// echo 'NGANTANG TR '.$total_HPL_Ngantang_TR.'<br/>';

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Ngantang_TR += $selisih_tmp->days;
					// echo 'NGANTANG TR '.$total_HPL_Ngantang_TR.'<br/>';


				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[8] = intval(floor($total_HPL_Ngantang_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR NGANTANG: " .$HPL_TR[8] ."<br>";


		foreach ($data_TM_NGANTANG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Ngantang_TM += $selisih_tmp->days;
					// echo 'NGANTANG TM '.$total_HPL_Ngantang_TM.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Ngantang_TM += $selisih_tmp->days;
					// echo 'NGANTANG TM '.$total_HPL_Ngantang_TM.'<br/>';



				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[8] = intval(floor($total_HPL_Ngantang_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM NGANTANG: " .$HPL_TM[8] ."<br>";

		foreach ($data_KOLEKTIF_NGANTANG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Ngantang_KOLEKTIF += $selisih_tmp->days;
					// echo 'NGANTANG KOLEKTIF '.$total_HPL_Ngantang_KOLEKTIF.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Ngantang_KOLEKTIF += $selisih_tmp->days;
					// echo 'NGANTANG KOLEKTIF '.$total_HPL_Ngantang_KOLEKTIF.'<br/>';

				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[8] = intval(floor($total_HPL_Ngantang_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF NGANTANG: " .$HPL_KOLEKTIF[8] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[8] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[8] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[8] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[8] = $total_HPL_Ngantang_TR;
		$total_HPL_TM[8] = $total_HPL_Ngantang_TM;
		$total_HPL_KOLEKTIF[8] = $total_HPL_Ngantang_KOLEKTIF;


		//RAYON SUMBER PUCUNG
		$total_data_TR_SUMBERPUCUNG = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN SUMBER PUCUNG')->row();
		$temp_total_data_TR = $total_data_TR_SUMBERPUCUNG->TOTAL;
		$total_data_TM_SUMBERPUCUNG = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN SUMBER PUCUNG')->row();
		$temp_total_data_TM = $total_data_TM_SUMBERPUCUNG->TOTAL;
		$total_data_KOLEKTIF_SUMBERPUCUNG = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN SUMBER PUCUNG')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_SUMBERPUCUNG->TOTAL;


		$data_TR_SUMBERPUCUNG = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN SUMBER PUCUNG')->result();
		$data_TM_SUMBERPUCUNG = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN SUMBER PUCUNG')->result();
		$data_KOLEKTIF_SUMBERPUCUNG = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN SUMBER PUCUNG')->result();


		$total_HPL_Sumberpucung_TR = 0; 
		$total_HPL_Sumberpucung_TM = 0; 
		$total_HPL_Sumberpucung_KOLEKTIF = 0;


		foreach ($data_TR_SUMBERPUCUNG as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Sumberpucung_TR += $selisih_tmp->days;
					// echo 'SUMBER PUCUNG TR '.$total_HPL_Sumberpucung_TR.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Sumberpucung_TR += $selisih_tmp->days;
					// echo 'SUMBER PUCUNG TR '.$total_HPL_Sumberpucung_TR.'<br/>';


				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[9] = intval(floor($total_HPL_Sumberpucung_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR SUMBER PUCUNG: " .$HPL_TR[9] ."<br>";

		
		foreach ($data_TM_SUMBERPUCUNG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Sumberpucung_TM += $selisih_tmp->days;
					// echo 'SUMBER PUCUNG TM '.$total_HPL_Sumberpucung_TM.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Sumberpucung_TM += $selisih_tmp->days;
					// echo 'SUMBER PUCUNG TM '.$total_HPL_Sumberpucung_TM.'<br/>';
				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[9] = intval(floor($total_HPL_Sumberpucung_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM SUMBER PUCUNG: " .$HPL_TM[9] ."<br>";


		foreach ($data_KOLEKTIF_SUMBERPUCUNG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Sumberpucung_KOLEKTIF += $selisih_tmp->days;
					// echo 'SUMBER PUCUNG KOLEKTIF '.$total_HPL_Sumberpucung_KOLEKTIF.'<br/>';


				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Sumberpucung_KOLEKTIF += $selisih_tmp->days;
					// echo 'SUMBER PUCUNG KOLEKTIF '.$total_HPL_Sumberpucung_KOLEKTIF.'<br/>';

				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[9] = intval(floor($total_HPL_Sumberpucung_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF SUMBER PUCUNG: " .$HPL_KOLEKTIF[9] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[9] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[9] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[9] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[9] = $total_HPL_Sumberpucung_TR;
		$total_HPL_TM[9] = $total_HPL_Sumberpucung_TM;
		$total_HPL_KOLEKTIF[9] = $total_HPL_Sumberpucung_KOLEKTIF;


		//RAYON DINOYO
		$total_data_TR_DINOYO = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN DINOYO')->row();
		$temp_total_data_TR = $total_data_TR_DINOYO->TOTAL;	
		$total_data_TM_DINOYO = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN DINOYO')->row();
		$temp_total_data_TM = $total_data_TM_DINOYO->TOTAL;	
		$total_data_KOLEKTIF_DINOYO = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN DINOYO')->row();
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_DINOYO->TOTAL;	

		$data_TR_DINOYO = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN DINOYO')->result();
		$data_TM_DINOYO = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN DINOYO')->result();
		$data_KOLEKTIF_DINOYO = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN DINOYO')->result();

		$total_HPL_Dinoyo_TR = 0; 
		$total_HPL_Dinoyo_TM = 0; 
		$total_HPL_Dinoyo_KOLEKTIF = 0;


		foreach ($data_TR_DINOYO as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Dinoyo_TR += $selisih_tmp->days;
					// echo 'DINOYO TR '.$total_HPL_Dinoyo_TR.'<br/>';
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Dinoyo_TR += $selisih_tmp->days;
					// echo 'DINOYO TR '.$total_HPL_Dinoyo_TR.'<br/>';
				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[10] = intval(floor($total_HPL_Dinoyo_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR Dinoyo : " .$HPL_TR[10] ."<br>";

		foreach ($data_TM_DINOYO as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Dinoyo_TM += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Dinoyo_TM += $selisih_tmp->days;


				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[10] = intval(floor($total_HPL_Dinoyo_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM Dinoyo : " .$HPL_TM[10] ."<br>";

		foreach ($data_KOLEKTIF_DINOYO as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Dinoyo_KOLEKTIF += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Dinoyo_KOLEKTIF += $selisih_tmp->days;
				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[10] = intval(floor($total_HPL_Dinoyo_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF Dinoyo : " .$HPL_KOLEKTIF[10] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[10] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[10] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[10] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[10] = $total_HPL_Dinoyo_TR;
		$total_HPL_TM[10] = $total_HPL_Dinoyo_TM;
		$total_HPL_KOLEKTIF[10] = $total_HPL_Dinoyo_KOLEKTIF;


		//RAYON BLIMBING
		$total_data_TR_BLIMBING = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN BLIMBING')->row();
		$total_data_TM_BLIMBING = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN BLIMBING')->row();
		$total_data_KOLEKTIF_BLIMBING = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN BLIMBING')->row();

		$temp_total_data_TR = $total_data_TR_BLIMBING->TOTAL;
		$temp_total_data_TM = $total_data_TM_BLIMBING->TOTAL;
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_BLIMBING->TOTAL;

		$data_TR_BLIMBING = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN BLIMBING')->result();
		$data_TM_BLIMBING = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN BLIMBING')->result();
		$data_KOLEKTIF_BLIMBING = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN BLIMBING')->result();

		$total_HPL_Blimbing_TR = 0; 
		$total_HPL_Blimbing_TM = 0; 
		$total_HPL_Blimbing_KOLEKTIF = 0;


		foreach ($data_TR_BLIMBING as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Blimbing_TR += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Blimbing_TR += $selisih_tmp->days;

				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[11] = intval(floor($total_HPL_Blimbing_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR BLIMBING : " .$HPL_TR[11] ."<br>";

		foreach ($data_TM_BLIMBING as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Blimbing_TM += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Blimbing_TM += $selisih_tmp->days;


				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[11] = intval(floor($total_HPL_Blimbing_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM BLIMBING : " .$HPL_TM[11] ."<br>";

		foreach ($data_KOLEKTIF_BLIMBING as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Blimbing_KOLEKTIF += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Blimbing_KOLEKTIF += $selisih_tmp->days;
				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[11] = intval(floor($total_HPL_Blimbing_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF BLIMBING : " .$HPL_KOLEKTIF[11] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[11] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[11] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[11] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[11] = $total_HPL_Blimbing_TR;
		$total_HPL_TM[11] = $total_HPL_Blimbing_TM;
		$total_HPL_KOLEKTIF[11] = $total_HPL_Blimbing_KOLEKTIF;


		//RAYON MALANG KOTA
		$total_data_TR_MALANGKOTA = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN MALANG KOTA')->row();
		$total_data_TM_MALANGKOTA = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN MALANG KOTA')->row();
		$total_data_KOLEKTIF_MALANGKOTA = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN MALANG KOTA')->row();

		$temp_total_data_TR = $total_data_TR_MALANGKOTA->TOTAL;
		$temp_total_data_TM = $total_data_TM_MALANGKOTA->TOTAL;
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_MALANGKOTA->TOTAL;

		$data_TR_MALANGKOTA = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN MALANG KOTA')->result();
		$data_TM_MALANGKOTA = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN MALANG KOTA')->result();
		$data_KOLEKTIF_MALANGKOTA = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN MALANG KOTA')->result();

		$total_HPL_Malangkota_TR = 0; 
		$total_HPL_Malangkota_TM = 0; 
		$total_HPL_Malangkota_KOLEKTIF = 0;


		foreach ($data_TR_MALANGKOTA as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Malangkota_TR += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Malangkota_TR += $selisih_tmp->days;

				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[12] = intval(floor($total_HPL_Malangkota_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR MALANG KOTA: " .$HPL_TR[12] ."<br>";

		foreach ($data_TM_MALANGKOTA as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Malangkota_TM += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Malangkota_TM += $selisih_tmp->days;


				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[12] = intval(floor($total_HPL_Malangkota_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM MALANG KOTA: " .$HPL_TM[12] ."<br>";

		foreach ($data_KOLEKTIF_MALANGKOTA as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Malangkota_KOLEKTIF += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Malangkota_KOLEKTIF += $selisih_tmp->days;
				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[12] = intval(floor($total_HPL_Malangkota_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF MALANG KOTA: " .$HPL_KOLEKTIF[12] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[12] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[12] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[12] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[12] = $total_HPL_Malangkota_TR;
		$total_HPL_TM[12] = $total_HPL_Malangkota_TM;
		$total_HPL_KOLEKTIF[12] = $total_HPL_Malangkota_KOLEKTIF;


		//RAYON KEBON AGUNG
		$total_data_TR_KEBONAGUNG = $this->m_pelanggantr->get_total_data_by_rayon_TR('RYN KEBON AGUNG')->row();
		$total_data_TM_KEBONAGUNG = $this->m_pelanggantm->get_total_data_by_rayon_TM('RYN KEBON AGUNG')->row();
		$total_data_KOLEKTIF_KEBONAGUNG = $this->m_kolektif->get_total_data_by_rayon_KOLEKTIF('RYN KEBON AGUNG')->row();

		$temp_total_data_TR = $total_data_TR_KEBONAGUNG->TOTAL;
		$temp_total_data_TM = $total_data_TM_KEBONAGUNG->TOTAL;
		$temp_total_data_KOLEKTIF = $total_data_KOLEKTIF_KEBONAGUNG->TOTAL;

		$data_TR_KEBONAGUNG = $this->m_pelanggantr->get_detail_data_by_rayon_TR('RYN KEBON AGUNG')->result();
		$data_TM_KEBONAGUNG = $this->m_pelanggantm->get_detail_data_by_rayon_TM('RYN KEBON AGUNG')->result();
		$data_KOLEKTIF_KEBONAGUNG = $this->m_kolektif->get_detail_data_by_rayon_KOLEKTIF('RYN KEBON AGUNG')->result();

		$total_HPL_Kebonagung_TR = 0; 
		$total_HPL_Kebonagung_TM = 0; 
		$total_HPL_Kebonagung_KOLEKTIF = 0;


		foreach ($data_TR_KEBONAGUNG as $key ) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Kebonagung_TR += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Kebonagung_TR += $selisih_tmp->days;

				}
			}
		}
		if ($temp_total_data_TR != 0) {
			$HPL_TR[13] = intval(floor($total_HPL_Kebonagung_TR/$temp_total_data_TR));
		}
		// echo "HPL FIX TR KEBON AGUNG: " .$HPL_TR[13] ."<br>";

		foreach ($data_TM_KEBONAGUNG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Kebonagung_TM += $selisih_tmp->days;

				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$tanggal_pdl = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $tanggal_pdl->diff($tanggal_bayar_tmp);
					$total_HPL_Kebonagung_TM += $selisih_tmp->days;


				}
			}
		}
		if ($temp_total_data_TM != 0) {
			$HPL_TM[13] = intval(floor($total_HPL_Kebonagung_TM/$temp_total_data_TM));
		}
		// echo "HPL FIX TM KEBON AGUNG: " .$HPL_TM[13] ."<br>";

		foreach ($data_KOLEKTIF_KEBONAGUNG as $key) {
			if ($key->TGL_PDL == "") {
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime();
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Kebonagung_KOLEKTIF += $selisih_tmp->days;
					// echo "Kebonagung1 ".$total_HPL_Kebonagung_KOLEKTIF ."<br>";
				}
			}else{
				if ($key->TGL_BAYAR != "") {
					$sekarang = new DateTime($key->TGL_PDL);
					$tanggal_bayar_tmp = new DateTime($key->TGL_BAYAR);
					$selisih_tmp = $sekarang->diff($tanggal_bayar_tmp);
					$total_HPL_Kebonagung_KOLEKTIF += $selisih_tmp->days;
					// echo "Kebonagung ".$total_HPL_Kebonagung_KOLEKTIF ."<br>";
				}
			}
		}
		if ($temp_total_data_KOLEKTIF != 0) {
			$HPL_KOLEKTIF[13] = intval(floor($total_HPL_Kebonagung_KOLEKTIF/$temp_total_data_KOLEKTIF));
		}
		// echo "HPL FIX KOLEKTIF KEBON AGUNG: " .$HPL_KOLEKTIF[13] ."<br>";
		$jumlah_data_pelanggan_bayar_TR[13] = $temp_total_data_TR;
		$jumlah_data_pelanggan_bayar_TM[13] = $temp_total_data_TM;
		$jumlah_data_pelanggan_bayar_KOLEKTIF[13] = $temp_total_data_KOLEKTIF;
		$total_HPL_TR[13] = $total_HPL_Kebonagung_TR;
		$total_HPL_TM[13] = $total_HPL_Kebonagung_TM;
		$total_HPL_KOLEKTIF[13] = $total_HPL_Kebonagung_KOLEKTIF;


		$data['HPL_TR'] = $HPL_TR;
		$data['HPL_TM'] = $HPL_TM;
		$data['HPL_KOLEKTIF'] = $HPL_KOLEKTIF;
		$data['jumlah_data_pelanggan_bayar_TR'] = $jumlah_data_pelanggan_bayar_TR;
		$data['jumlah_data_pelanggan_bayar_TM'] = $jumlah_data_pelanggan_bayar_TM;
		$data['jumlah_data_pelanggan_bayar_KOLEKTIF'] = $jumlah_data_pelanggan_bayar_KOLEKTIF;
		$data['total_HPL_TR'] = $total_HPL_TR;
		$data['total_HPL_TM'] = $total_HPL_TM;
		$data['total_HPL_KOLEKTIF'] = $total_HPL_KOLEKTIF;
		$nama_rayon = array();
		$nama_rayon[0] = "RYN LAWANG";
		$nama_rayon[1] = "RYN BULULAWANG";
		$nama_rayon[2] = "RYN BATU";
		$nama_rayon[3] = "RYN SINGOSARI";
		$nama_rayon[4] = "RYN KEPANJEN";
		$nama_rayon[5] = "RYN TUMPANG";
		$nama_rayon[6] = "RYN GONDANGLEGI";
		$nama_rayon[7] = "RYN DAMPIT";
		$nama_rayon[8] = "RYN NGANTANG";
		$nama_rayon[9] = "RYN SUMBER PUCUNG";
		$nama_rayon[10] = "RYN DINOYO";
		$nama_rayon[11] = "RYN BLIMBING";
		$nama_rayon[12] = "RYN MALANG KOTA";
		$nama_rayon[13] = "RYN KEBON AGUNG";
		$data['nama_rayon'] = $nama_rayon;
		// $data['nama_rayon'] = array("RYN LAWANG", "RYN BULULAWANG", "RYN BATU", "RYN SINGOSARI", "RYN KEPANJEN", "RYN TUMPANG", "RYN GONDANGLEGI", "RYN DAMPIT", "RYN NGANTANG", "RYN SUMBER PUCUNG", "RYN DINOYO","RYN BLIMBING", "RYN MALANG KOTA", "RYN KEBON AGUNG");

		$this->load->view('export_HPL', $data);
	}
}
?>