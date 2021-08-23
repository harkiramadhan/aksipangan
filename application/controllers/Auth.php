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
        $password = $this->input->post('password', TRUE);

        $check = $this->M_User->check($email, $password);

        if($check->num_rows() > 0){
            $userdata = $check->row_array();

            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('role', $userdata['idrole']);
            $this->session->set_userdata('email', $userdata['email']);

            redirect('dashboard', 'refresh');
            // if($userdata['idrole'] == 1):
            // else:
            // endif;
        }else{
            $this->session->set_flashdata('msg', 'Email Atau Password Tidak Sesuai');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
    }

    function logout(){
        $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
    }
}