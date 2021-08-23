<?php
class Aksi extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('masuk') != TRUE){
            $this->session->set_flashdata('msg', 'Sesi Anda Telah Habis, Silahkan Login Kembali');
            redirect('', 'refresh');
        }
    }

    function index(){
        $this->load->view('admin/header');
        $this->load->view('admin/aksi');
        $this->load->view('admin/footer');
    }
}