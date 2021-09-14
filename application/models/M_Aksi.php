<?php
class M_Aksi extends CI_Model{
    function get(){
        return $this->db->order_by('id', "DESC")->get('aksi');
    }

    function getById($id){
        return $this->db->get_where('aksi', ['id' => $id]);
    }
}