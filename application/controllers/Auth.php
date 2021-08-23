<?php
class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_User');    
    }

    function index(){
        $this->load->view('login');
    }

    function login(){
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('passowrd', TRUE);

        $check = $this->M_User->checkUser($email, $password);

        if($check->num_rows() > 0){

        }else{
            $this->session->set_flashdata('msg', 'Email Atau Password Tidak Sesuai');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

    function logout(){

    }
}