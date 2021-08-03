<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require_once APPPATH . "third_party/dompdf/autoload.php";

// use Dompdf\Dompdf;

class Approve extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('username') == "") {
            redirect('Log');
        }
    }

    public function error()
    {
        $this->load->view('index.html');
    }

    //Controller Approve Barang Keluar
    public function keluar()
    {
        $data['title'] = 'Approve Barang Keluar | Sistem Inventory';
        $data['approve'] = $this->db->query("SELECT * FROM barang_keluar WHERE approve='1' ORDER BY no_barangkeluar desc");
        $data['hasil_cari'] = $this->db->query("SELECT * FROM barang_keluar WHERE tgl_keluar='' ");
        $data['content'] = 'pimpinan/approve_keluar/approvekeluar_v';
        $this->load->view('layouts/main_v', $data);
    }

    public function cari_keluar()
    {
        $tgl = $this->input->post('tgl_transaksi');
        $data['hasil_cari'] = $this->db->query("SELECT * FROM barang_keluar WHERE tgl_keluar='$tgl' ");
        $this->load->view('pimpinan/approve_keluar/datasementara', $data);
    }

    //Controller Approve Barang Keluar
    public function inc_keluar()
    {
        if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('nomor_txt', 'Nomor Barang Keluar', 'trim|required');
            $this->form_validation->set_rules('kdbarang_txt', 'Kode Barang', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("msg", "
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Isi Data dengan Lengkap !
                        </div>");
                header('location:' . base_url() . 'Approve/keluar');
            } else {
                $nomor = $this->input->post('nomor_txt');
                $kdbarang = $this->input->post('kdbarang_txt');

                //Mengambil dari view barang keluar
                $barangkeluar = $this->db->query("SELECT * FROM barang_keluar WHERE no_barangkeluar='$nomor' ");
                foreach ($barangkeluar->result() as $k) {
                    $jumlah = intval($k->jumlah);
                }

                $barang = $this->db->query("SELECT * FROM tb_barang WHERE kd_barang='$kdbarang' ");
                foreach ($barang->result() as $b) {
                    $stok = intval($b->stok);
                }

                //Hitung Stok
                $stok_akhir = $stok - $jumlah;

                //Proses Insert
                $query1 = $this->db->query("UPDATE tb_barang SET stok='$stok_akhir' WHERE kd_barang='$kdbarang' ");
                $query2 = $this->db->query("UPDATE tb_barangkeluar SET approve='1' WHERE no_barangkeluar='$nomor' ");

                if ($query1 && $query2) {
                    $this->session->set_flashdata("msg", "
                        <div class='alert alert-success fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Success !</strong> Berhasil Melakukan Approve Barang Keluar !
                        </div>");
                } else {
                    $this->session->set_flashdata("msg", "
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Failed !</strong> Terjadi Kesalahan Approve Barang Keluar !
                        </div>");
                }
                header('location:' . base_url() . 'Approve/keluar');
            }
        } else {
            $this->error();
        }
    }

    //Controller Approve Barang Masuk
    public function masuk()
    {
        $data['title'] = 'Approve Barang Masuk | Sistem Inventory';
        $data['approve'] = $this->db->query("SELECT * FROM barang_masuk WHERE approve='1' ORDER BY no_barangmasuk desc");
        $data['hasil_cari'] = $this->db->query("SELECT * FROM barang_masuk WHERE tgl_masuk='' ");
        $data['content'] = 'pimpinan/approve_masuk/approvemasuk_v';
        $this->load->view('layouts/main_v', $data);
    }

    public function cari_masuk()
    {
        $tgl = $this->input->post('tgl_transaksi');
        $data['hasil_cari'] = $this->db->query("SELECT * FROM barang_masuk WHERE tgl_masuk='$tgl' ");
        $this->load->view('pimpinan/approve_masuk/datasementara', $data);
    }

    //Controller Approve Barang Keluar
    public function inc_masuk()
    {
        if (isset($_POST) && !empty($_POST)) {
            $this->form_validation->set_rules('nomor_txt', 'Nomor Barang Keluar', 'trim|required');
            $this->form_validation->set_rules('kdbarang_txt', 'Kode Barang', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("msg", "
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Gagal !</strong> Isi Data dengan Lengkap !
                        </div>");
                header('location:' . base_url() . 'Approve/masuk');
            } else {
                $nomor = $this->input->post('nomor_txt');
                $kdbarang = $this->input->post('kdbarang_txt');

                //Mengambil dari view barang keluar
                $barangkeluar = $this->db->query("SELECT * FROM barang_masuk WHERE no_barangmasuk='$nomor' ");
                foreach ($barangkeluar->result() as $k) {
                    $jumlah = intval($k->jumlah);
                }

                $barang = $this->db->query("SELECT * FROM tb_barang WHERE kd_barang='$kdbarang' ");
                foreach ($barang->result() as $b) {
                    $stok = intval($b->stok);
                }

                //Hitung Stok
                $stok_akhir = $stok + $jumlah;

                //Proses Insert
                $query1 = $this->db->query("UPDATE tb_barang SET stok='$stok_akhir' WHERE kd_barang='$kdbarang' ");
                $query2 = $this->db->query("UPDATE tb_barangmasuk SET approve='1' WHERE no_barangmasuk='$nomor' ");

                if ($query1 && $query2) {
                    $this->session->set_flashdata("msg", "
                        <div class='alert alert-success fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Success !</strong> Berhasil Melakukan Approve Barang Masuk !
                        </div>");
                } else {
                    $this->session->set_flashdata("msg", "
                        <div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <strong>Failed !</strong> Terjadi Kesalahan Approve Barang Masuk !
                        </div>");
                }
                header('location:' . base_url() . 'Approve/masuk');
            }
        } else {
            $this->error();
        }
    }

    public function laporan_masuk()
    {
        $data['title'] = 'Laporan Barang Masuk | Sistem Inventory';
        $data['content'] = 'pimpinan/lap-masuk/lap_masuk_v';
        $this->load->view('layouts/main_v', $data);
    }

    public function report()
    {
        $this->load->library('Dompdf_gen');

        $act = $this->input->post('action');
        $hari = $this->input->post('hari_txt');
        $dari = $this->input->post('daritgl_txt');
        $sampai = $this->input->post('sampaitgl_txt');
        $tahun = $this->input->post('tahun');

        if ($hari) {
            $chari = date('d-m-Y', strtotime($hari));
        }

        if ($dari) {
            $cdari = date('d-m-Y', strtotime($dari));
        }

        if ($sampai) {
            $csampai = date('d-m-Y', strtotime($sampai));
        }

        if ($act == 'hari') {
            $data['judul'] = 'LAPORAN BARANG MASUK TANGGAL ' . tgl_indo($chari);
            $judulpdf = 'LAPORAN BARANG MASUK TANGGAL ' . $chari;
            $data['dtbarang'] = $this->db->query("SELECT * FROM barang_masuk WHERE tgl_masuk='$hari' ");
            $this->load->view('report', $data);
        } elseif ($act == 'bulan') {
            $data['judul'] = 'LAPORAN BARANG MASUK TANGGAL ' . tgl_indo($cdari) . ' s/d ' . tgl_indo($csampai) . '';
            $judulpdf = 'LAPORAN BARANG MASUK TANGGAL ' . $cdari . ' s/d ' . $csampai . '';
            $data['dtbarang'] = $this->db->query("SELECT * FROM barang_masuk WHERE tgl_masuk BETWEEN '$dari' AND '$sampai' ORDER BY tgl_masuk");
            $this->load->view('report', $data);
        } elseif ($act == 'tahun') {
            $data['judul'] = 'LAPORAN BARANG MASUK TAHUN ' . $tahun;
            $judulpdf = 'LAPORAN BARANG MASUK TAHUN ' . $tahun;
            $data['dtbarang'] = $this->db->query("SELECT * FROM barang_masuk WHERE YEAR(tgl_masuk)='$tahun' ");
            $this->load->view('report', $data);
        } else {
            $this->error();
        }

        set_time_limit(1000);
        $paper_size = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $canvas = $this->dompdf->get_canvas();
        $font = Font_Metrics::get_font("helvetica", "italic");
        /*$canvas->page_text(16, 570, "Halaman: {PAGE_NUM} dari {PAGE_COUNT}", $font, 6, array(0, 0, 0));*/
        $this->dompdf->stream($judulpdf, array('Attachment' => 0));
    }

    public function laporan_keluar()
    {
        $data['title'] = 'Laporan Barang Keluar | Sistem Inventory';
        $data['content'] = 'pimpinan/lap-keluar/lap_keluar_v';
        $this->load->view('layouts/main_v', $data);
    }

    public function report_keluar()
    {
        /*$act = $this->input->post('action');
        $hari = $this->input->post('hari_txt');
        $dari = $this->input->post('daritgl_txt');
        $sampai = $this->input->post('sampaitgl_txt');
        $tahun = $this->input->post('tahun');

        if($hari){
            $chari = date('d-m-Y',strtotime($hari));
        }

        if($dari){
            $cdari = date('d-m-Y',strtotime($dari));
        }

        if($sampai){
            $csampai = date('d-m-Y',strtotime($sampai));
        }

        if($act=='hari'){
            $data['judul'] = 'LAPORAN BARANG KELUAR TANGGAL '.$chari;
            $data['dtbarang'] = $this->db->query("SELECT * FROM barang_keluar WHERE tgl_keluar='$hari' "); 
            $this->load->view('pimpinan/lap-keluar/report',$data);
        }elseif($act=='bulan'){
            $data['judul'] = 'LAPORAN BARANG KELUAR TANGGAL '.$cdari.' s/d '.$csampai.'';
            $data['dtbarang'] = $this->db->query("SELECT * FROM barang_keluar WHERE tgl_keluar BETWEEN '$dari' AND '$sampai' ORDER BY tgl_keluar");
            $this->load->view('pimpinan/lap-keluar/report',$data);
        }elseif($act=='tahun'){
            $data['judul'] = 'LAPORAN BARANG KELUAR TAHUN '.$tahun;
            $data['dtbarang'] = $this->db->query("SELECT * FROM barang_keluar WHERE YEAR(tgl_keluar)='$tahun' ");
            $this->load->view('pimpinan/lap-keluar/report',$data);
        }else{
            $this->error();
        }*/

        $this->load->library('Dompdf_gen');
        $act = $this->input->post('action');
        $hari = $this->input->post('hari_txt');
        $dari = $this->input->post('daritgl_txt');
        $sampai = $this->input->post('sampaitgl_txt');
        $tahun = $this->input->post('tahun');

        if ($hari) {
            $chari = date('d-m-Y', strtotime($hari));
        }

        if ($dari) {
            $cdari = date('d-m-Y', strtotime($dari));
        }

        if ($sampai) {
            $csampai = date('d-m-Y', strtotime($sampai));
        }

        if ($act == 'hari') {
            $data['judul'] = 'LAPORAN BARANG KELUAR TANGGAL ' . tgl_indo($chari);
            $judulpdf = 'LAPORAN BARANG KELUAR TANGGAL ' . $chari;
            $data['dtbarang'] = $this->db->query("SELECT * FROM barang_keluar WHERE tgl_keluar='$hari' ");
            $this->load->view('report', $data);
        } elseif ($act == 'bulan') {
            $data['judul'] = 'LAPORAN BARANG KELUAR TANGGAL ' . tgl_indo($cdari) . ' s/d ' . tgl_indo($csampai) . '';
            $judulpdf = 'LAPORAN BARANG KELUAR TANGGAL ' . $cdari . ' s/d ' . $csampai . '';
            $data['dtbarang'] = $this->db->query("SELECT * FROM barang_keluar WHERE tgl_keluar BETWEEN '$dari' AND '$sampai' ORDER BY tgl_keluar");
            $this->load->view('report', $data);
        } elseif ($act == 'tahun') {
            $data['judul'] = 'LAPORAN BARANG KELUAR TAHUN ' . $tahun;
            $judulpdf = 'LAPORAN BARANG KELUAR TAHUN ' . $tahun;
            $data['dtbarang'] = $this->db->query("SELECT * FROM barang_keluar WHERE YEAR(tgl_keluar)='$tahun' ");
            $this->load->view('report', $data);
        } else {
            $this->error();
        }

        set_time_limit(1000);
        $paper_size = 'A4'; //paper size
        $orientation = 'landscape'; //tipe format kertas
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $canvas = $this->dompdf->get_canvas();
        $font = Font_Metrics::get_font("helvetica", "italic");
        /*$canvas->page_text(16, 570, "Halaman: {PAGE_NUM} dari {PAGE_COUNT}", $font, 6, array(0, 0, 0));*/
        $this->dompdf->stream($judulpdf, array('Attachment' => 0));
    }
}
