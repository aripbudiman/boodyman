<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->library(array('form_validation'));
        date_default_timezone_set('Asia/Jakarta');
		if($this->session->userdata('username')==""){
            redirect('Log');
        }
	}

	public function index()
	{
		$data['title'] = 'Sistem Inventory';
		$barang = $this->db->query("SELECT COUNT(*) as barang FROM tb_barang");
		foreach($barang->result() as $brg){
			$bar = $brg->barang;
		}
		$supplier = $this->db->query("SELECT COUNT(*) as supplier FROM tb_supplier");
		foreach($supplier->result() as $sup){
			$supp = $sup->supplier;
		}
		$sales = $this->db->query("SELECT COUNT(*) as sales FROM tb_sales");
		foreach($sales->result() as $sal){
			$sale = $sal->sales;
		}

		$data['barang'] = $bar;
		$data['supplier'] = $supp;
		$data['sales'] = $sale;
		$data['content'] = 'dashboard';
		$this->load->view('layouts/main_v',$data);
	}

	public function error()
	{
		$this->load->view('index.html');
	}

	//Controller  Barang
	public function barang()
	{
		$data['title'] = 'Data Barang | Sistem Inventory';
		$data['barang'] = $this->db->query("SELECT * FROM tb_barang ORDER BY kd_barang");
		//$data['count_barang'] = $this->db->query("SELECT * FROM tb_barang ORDER BY kd_barang DESC LIMIT 1");
		$data['content'] = 'gudang/barang/barang_v';
		$this->load->view('layouts/main_v',$data);
	}

	//Edit & Tambah Barang
	public function inc_barang()
	{
		if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('kd_txt', 'Kode', 'trim|required');
            $this->form_validation->set_rules('nm_txt', 'Nama', 'trim|required');
            $this->form_validation->set_rules('merk_txt', 'Merk', 'trim|required');
            $this->form_validation->set_rules('harga_txt', 'Harga', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Isi Data dengan Lengkap !
                        </div>");
                header('location:'.base_url().'Gudang/barang');
            }else{
            	$act = $this->input->post('act');
            	$kd = $this->input->post('kd_txt');
            	$nm = $this->input->post('nm_txt');
            	$wrn = $this->input->post('merk_txt');
            	$hrg = $this->input->post('harga_txt');

            	if($act=='edit'){
            		$edit = $this->db->query("UPDATE tb_barang SET nama_barang='$nm', merk='$wrn', harga='$hrg' WHERE kd_barang='$kd' ");
            		if($edit){
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-success fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Success !</strong> Berhasil Mengubah Data Barang !
	                        </div>");
	            	}else{
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Failed !</strong> Terjadi Kesalahan mengubah data Barang!
	                        </div>");
	            	}
                	header('location:'.base_url().'Gudang/barang');
            	}else{
            		$add = $this->db->query("INSERT INTO tb_barang (kd_barang,nama_barang,merk,harga) VALUES ('$kd','$nm','$wrn','$hrg') ");
            		if($add){
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-success fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Success !</strong> Berhasil Menambah Data Barang !
	                        </div>");
	            	}else{
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Failed !</strong> Terjadi Kesalahan menambah data Barang!
	                        </div>");
	            	}
                	header('location:'.base_url().'Gudang/barang');
            	}
            }
        }else{
        	$this->error();
        }
	}

	//Hapus Barang
	public function hapus_barang($kd)
	{
		if (isset($kd) && !empty($kd)) {
			$hapus = $this->db->query("DELETE FROM tb_barang WHERE kd_barang='$kd' ");
			if($hapus){
				$this->session->set_flashdata("msg","<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Success !</strong> Berhasi mengahapus data Barang!
				</div>");
			}else{
				$this->session->set_flashdata("msg","<div class='alert alert-danger fade in'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Failed !</strong> Terjadi Kesalahan penghapusan data Barang!
				</div>");
			}
			
			header('location:'.base_url().'Gudang/barang');
		}else $this->error();
	}

	//Controller Supplier
	public function supplier()
	{
		$data['title'] = 'Data Supplier | Sistem Inventory';
		$data['supplier'] = $this->db->query("SELECT * FROM tb_supplier ORDER BY kd_supplier");
		$data['content'] = 'gudang/supplier/supplier_v';
		$this->load->view('layouts/main_v',$data);
	}

	public function inc_supplier()
	{
		if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('kd_txt', 'Kode', 'trim|required');
            $this->form_validation->set_rules('nm_txt', 'Nama', 'trim|required');
            $this->form_validation->set_rules('telp_txt', 'Telp', 'trim|required');
            $this->form_validation->set_rules('alamat_txt', 'Alamat', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Isi Data dengan Lengkap !
                        </div>");
                header('location:'.base_url().'Gudang/supplier');
            }else{
            	$act = $this->input->post('act');
            	$kd = $this->input->post('kd_txt');
            	$nm = $this->input->post('nm_txt');
            	$tlp = $this->input->post('telp_txt');
            	$almt = $this->input->post('alamat_txt');

            	if($act=='edit'){
            		$edit = $this->db->query("UPDATE tb_supplier SET nama_supplier='$nm', no_telp='$tlp', alamat='$almt' WHERE kd_supplier='$kd' ");
            		if($edit){
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-success fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Success !</strong> Berhasil Mengubah Data Supplier !
	                        </div>");
	            	}else{
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Failed !</strong> Terjadi Kesalahan mengubah data Supplier!
	                        </div>");
	            	}
                	header('location:'.base_url().'Gudang/supplier');
            	}else{
            		$add = $this->db->query("INSERT INTO tb_supplier VALUES ('$kd','$nm','$tlp','$almt') ");
            		if($add){
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-success fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Success !</strong> Berhasil Menambah Data Supplier !
	                        </div>");
	            	}else{
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Failed !</strong> Terjadi Kesalahan menambah data Supplier!
	                        </div>");
	            	}
                	header('location:'.base_url().'Gudang/supplier');
            	}
            }
        }else{
        	$this->error();
        }
	}

	public function hapus_supplier($kd)
	{
		if (isset($kd) && !empty($kd)) {
			$hapus = $this->db->query("DELETE FROM tb_supplier WHERE kd_supplier='$kd' ");
			if($hapus){
				$this->session->set_flashdata("msg","<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Success !</strong> Berhasi mengahapus data Suppplier!
				</div>");
			}else{
				$this->session->set_flashdata("msg","<div class='alert alert-danger fade in'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Failed !</strong> Terjadi Kesalahan penghapusan data Supplier!
				</div>");
			}
			
			header('location:'.base_url().'Gudang/supplier');
		}else $this->error();
	}

	//Controller  Sales
	public function sales()
	{
		$data['title'] = 'Data Sales | Sistem Inventory';
		$data['sales'] = $this->db->query("SELECT * FROM tb_sales ORDER BY kd_sales");
		$data['content'] = 'gudang/sales/sales_v';
		$this->load->view('layouts/main_v',$data);
	}

	//Controller Save & Update Sales
	public function inc_sales()
	{
		if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('kd_txt', 'Kode', 'trim|required');
            $this->form_validation->set_rules('nm_txt', 'Nama', 'trim|required');
            $this->form_validation->set_rules('telp_txt', 'Telp', 'trim|required');
            $this->form_validation->set_rules('email_txt', 'Alamat', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Isi Data dengan Lengkap !
                        </div>");
                header('location:'.base_url().'Gudang/sales');
            }else{
            	$act = $this->input->post('act');
            	$kd = $this->input->post('kd_txt');
            	$nm = $this->input->post('nm_txt');
            	$tlp = $this->input->post('telp_txt');
            	$imel = $this->input->post('email_txt');
            	$kode = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            	$generate = rand($kode,6);
            	$pw = md5($generate);

            	if($act=='edit'){
            		$edit = $this->db->query("UPDATE tb_sales SET nama_sales='$nm', no_telp='$tlp', email='$imel' WHERE kd_sales='$kd' ");
            		if($edit){
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-success fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Success !</strong> Berhasil Mengubah Data Sales !
	                        </div>");
	            	}else{
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Failed !</strong> Terjadi Kesalahan mengubah data Sales !
	                        </div>");
	            	}
                	header('location:'.base_url().'Gudang/sales');
            	}else{
            		$add = $this->db->query("INSERT INTO tb_sales (kd_sales,nama_sales,no_telp,email,password,keypass,foto) VALUES ('$kd','$nm','$tlp','$imel','$pw','$generate',NULL) ");
            		if($add){
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-success fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Success !</strong> Berhasil Menambah Data Sales !
	                        </div>");
	            	}else{
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Failed !</strong> Terjadi Kesalahan menambah data Sales !
	                        </div>");
	            	}
                	header('location:'.base_url().'Gudang/sales');
            	}
            }
        }else{
        	$this->error();
        }
	}

	//Controller Hapus Sales
	public function hapus_sales($kd)
	{
		if (isset($kd) && !empty($kd)) {
			$hapus = $this->db->query("DELETE FROM tb_sales WHERE kd_sales='$kd' ");
			if($hapus){
				$this->session->set_flashdata("msg","<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Success !</strong> Berhasi mengahapus data Sales!
				</div>");
			}else{
				$this->session->set_flashdata("msg","<div class='alert alert-danger fade in'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Failed !</strong> Terjadi Kesalahan penghapusan data Sales!
				</div>");
			}
			
			header('location:'.base_url().'Gudang/sales');
		}else $this->error();
	}

	public function manage_user()
	{
		$data['title'] = 'Data Pengguna | Sistem Inventory';
		$data['pengguna'] = $this->db->query("SELECT * FROM users");
		//$data['count_barang'] = $this->db->query("SELECT * FROM tb_barang ORDER BY kd_barang DESC LIMIT 1");
		$data['content'] = 'user/user_v';
		$this->load->view('layouts/main_v',$data);
	}

	public function inc_pengguna()
	{
		if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('usr_txt', 'Username', 'trim|required');
            $this->form_validation->set_rules('nm_txt', 'Nama', 'trim|required');
            $this->form_validation->set_rules('pw_txt', 'Password', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Isi Data dengan Lengkap !
                        </div>");
                header('location:'.base_url().'Gudang/manage_user');
            }else{
            	$act = $this->input->post('act');
            	$usr = $this->input->post('usr_txt');
            	$nm = $this->input->post('nm_txt');
            	$pw = $this->input->post('pw_txt');
            	$status = $this->input->post('status');

            	if($act=='edit'){
            		$edit = $this->db->query("UPDATE users SET nama='$nm', password=md5('$pw'), level='$status' WHERE username='$usr' ");
            		if($edit){
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-success fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Success !</strong> Berhasil Mengubah Data Pengguna !
	                        </div>");
	            	}else{
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Failed !</strong> Terjadi Kesalahan mengubah data Pengguna!
	                        </div>");
	            	}
                	header('location:'.base_url().'Gudang/manage_user');
            	}else{
            		$add = $this->db->query("INSERT INTO users (username,nama,password,level) VALUES ('$usr','$nm',md5('$pw'),'$status') ");
            		if($add){
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-success fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Success !</strong> Berhasil Menambah Data Pengguna !
	                        </div>");
	            	}else{
	            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Failed !</strong> Terjadi Kesalahan menambah data Pengguna!
	                        </div>");
	            	}
                	header('location:'.base_url().'Gudang/manage_user');
            	}
            }
        }else{
        	$this->error();
        }
	}

	//Hapus Barang
	public function hapus_pengguna($kd)
	{
		if (isset($kd) && !empty($kd)) {
			$hapus = $this->db->query("DELETE FROM users WHERE username='$kd' ");
			if($hapus){
				$this->session->set_flashdata("msg","<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Success !</strong> Berhasi mengahapus data Pengguna!
				</div>");
			}else{
				$this->session->set_flashdata("msg","<div class='alert alert-danger fade in'>
					<a href='#' class='close' data-dismiss='alert'>&times;</a>
					<strong>Failed !</strong> Terjadi Kesalahan penghapusan data Penguna!
				</div>");
			}
			
			header('location:'.base_url().'Gudang/manage_user');
		}else $this->error();
	}

}
