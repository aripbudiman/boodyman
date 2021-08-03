<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->library(array('form_validation'));
        date_default_timezone_set('Asia/Jakarta');
        if($this->session->userdata('username')==""){
            redirect('Log');
        }
	}

	public function error()
	{
		$this->load->view('index.html');
	}

	//Controller  Barang Masuk
	public function masuk()
	{
		$data['title'] = 'Barang Masuk | Sistem Inventory';
		$query = $this->db->query("SELECT no_barangmasuk FROM barang_masuk ORDER BY no_barangmasuk DESC limit 1");
    	$jml = $query->num_rows();
    	foreach($query->result() as $r){
    		$nobarangmasuk = $r->no_barangmasuk;
    	}

    	if($jml <> 0){
            $kode = intval($nobarangmasuk) + 1;
        }else{
            $kode = 1;
        }

        $data['kode'] = str_pad($kode, 6, "0", STR_PAD_LEFT);

		$data['supplier'] = $this->db->query("SELECT * FROM tb_supplier ORDER BY kd_supplier asc");
		$data['barang'] = $this->db->query("SELECT * FROM tb_barang ORDER BY kd_barang asc");
		$data['masuk'] = $this->db->query("SELECT * FROM barang_masuk ORDER BY no_barangmasuk desc");
		$data['content'] = 'gudang/barang_masuk/masuk_v';
		$this->load->view('layouts/main_v',$data);
	}

	//Controller Barang Masuk Add
	public function inc_barangmasuk()
	{
		if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('nomor_txt', 'Nomor Barang Masuk', 'trim|required');
            $this->form_validation->set_rules('tgl_txt', 'Tanggal Barang Masuk', 'trim|required');
            $this->form_validation->set_rules('kdbarang_txt', 'Kode Barang', 'trim|required');
            $this->form_validation->set_rules('jumlah_txt', 'Jumlah', 'trim|required');
            $this->form_validation->set_rules('stok_txt', 'Stok', 'trim|required');
            $this->form_validation->set_rules('kdpelanggan_txt', 'Kode Supplier', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Isi Data dengan Lengkap !
                        </div>");
                header('location:'.base_url().'Transaksi/masuk');
            }else{
            	$nomor = $this->input->post('nomor_txt');
            	$tgl = $this->input->post('tgl_txt');
            	$kdbarang = $this->input->post('kdbarang_txt');
            	$jumlah = $this->input->post('jumlah_txt');
            	$stok = $this->input->post('stok_txt');
            	$kdpelanggan = $this->input->post('kdpelanggan_txt');

            	//Proses Insert
        		$query1 = $this->db->query("INSERT INTO tb_barangmasuk VALUES ('$nomor','$tgl','$kdbarang','$jumlah','$kdpelanggan','0') ");

        		if($query1){
            		$this->session->set_flashdata("msg","
                        <div class='alert alert-success fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Success !</strong> Berhasil Melakukan Transaksi Barang Masuk !
                        </div>");
            	}else{
            		$this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Failed !</strong> Terjadi Kesalahan Transaksi Barang Masuk !
                        </div>");
            	}
            	header('location:'.base_url().'Transaksi/masuk');
            }
        }else{
        	$this->error();
        }
	}

    //Controller Barang Keluar
    public function keluar()
    {
        $data['title'] = 'Barang Keluar | Sistem Inventory';
        $query = $this->db->query("SELECT no_barangkeluar FROM barang_keluar ORDER BY no_barangkeluar DESC limit 1");
        $jml = $query->num_rows();
        foreach($query->result() as $r){
            $nobarangkeluar = $r->no_barangkeluar;
        }

        if($jml <> 0){
            $kode = intval($nobarangkeluar) + 1;
        }else{
            $kode = 1;
        }

        $data['kode'] = str_pad($kode, 6, "0", STR_PAD_LEFT);

        $data['sales'] = $this->db->query("SELECT * FROM tb_sales ORDER BY kd_sales asc");
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang ORDER BY kd_barang asc");
        $data['keluar'] = $this->db->query("SELECT * FROM barang_keluar ORDER BY no_barangkeluar desc");
        $data['content'] = 'gudang/barang_keluar/keluar_v';
        $this->load->view('layouts/main_v',$data);
    }

    //Controller Barang Keluar Add
    public function inc_barangkeluar()
    {
        if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('nomor_txt', 'Nomor Barang Keluar', 'trim|required');
            $this->form_validation->set_rules('tgl_txt', 'Tanggal Barang Keluar', 'trim|required');
            $this->form_validation->set_rules('kdbarang_txt', 'Kode Barang', 'trim|required');
            $this->form_validation->set_rules('jumlah_txt', 'Jumlah', 'trim|required');
            $this->form_validation->set_rules('stok_txt', 'Stok', 'trim|required');
            $this->form_validation->set_rules('kdsales_txt', 'Kode Sales', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Isi Data dengan Lengkap !
                        </div>");
                header('location:'.base_url().'Transaksi/keluar');
            }else{
                $nomor = $this->input->post('nomor_txt');
                $tgl = $this->input->post('tgl_txt');
                $kdbarang = $this->input->post('kdbarang_txt');
                $jumlah = $this->input->post('jumlah_txt');
                $stok = $this->input->post('stok_txt');
                $kdsales = $this->input->post('kdsales_txt');

                //Proses Insert
                $query1 = $this->db->query("INSERT INTO tb_barangkeluar VALUES ('$nomor','$tgl','$kdbarang','$jumlah','$kdsales','0') ");

                if($query1){
                    $this->session->set_flashdata("msg","
                        <div class='alert alert-success fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Success !</strong> Berhasil Melakukan Transaksi Barang Keluar !
                        </div>");
                }else{
                    $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Failed !</strong> Terjadi Kesalahan Transaksi Barang Keluar !
                        </div>");
                }
                header('location:'.base_url().'Transaksi/keluar');
            }
        }else{
            $this->error();
        }
    }

	
}
