<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
        $data['title'] = 'Profil | Sistem Inventory';
        $data['content'] = 'profil';
        $this->load->view('layouts/main_v',$data);
    }

    public function error()
    {
        $this->load->view('index.html');
    }
	
    public function ganti_password()
    {
        if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('reg_usr','Username','trim|required');
            $this->form_validation->set_rules('pw1', 'Password', 'trim|required');
            $this->form_validation->set_rules('pw2', 'Ulangi Password', 'trim|required');
            
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata("msg","
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Password Harus Diisi !
                        </div>");
                header('location:'.base_url().'Profil');
            }else{
                $usr = $this->input->post('reg_usr');
                $pw1 = $this->input->post('pw1');
                $pw2 = $this->input->post('pw2');
                $akses= $this->input->post('reg_akses');
                if($akses=='Sales'){
                    if($pw1==$pw2){
                        $pass = md5($pw1);
                        $this->db->query("UPDATE tb_sales SET password='$pass' WHERE email='$usr' ");
                        $this->session->set_flashdata("msg","
                            <div class='alert alert-success fade in'>
                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                <strong>Success !</strong> Berhasil Merubah Password !
                            </div>");
                        header('location:'.base_url().'Profil');

                    }else{
                        $this->session->set_flashdata("msg","
                            <div class='alert alert-warning fade in'>
                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                <strong>Gagal !</strong> Password Tidak Sama !
                            </div>");
                        header('location:'.base_url().'Profil');   
                    }

                }else{
                    if($pw1==$pw2){
                        $pass = md5($pw1);
                        $this->db->query("UPDATE users SET password='$pass' WHERE username='$usr' ");
                        $this->session->set_flashdata("msg","
                            <div class='alert alert-success fade in'>
                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                <strong>Success !</strong> Berhasil Merubah Password !
                            </div>");
                        header('location:'.base_url().'Profil');

                    }else{
                        $this->session->set_flashdata("msg","
                            <div class='alert alert-warning fade in'>
                                <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                <strong>Gagal !</strong> Password Tidak Sama !
                            </div>");
                        header('location:'.base_url().'Profil');   
                    }
                }
            }
        }else{
            $this->error();
        }
    }

    public function change()
    {
        $this->load->helper(array('form','url'));
        $user = $this->session->userdata('username');
        $akses = $this->input->post('akses');

        $foto = $_FILES['file_upload']['name'];
        $config['upload_path']          = './asset/dist/img/';
        $config['allowed_types']        = 'jpg|gif|png';
        $config['max_size']             = 100000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        if($akses=='Sales'){
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('file_upload')){
                $this->db->query("UPDATE tb_sales SET foto='$foto' WHERE email='$user' ");
                $this->session->set_flashdata("msg","<div class='alert alert-success fade in'>
                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                    <strong>Success !</strong> Foto Profil berhasil dirubah!
                </div>");
            }else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning fade in'>
                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                    <strong>Failed !</strong> Foto Gagal dirubah!
                </div>");
            } 
            header('location:'.base_url().'Profil');

        }else{
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('file_upload')){
                $this->db->query("UPDATE users SET foto='$foto' WHERE username='$user' ");
                $this->session->set_flashdata("msg","<div class='alert alert-success fade in'>
                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                    <strong>Success !</strong> Foto Profil berhasil dirubah!
                </div>");
            }else{
                $this->session->set_flashdata("msg","<div class='alert alert-warning fade in'>
                    <a href='#' class='close' data-dismiss='alert'>&times;</a>
                    <strong>Failed !</strong> Foto Gagal dirubah!
                </div>");
            } 
            header('location:'.base_url().'Profil');            
        }
    }
}
