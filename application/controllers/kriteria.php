<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    var $tabel = 'kriteria'; //variabel tabel 
    var $tabel2 = 'perbandingan_kriteria';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model');
        $this->load->helper('form', 'url');
        $this->session_data = $this->session->userdata('session_data');
        if ($this->session_data['status'] != "YA") {
            redirect('login');
        }
    }

    // awal tampil index
    public function index()
    {
        $data['title'] = 'Daftar Kriteria';
        $data['data'] = $this->model->get_all($this->tabel, "asc");
        $this->load->view('view_kriteria', $data);
    }
    //tampilan perbandingan kriteria
    public function perbandingan()
    {
        $data['title'] = 'Perbandingan Kriteria';
        $data['data'] = $this->model->get_all($this->tabel2, "asc");
        $this->load->view('view_kriteriaahp', $data);
    }

    // function form
    public function form()
    {
        // ambil variable url
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

        // ambil variabel dari form
        $id = $this->input->post('id');
        $kode = $this->input->post('kode_kriteria');
        $nama = $this->input->post('nama');

        // mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Kriteria';
            $data['aksi'] = 'aksi_add';
            $this->load->view('view_formkriteria', $data);
        } elseif ($mau_ke == "edit") {
            $data['qdata'] = $this->model->get_byid($this->tabel, $idu);
            $data['title'] = 'Edit Kriteria';
            $data['aksi']  = 'aksi_edit';
            $this->load->view('view_formkriteria', $data);
        } elseif ($mau_ke == "aksi_add") {
            // jika uri segmentasinya AKSI_ADD sebagai fungsi untuk insert data
            $data = array(
                'kode'  => $kode,
                'nama'  => $nama,
            );
            $this->model->get_insert($this->tabel, $data);
            $this->session->set_flashdata("Pesan_Kriteria", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
            redirect('kriteria', 'refresh');
        } elseif ($mau_ke == "aksi_edit") {
            // jika uri segmentnya aksi_edit sebagai fungsi untuk update
            $data = array(
                'kode'  => $kode,
                'nama'  => $nama,
            );
            $this->model->get_update($this->tabel, $id, $data);
            $this->session->set_flashdata("Pesan_Kriteria", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Update</div>");
            redirect('kriteria');
        }
    }

    public function del_kriteria($id)
    {
        $query = $this->db->delete('kriteria', 'id = ' . $id . '');
        if ($query == true) {
            echo '<script>alert("Berhasil")</script>';
            redirect('kriteria', 'refresh');
        } else {
            echo '<script>alert("Gagal")</script>';
        }
    }
}
