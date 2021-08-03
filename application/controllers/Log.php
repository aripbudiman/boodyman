<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->library(array('form_validation'));
	}

	public function index()
	{
		$data['title'] = 'Login | Sistem Inventory';
		$this->load->view('login',$data);
	}

	public function error()
	{
		$this->load->view('index.html');
	}

	public function verifikasi()
	{
		$data['title'] = 'Verifikasi Akun Sales | Sistem Inventory';
		$this->load->view('verifikasi',$data);
	}

	public function send_email()
	{
		if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Email harus Diisi !
                        </div>");
                header('location:'.base_url().'verifikasi');
            }else{
            	$mail = $this->input->post('email');
            	$cek_mail = $this->db->query("SELECT * FROM tb_sales WHERE email='$mail' ");

            	if($cek_mail->num_rows()==0){
            		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Gagal !</strong> Email Belum Terdaftar !
	                        </div>");
	                header('location:'.base_url().'verifikasi');
            	}

            	//Ambil Data
            	foreach($cek_mail->result() as $ck){
            			$e_mail = $ck->email;
        		}
        		//Kondisi Cek Sama atau tidak email
        		if($e_mail<>$mail){ 
	        		$this->session->set_flashdata("msg","
	                        <div class='alert alert-warning fade in'>
	                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
	                            <strong>Gagal !</strong> Email Belum Terdaftar !
	                        </div>");
	                header('location:'.base_url().'verifikasi');
        		}else{ 
        			//Kirim Ke Email
        			
        			/*$gue = $this->db->query("SELECT * FROM tb_sales WHERE email='$mail' ");
        			foreach($gue->result() as $gw){
        				$kode = $gw->keypass;
        			}*/

        			$kode = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	            	$generate = rand($kode,6);
	            	$pw = md5($generate);
	            	$UP = $this->db->query("UPDATE tb_sales SET password='$pw',keypass='$generate' WHERE email='$mail' ");

                    $config['protocol']    = 'smtp';
                    $config['smtp_host']    = 'ssl://smtp.gmail.com';
                    $config['smtp_port']    = '465';
                    $config['smtp_timeout'] = '15';
                    $config['smtp_user']    = 'inventorysistem@gmail.com';
                    $config['smtp_pass']    = 'cahyani123';
                    $config['charset']    = 'utf-8';
                    $config['newline']    = "\r\n";
                    $config['mailtype'] = 'html'; // or html
                    $config['validation'] = TRUE;

                    $this->email->initialize($config);
                    $this->email->from('panitia.spmb.teknokrat@gmail.com', 'Reset Akun');
                    $this->email->to($mail);

                    $this->email->subject('Reset Akun Sales');
                    //Isi pesan email
                    $this->email->message('Salin Nomor Verifikasi Berikut = <b>'.$generate.'</b>');

                    if(($this->email->send())&&$UP){
                		$this->session->set_flashdata("msg","<div class='alert alert-success fade in'>
            					<a href='#' class='close' data-dismiss='alert'>&times;</a>
            					<strong>Success !</strong> Silahkan Login untuk masuk kedalam sistem!
            				</div>");
                		header('location:'.base_url().'Sales');
                    }else{
                		$this->session->set_flashdata("msg","<div class='alert alert-danger fade in'>
            					<a href='#' class='close' data-dismiss='alert'>&times;</a>
            					<strong>Failed !</strong> Cek Koneksi Internet Anda!
            				</div>");
                		header('location:'.base_url().'verifikasi');
                    }
                    
        		}
            }
        }else{
        	$this->error();
        }
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

            	$q_cek_login = $this->db->get_where('users', array('username' => $usr));
            	$q_cek_sales = $this->db->get_where('tb_sales', array('email' => $usr));
				if(count($q_cek_login->result())>0)
				{
					foreach($q_cek_login->result() as $qck)
					{
						$pass=$qck->password;
						if($qck->username==$usr && $pass==$pww)
						{

							if ($qck->level=='Gudang') {
								$qcek = $this->db->get_where('users', array('username' => $usr ));
								foreach ($qcek->result() as $sess) {
									$sess_data['logged_in'] = 'gudang ok';
									$sess_data['username'] = $sess->username;
									$sess_data['nama'] = $sess->nama;
									$sess_data['level'] = $sess->level;
									$this->session->set_userdata($sess_data);
								}
								header('location:'.site_url('Dashboard'));
							}
							else if($qck->level=='Pimpinan') {
								$qcek = $this->db->get_where('users', array('username' => $usr ));
								foreach ($qcek->result() as $sess) {
									$sess_data['logged_in'] = 'pimpinan ok';
									$sess_data['username'] = $sess->username;
									$sess_data['nama'] = $sess->nama;
									$sess_data['level'] = $sess->level;
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

	public function out()
	{
	    $this->session->unset_userdata('username');
	    $this->session->unset_userdata('level');
	    session_destroy();
	    redirect('Log');
	}

}
