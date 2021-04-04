<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasilperangkingan extends CI_Controller
{
    var $tabel = 'perangkingan'; //variabel tabel 
    var $tabel1 = 'datakaryawan'; //variabel tabel 
    var $tabel2 = 'kriteria';
    var $tabel3 = 'nilaikaryawan';

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
        $datar = $this->db->query("SELECT datakaryawan.kode, datakaryawan.nama, datakaryawan.alamat, datakaryawan.telp, perangkingan.nilai FROM datakaryawan LEFT JOIN perangkingan ON datakaryawan.id = perangkingan.ida ORDER BY perangkingan.nilai DESC ")->result();
        $data['title'] = 'Data Hasil Perangkingan';
        $data['datar'] = $datar;

        $this->load->view('view_perangkingan', $data);
    }

    public function update()
    {
        $data['data'] = $this->model->get_all($this->tabel1, "asc");
        $data['datak'] = $this->model->get_all($this->tabel2, "asc");
        $data['datan'] = $this->model->get_all($this->tabel3, "asc");

        $mp = $this->pembobotan($data['datan'], $data['datak'], $data['data']);
        $data['mp'] = $mp;

        foreach ($data['data'] as $key => $value) {
            $this->db->query("UPDATE perangkingan SET nilai = " . $mp['jumlah'][$key] . " WHERE ida = $value->id ");
        }

        redirect('hasilperangkingan');
    }

    public function pembobotan($data, $kriteria, $dataa)
    {
        $arr_result[] = array();
        foreach ($kriteria as $key => $value) {
            foreach ($data as $keys => $values) {
                if ($value->id == $values->kodek) {
                    $arr_nilai[$key][] = $values->nilai;
                }
            }
        }

        foreach ($dataa as $key_k => $value) {
            foreach ($kriteria as $key_k2 => $values) {
                $cek = $this->db->query('SELECT * FROM nilaikaryawan WHERE kodea = ? AND kodek = ? ', array($value->kode, $values->kode))->row();
                $gap = ($cek->nilai - 5);
                if ($gap == 0) {
                    $bobot = 6;
                } elseif ($gap == -1) {
                    $bobot = 5;
                } elseif ($gap == -2) {
                    $bobot = 4;
                } elseif ($gap == -3) {
                    $bobot = 3;
                } elseif ($gap == -4) {
                    $bobot = 2;
                } elseif ($gap == -5) {
                    $bobot = 1;
                }
                $arr_result[$key_k][$key_k2] = round($bobot, 4);
            }
        }

        $arr_jumlah = array();
        foreach ($arr_result as $key => $value) {
            $jumlah = 0;
            foreach ($arr_result[$key] as $keys => $values) {
                $jumlah += round($arr_result[$key][$keys], 4);
            }
            $arr_jumlah[] = round($jumlah / sizeof($kriteria), 4);
        }

        return array('hasil' => $arr_result, 'jumlah' => $arr_jumlah);
    }
}
