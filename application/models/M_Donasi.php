<?php
class M_Donasi extends CI_Model{
    function get(){
        return $this->db->select('d.*, p.jenis, a.judul')
                        ->from('donasi d')
                        ->join('aksi a', 'd.idaksi = a.id', 'LEFT')
                        ->join('metode_pembayaran p', 'd.idmetode = p.id', 'LEFT')
                        ->order_by('d.id', 'DESC')->get();
    }

    function getById($id){
        return $this->db->select('d.*, p.jenis, a.judul')
                        ->from('donasi d')
                        ->join('aksi a', 'd.idaksi = a.id', 'LEFT')
                        ->join('metode_pembayaran p', 'd.idmetode = p.id', 'LEFT')
                        ->where(['d.id' => $id])
                        ->order_by('d.id', 'DESC')->get();
    }
}