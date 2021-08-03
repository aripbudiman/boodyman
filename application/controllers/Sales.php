<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->library(array('form_validation'));
	}

	public function index()
	{
		$data['title'] = 'Login Sales | Sistem Inventory';
		$this->load->view('login_sales',$data);
	}

	public function auth()
	{
		if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('user', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Username dan Password Harus Diisi !
                        </div>");
                header('location:'.base_url().'Log');
            }else{
            	$usr = $this->input->post('user');
            	$pw = $this->input->post('password');
            	$pww = md5($pw);

            	$q_cek_login = $this->db->get_where('tb_sales', array('email' => $usr));
				if(count($q_cek_login->result())>0)
				{
					foreach($q_cek_login->result() as $qck)
					{
						$pass=$qck->password;
						$level = 'Sales';
						if($qck->email==$usr && $pass==$pww)
						{

							if ($level=='Sales') {
								$qcek = $this->db->get_where('tb_sales', array('email' => $usr ));
								foreach ($qcek->result() as $sess) {
									$sess_data['logged_in'] = 'gudang ok';
									$sess_data['username'] = $sess->email;
									$sess_data['nama'] = $sess->nama_sales;
									$sess_data['level'] = $level;
									$this->session->set_userdata($sess_data);
								}
								header('location:'.site_url('Dashboard'));
							}
							else
							{
								$this->session->set_flashdata("msg","
									<div class='alert alert-warning fade in'>
										<a href='#' class='close' data-dismiss='alert'>&times;</a>
										<strong>Failed!</strong> Username atau Password Salah !
									</div>");
								header('location:'.site_url('Log'));
							}
		                }else
						{
							$this->session->set_flashdata("msg","
									<div class='alert alert-warning fade in'>
										<a href='#' class='close' data-dismiss='alert'>&times;</a>
										<strong>Failed!</strong> Username atau Password Salah !
									</div>");
							header('location:'.base_url('Log'));
						}
					}
				}	
				else
				{
					$this->session->set_flashdata("msg","
							<div class='alert alert-warning fade in'>
								<a href='#' class='close' data-dismiss='alert'>&times;</a>
								<strong>Failed!</strong> Username yang anda gunakan salah !
							</div>");
					header('location:'.base_url().'Log');
				}
            }
        }else{
        	$this->error();
        }
	}
}