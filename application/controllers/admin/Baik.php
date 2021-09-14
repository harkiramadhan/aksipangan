<?php
class Baik extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->load->view('landing/header');
        $this->load->view('landing/aksi-baik');
        $this->load->view('landing/footer');
    }
}