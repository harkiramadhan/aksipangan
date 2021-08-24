<?php
class M_Aksi extends CI_Model{
    function get(){
        return $this->db->get('aksi');
    }

    function getById($id){
        return $this->db->get_where('aksi', ['id' => $id]);
    }
}