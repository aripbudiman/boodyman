<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

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
        $data['title'] = 'View Data Barang | Sistem Inventory';
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang ORDER BY kd_barang asc");
        $data['content'] = 'sales/barang_v';
        $this->load->view('layouts/main_v',$data);
    }
	
}
