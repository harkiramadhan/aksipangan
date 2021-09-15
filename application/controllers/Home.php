<?php
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model([
            'M_Aksi',
            'M_Donasi'
        ]);
        $this->load->library('image_lib');
    }

    private function resizeImage($filename){
        $config['image_library'] = 'gd2';  
        $config['source_image'] = './assets/img/bukti/'.$filename;  
        $config['create_thumb'] = FALSE;  
        $config['maintain_ratio'] = TRUE;  
        $config['quality'] = '95%';  
        $config['new_image'] = './assets/img/bukti/'.$filename;  
        $config['width'] = 500;              
  
        $this->image_lib->initialize($config);
        $this->image_lib->resize();  
        $this->image_lib->clear();
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
        $var['donatur'] = $this->M_Donasi->getByAksi($id);
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

    function donasiAksi($id){
        $var['aksi'] = $this->M_Aksi->getById($id)->row();
        $var['title'] = $var['aksi']->judul . " ";
        $var['pembayaran'] = $this->db->get('metode_pembayaran')->result();

        $this->load->view('landing/donate-confirm', $var);
    }

    function actionConfirm(){
        $robot = $this->input->post('rbt');
        $idaksi = $this->input->post('idaksi', TRUE);
        $donationAmountSelection = $this->input->post('donationAmountSelection', TRUE);
        $donationAmountManual = $this->input->post('donationAmountManual', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $email = $this->input->post('email', TRUE);
        $nowa = $this->input->post('nowa', TRUE);
        $donationPaymentOptions = $this->input->post('donationPaymentOptions', TRUE);
        $nominal = ($donationAmountManual == TRUE) ? $donationAmountManual : $donationAmountSelection;

        if($donationPaymentOptions == 'tf'){
            $payment_method = $this->db->get_where('metode_pembayaran', ['jenis' => 'TF'])->row();
        }elseif($donationPaymentOptions == 'qris'){
            $payment_method = $this->db->get_where('metode_pembayaran', ['jenis' => 'QRIS'])->row();
        }


        if($robot == TRUE){
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $data = [
                'idaksi' => $idaksi,
                'idmetode' => $payment_method->id,
                'nama' => $nama,
                'nominal' => substr_replace((string)$nominal, substr(rand(), 0, 3), -3, 3),
                'nowa' => $nowa,
                'email' => $email,
                'status' => 0,
                'hide' => ($this->input->post('hide', TRUE) == TRUE) ? 1 : 0,
                'payment_option' => $donationPaymentOptions,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('donasi', $data);

            if($this->db->affected_rows() > 0){
                $iddonasi = $this->db->insert_id();
                redirect('donasi/detail/' . $iddonasi, 'refresh');
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function donasiNow($id){
        $var['title'] = "Donasi Sekarang ";
        $var['data'] = $this->db->get_where('donasi', ['id' => $id])->row_array();
        $var['aksi'] = $this->M_Aksi->getById($var['data']['idaksi'])->row();

        if($var['data']['payment_option'] == 'tf'){
            $var['payment_method'] = $this->db->get_where('metode_pembayaran', ['jenis' => 'TF'])->result();
        }else{
            $var['payment_method'] = $this->db->get_where('metode_pembayaran', ['jenis' != 'TF'])->result();
        }

        $this->load->view('landing/donasi-now', $var);
    }

    function uploadBukti(){
        $config['upload_path'] = './assets/img/bukti';  
        $config['allowed_types'] = 'jpg|jpeg|png'; 
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $img = $this->upload->data();
            $this->resizeImage($img['file_name']); 
            
            $this->db->where('id', $this->input->post('donateid', TRUE));
            $this->db->update('donasi', ['img' => $img['file_name']]);

            redirect('', 'refresh');
        }else{
            $this->session->set_flashdata('msg', "Bukti Gagal Di Upload. Silahkan Coba Lagi");
            redirect($_SERVER['HTTP_REFERER']);
        }  
    }
}