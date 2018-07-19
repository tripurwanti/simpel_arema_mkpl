<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Filter extends CI_Controller
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
        	$this->load->model('m_pelanggantr');
        	$data['title']="Filter Pelanggan";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="";
			$data['side4']="active ";
			
        	$this->template->display('filter/index',$data);
        }
		
		public function datafilter()
        {	
        	$this->load->library('form_validation'); //load library form_validation
            $this->form_validation->set_rules('jenis_monitoring', 'Filter By', 'required');
			$this->form_validation->set_rules('rayon', 'Rayon', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('ket', 'Keterangan', 'required');
			
			if ( $this->form_validation->run() == TRUE ) {
			$data['jenis']=$this->input->post('jenis_monitoring');
			$data['rayon']=$this->input->post('rayon');
			$data['status']=$this->input->post('status');
			$data['ket']=$this->input->post('ket');
			$this->load->model('m_filter');
			$data['hasil']=$this->m_filter->showfilter($data);
			$data['title']="Filter Pelanggan";
			$data['side1']="";
			$data['side2']="";
			$data['side3']="";
			$data['side4']="";
			$data['side5']="";
			$data['side6']="";
			$data['side7']="active";
			
				if($data['jenis']=="pelTR")
				{
					$this->template->display('filter/pelanggantr',$data);
				}
				elseif($data['jenis']=="kolektif")
				{
					$this->template->display('filter/kolektif',$data);
				}
				elseif($data['jenis']=="pelTM")
				{
					$this->template->display('filter/pelanggantm',$data);
				}
			
			}
			else
			{
				$_SESSION['log']="<div class='alert alert-warning alert-dismissable'>
					  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					  Field filter tidak boleh ada yang kosong</b>
					  </div>";
				redirect('filter');
			}
        }
		
		public function exporttoexcel()
		{
			$data['jenis']=$this->input->post('jenis_monitoring');
			$data['rayon']=$this->input->post('rayon');
			$data['status']=$this->input->post('status');
			$data['ket']=$this->input->post('ket');
			$this->load->model('m_filter');
			$data['hasil']=$this->m_filter->showfilter($data);
        	
			if($data['jenis']=="pelTR")
			{
				$this->load->view('pelanggan_tr/export',$data);
			}
			elseif($data['jenis']=="kolektif")
			{
				$this->load->view('kolektif/export',$data);
			}
			elseif($data['jenis']=="pelTM")
			{
				$this->load->view('pelanggan_tm/export',$data);
			}
		}
	}