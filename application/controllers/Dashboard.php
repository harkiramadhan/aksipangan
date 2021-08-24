<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();

        if($this->session->userdata('masuk') != TRUE){
            $this->session->set_flashdata('msg', 'Sesi Anda Telah Habis, Silahkan Login Kembali');
            redirect('', 'refresh');
        }
    }

    function index(){
        $var['title'] = "Dashboard - Admin aksipangan.com";

        $this->load->view('admin/header', $var);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
}