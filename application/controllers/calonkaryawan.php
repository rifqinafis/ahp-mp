<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calonkaryawan extends CI_Controller
{
    var $tabel = 'datakaryawan'; //variabel tabel 
    var $tabel2 = 'kriteria';
    var $tabel3 = 'nilaikaryawan';
    var $tabel4 = 'perangkingan';

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
        $data['title'] = 'Data Calon Karyawan';
        $data['data'] = $this->model->get_all($this->tabel);
        $this->load->view('view_calonkaryawan', $data);
    }

    // function form
    public function form()
    {
        // ambil variable url
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

        $inputan = array(
            'id' => $this->input->post('id'),
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'kodek' => $this->input->post('kodek'),
            'nilai' => $this->input->post('nilai'),
        );

        $input = $this->model->get_all($this->tabel2);

        // mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            $data['qdata'] = $this->model->get_all($this->tabel2);
            $data['title'] = 'Tambah Calon Karyawan';
            $data['aksi'] = 'aksi_add';
            $this->load->view('view_formcalonkaryawan', $data);
        } elseif ($mau_ke == "edit") {
            $data['qdata'] = $this->model->get_all($this->tabel2);
            $data['dataq'] = $this->model->get_byid($this->tabel, $idu);
            $data['title'] = 'Edit Calon Karyawan';
            $data['aksi']  = 'aksi_edit';
            $this->load->view('view_formcalonkaryawan', $data);
        } elseif ($mau_ke == "aksi_add") {
            // jika uri segmentasinya AKSI_ADD sebagai fungsi untuk insert data
            $data = array(
                'kode' => $inputan['kode'],
                'nama' => $inputan['nama'],
                'alamat' => $inputan['alamat'],
                'telp' => $inputan['telp'],
            );
            $this->db->where('kode', $inputan['kode']);
            $cek = $this->db->get($this->tabel);
            if ($cek->num_rows() > 0) {
                $this->session->set_flashdata("Pesan_Calonkaryawan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Data Siswa Tidak Boleh Sama</div>");
                redirect('calonkaryawan');
            } else {
                for ($i = 0; $i < sizeof($input); $i++) {
                    $this->db->query("INSERT INTO nilaikaryawan(kodek, kodea, nilai) VALUES('" . $inputan['kodek'][$i] . "','" . $inputan['kode'] . "'," . $inputan['nilai'][$i] . ")");
                }
                $this->db->query("INSERT INTO perangkingan(kodea) VALUES('" . $inputan['kode'] . "') ");
                $this->model->get_insert($this->tabel, $data);
                $this->session->set_flashdata("Pesan_Calonkaryawan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
                redirect('calonkaryawan');
            }
        } elseif ($mau_ke == "aksi_edit") {
            // jika uri segmentnya aksi_edit sebagai fungsi untuk update
            $data = array(
                'kode' => $inputan['kode'],
                'nama' => $inputan['nama'],
                'alamat' => $inputan['alamat'],
                'telp' => $inputan['telp'],
            );
            $this->model->get_update($this->tabel, $inputan['id'], $data);
            for ($i = 0; $i < sizeof($input); $i++) {
                $this->db->query("UPDATE nilaikaryawan SET nilai = " . $inputan['nilai'][$i] . " WHERE kodek =  '" . $inputan['kodek'][$i] . "' AND kodea = '" . $inputan['kode'] . "' ");
            }
            $this->db->query("UPDATE nilaikaryawan SET kodea = '" . $data['kode'] . "' WHERE ida = " . $inputan['id'] . " ");
            $this->db->query("UPDATE perangkingan SET kodea = '" . $data['kode'] . "' WHERE ida = " . $inputan['id'] . " ");
            $this->session->set_flashdata("Pesan_Calonkaryawan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Update</div>");
            redirect('calonkaryawan');
        }
    }

    public function hapus($gid)
    {
        $this->model->delete($this->tabel, $gid);
        $this->db->query("DELETE FROM nilaikaryawan WHERE ida = " . $gid . "");
        $this->db->query("DELETE FROM perangkingan WHERE ida = " . $gid . "");
        $this->session->set_flashdata("Pesan_Calonkaryawan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus</div>");
        redirect('calonkaryawan');
    }
    public function hapusall()
    {
        $this->model->deleteall($this->tabel);
        $this->model->deleteall($this->tabel3);
        $this->model->deleteall($this->tabel4);
        $this->session->set_flashdata("Pesan_Calonkaryawan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus Semua</div>");
        redirect('calonkaryawan');
    }
}
