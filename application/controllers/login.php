<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('view_login');
    }

    public function proses()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('pass');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $dt = $this->db->get('login');

        if ($dt->num_rows() > 0) {
            $data['title'] = 'DSS AHP SAW';
            $dataku['username'] = $username;
            $dataku['nama_lengkap'] = $dt->row()->nama_lengkap;
            $dataku['jabatan'] = $dt->row()->jabatan;
            $dataku['status'] = "YA";
            $this->session->set_userdata('session_data', $dataku);
            redirect('home', $data);
        } else {
            $this->session->set_flashdata("Pesan_Login", "<div class=\"alert alert-warning\" id=\"alert\"><i class=\"glyphicon glyphicon-warning\"></i>  Username atau password Anda Salah</div>");
            redirect('login');
        }
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
