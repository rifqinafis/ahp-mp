<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kriteriaahp extends CI_Controller
{
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

    public function index()
    {
        $data = array(
            'nkriteria' => $this->db->get('nilaikriteria')->result(),
            'kriteria' => $this->db->get('kriteria')->result(),
            'title' => 'Perbandingan Kriteria AHP'
        );

        $ahp = $this->perbandingan_kriteria($data['nkriteria'], $data['kriteria']);
        $data['ahp'] = $ahp;

        $ahp1 = $this->normalisasi_kriteria($ahp);
        $data['ahp1'] = $ahp1;

        $ahp2 = $this->konsistensi($ahp1);
        $data['ahp2'] = $ahp2;

        $this->load->view('view_kriteriaahp', $data);
    }

    public function form()
    {
        $mau_ke = $this->uri->segment(3);

        $data['data1'] = $this->model->get_all("kriteria");

        $inputan = array(
            'kriteria1' => $this->input->post('kriteria1'),
            'nilai' => $this->input->post('nilai'),
            'kriteria2' => $this->input->post('kriteria2'),
        );
        $cc = count((array)$inputan['kriteria1']);

        // mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            $data['title'] = 'Nilai Kriteria';
            $data['aksi'] = 'aksi_add';
            $data['qdata'] = $this->model->get_all("nilaikriteria");
            $this->load->view('view_formnilaikriteria', $data);
        } elseif ($mau_ke == "aksi_add") {
            $this->model->deleteall("nilaikriteria");
            for ($i = 0; $i <= $cc; $i++) {
                for ($j = $i + 1; $j <= $cc; $j++) {
                    $this->db->query("INSERT INTO nilaikriteria(kriteria1, nilai, kriteria2) VALUES(" . $inputan['kriteria1'][$i][$j] . "," . $inputan['nilai'][$i][$j] . "," . $inputan['kriteria2'][$i][$j] . ")");
                }
            }
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
            redirect('kriteriaahp');
        }
    }

    public function perbandingan_kriteria($data, $kriteria)
    {
        $arr_result[] = array();
        foreach ($kriteria as $key => $value) {
            foreach ($data as $keys => $values) {
                if ($value->id == $values->kriteria2) {
                    $arr_nilai[$key][] = $values->nilai;
                }
            }
        }

        foreach ($kriteria as $key_k => $value) {
            foreach ($kriteria as $key_k2 => $values) {
                $val = 1;
                if ($key_k  == $key_k2) {  // jika perbandingan dengan kritreria 1 dan 2 sama
                    $val = 1;
                } elseif ($key_k > $key_k2) {
                    $val = 1 / $arr_nilai[$key_k][$key_k2]; // mengisi nilai perbandingan untuk pecahan
                } else {
                    $val =  $arr_nilai[$key_k2][$key_k]; // megisi perbandingan untuk nilai bulat
                }
                $arr_result[$key_k][$key_k2] = round($val, 4);
            }
        }

        foreach ($arr_result as $key => $value) { // menghitung jumlah kolom
            $arr_total[$key] = 0;
            foreach ($arr_result[$key] as $keys => $values) {
                $arr_total[$key] += round($arr_result[$keys][$key], 4);
            }
        }

        return array('nilai' => $arr_nilai, 'hasil' => $arr_result, 'total_bawah' => $arr_total);
    }

    function normalisasi_kriteria($hasil)
    {

        $normalisasi = array();
        $arr_jumlah = array();
        $arr_total = array();
        $arr_nilai = array();

        $jumlah_arr = count($hasil['hasil']);

        foreach ($hasil['hasil'] as $key => $value) {
            $jumlah = 0;
            $prioritas = 0;
            foreach ($hasil['hasil'][$key] as $keys => $values) {
                $normalisasi[$key][$keys] = round($hasil['hasil'][$key][$keys] / $hasil['total_bawah'][$keys], 4);
                $jumlah += round($normalisasi[$key][$keys], 4);
            }
            $prioritas = $jumlah / $jumlah_arr;

            $arr_nilai[] = round($prioritas, 4);
            $arr_jumlah[] = $jumlah;
        }

        $arr_cm = array();
        foreach ($hasil['hasil'] as $key => $value) {
            $cm = 0;
            foreach ($hasil['hasil'][$key] as $keys => $values) {
                $cm += $values * $arr_nilai[$keys];
            }
            $arr_cm[] = $cm;
        }

        foreach ($arr_nilai as $key => $value) {
            $arr_cm[$key] = round($arr_cm[$key] / $value, 4);
        }

        foreach ($normalisasi as $key => $value) {
            $total = 0;
            foreach ($normalisasi[$key] as $keys => $values) {
                $total = $normalisasi[$keys][$key] + $total;
            }
            $arr_total[] = round($total, 2);
        }

        return array(
            'hasil' => $normalisasi,
            'jumlah' => $arr_jumlah,
            'bobot' => $arr_nilai,
            'total' => $arr_total,
            'nilai' => $hasil['hasil'],
            'vector' => $arr_cm,
        );
    }

    function konsistensi($hasil)
    {
        $arr_result[] = array();
        $arr_total = array();
        $jumlah = sizeof($hasil['nilai']);

        foreach ($hasil['nilai'] as $key => $value) {
            $total = 0;
            foreach ($hasil['nilai'][$key] as $keys => $values) {
                $arr_result[$key][$keys] = round($hasil['nilai'][$key][$keys] * $hasil['bobot'][$keys], 4);
                $total += round($arr_result[$key][$keys], 4);
            }
            $arr_total[] = round($total, 4);
        }

        $total_ratio = 0;
        foreach ($arr_total as $key => $value) {
            $total_ratio += $value;
        }

        $jumlah_cm = 0;
        foreach ($hasil['vector'] as $key => $value) {
            $jumlah_cm += $value;
        }
        $jumlah_cm = $jumlah_cm / $jumlah;

        $ci = round(($jumlah_cm - $jumlah) / ($jumlah - 1), 4);

        if ($jumlah == 2) {
            $bagi = 0;
        } elseif ($jumlah == 3) {
            $bagi = 0.58;
        } elseif ($jumlah == 4) {
            $bagi = 0.90;
        } elseif ($jumlah == 5) {
            $bagi = 1.12;
        } elseif ($jumlah == 6) {
            $bagi = 1.24;
        } elseif ($jumlah == 7) {
            $bagi = 1.32;
        } else {
            $bagi = 1.41;
        }

        $cr = round($ci / $bagi, 4);

        return array(
            'hasil' => $arr_result,
            'total' => $arr_total,
            'lamda' => $total_ratio,
            'lamdamax' => $jumlah_cm,
            'ci' => $ci,
            'cr' => $cr,
        );
    }
}
