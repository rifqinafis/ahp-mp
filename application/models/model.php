<?php

class Model extends CI_Model
{



    function __construct()
    {
        parent::__construct();
    }

    function get_all($tabel, $urut = "asc")
    {
        $this->db->from($tabel);
        $this->db->order_by("id", $urut);
        $query = $this->db->get(); //cek apakah ada ba 

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }



    function get_byid($tabel, $id)
    {
        $this->db->from($tabel);
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }

    function get_insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return TRUE;
    }

    function get_update($tabel, $id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($tabel, $data);
        return TRUE;
    }

    function delete($tabel, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete($tabel);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    function deleteall($tabel)
    {
        $sql = "TRUNCATE  $tabel";
        $this->db->query($sql);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    function delete_dum($tabel, $tahun)
    {
        $this->db->where('tahun', $tahun);
        $this->db->delete($tabel);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
}
