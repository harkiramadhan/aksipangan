<?php
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Aksi');
    }

    function index(){
        $var['title'] = "Beranda ";
        $var['aksi'] = $this->M_Aksi->get();

        $this->load->view('landing/header', $var);
        $this->load->view('landing/landing', $var);
        $this->load->view('landing/footer', $var);
    }

    function aksi(){
        $var['title'] = "Aksi Baik ";
        $var['aksi'] = $this->M_Aksi->get();

        $this->load->view('landing/header', $var);
        $this->load->view('landing/aksi-baik', $var);
        $this->load->view('landing/footer', $var);
    }

    function detailAksi($id){
        $var['aksi'] = $this->M_Aksi->getById($id)->row();
        $var['title'] = $var['aksi']->judul . " ";

        $this->load->view('landing/header', $var);
        $this->load->view('landing/detail-aksi', $var);
        $this->load->view('landing/footer', $var);
    }

    function aboutUs(){
        $var['title'] = "Tentang Kami ";

        $this->load->view('landing/header', $var);
        $this->load->view('landing/about-us', $var);
        $this->load->view('landing/footer', $var);
    }
}