<?php
class Aksi extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->library('image_lib');
        $this->load->model('M_Aksi');

        if($this->session->userdata('masuk') != TRUE){
            $this->session->set_flashdata('msg', 'Sesi Anda Telah Habis, Silahkan Login Kembali');
            redirect('', 'refresh');
        }
    }

    function index(){
        $var['title'] = "Aksi - Admin aksipangan.com";
        $var['aksi'] = $this->M_Aksi->get();
        $var['ajax'] = ['aksi'];

        $this->load->view('admin/header', $var);
        $this->load->view('admin/aksi', $var);
        $this->load->view('admin/footer');
    }

    function create(){
        $config['upload_path']      = './assets/img/aksi/';  
        $config['allowed_types']    = 'jpg|jpeg|png'; 
        $config['encrypt_name']    = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('cover')){
            $img = $this->upload->data();
            $this->resizeImage($img['file_name']); 
            
            $data = [
                'judul' => $this->input->post('judul', TRUE),
                'target' => $this->input->post('target', TRUE),
                'due' => $this->input->post('due', TRUE),
                'cover' => $img['file_name'],
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('aksi', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', "Aksi Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('error', "Aksi Gagal Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            if($this->input->post('cover_url') == TRUE){
                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'target' => $this->input->post('target', TRUE),
                    'due' => $this->input->post('due', TRUE),
                    'cover_url' => $this->input->post('cover_url', TRUE),
                    'created_at' => date('Y-m-d H:i:s')
                ];
    
                $this->db->insert('aksi', $data);
    
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('success', "Aksi Berhasil Di Simpan");
                    redirect($_SERVER['HTTP_REFERER']);
                }else{
                    $this->session->set_flashdata('error', "Aksi Gagal Di Simpan");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('error', "Cover Belum Di Pilih");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function edit($id){
        $aksi = $this->M_Aksi->getById($id)->row_array();

        $config['upload_path']      = './assets/img/aksi/';  
        $config['allowed_types']    = 'jpg|jpeg|png'; 
        $config['encrypt_name']    = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('cover')){
            if($aksi['cover'] == TRUE){
                $path = './assets/img/aksi/';
                $filename = $aksi['cover'];
                unlink($path.$filename);
            }

            $img = $this->upload->data();
            $this->resizeImage($img['file_name']); 
            
            $data = [
                'judul' => $this->input->post('judul', TRUE),
                'target' => $this->input->post('target', TRUE),
                'due' => $this->input->post('due', TRUE),
                'cover' => $img['file_name'],
                'cover_url' => ''
            ];

            $this->db->where('id', $id)->update('aksi', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', "Aksi Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('error', "Aksi Gagal Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            if($aksi['cover'] == TRUE){
                $path = './assets/img/aksi/';
                $filename = $aksi['cover'];
                unlink($path.$filename);
            }

            $data = [
                'judul' => $this->input->post('judul', TRUE),
                'target' => $this->input->post('target', TRUE),
                'due' => $this->input->post('due', TRUE),
                'cover_url' => $this->input->post('cover_url', TRUE),
                'cover' => ''
            ];

            $this->db->where('id', $id)->update('aksi', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', "Aksi Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('error', "Aksi Gagal Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function delete($id){
        $aksi = $this->M_Aksi->getById($id)->row_array();

        if($aksi['cover'] == TRUE){
            $path = './assets/img/aksi/';
            $filename = $aksi['cover'];
            unlink($path.$filename);
        }

        $this->db->where('id', $id)->delete('aksi');

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Aksi Berhasil Di Hapus");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', "Aksi Gagal Di Hapus");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    private function resizeImage($filename){
        $config['image_library'] = 'gd2';  
        $config['source_image'] = './assets/img/aksi/'.$filename;  
        $config['create_thumb'] = FALSE;  
        $config['maintain_ratio'] = TRUE;  
        $config['quality'] = '75%';  
        $config['new_image'] = './assets/img/aksi/'.$filename;  
        $config['width'] = 500;              
  
        $this->image_lib->initialize($config);
        $this->image_lib->resize();  
        $this->image_lib->clear();
    }

    // Ajax //
    function ajaxModalDetail($id){
        $aksi = $this->M_Aksi->getById($id)->row_array();
        ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Aksi | <strong><?= $aksi['judul'] ?></strong></h5>
            </div>
            <form action="<?= site_url('aksi/edit/' . $aksi['id']) ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body bg-secondary">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" >Judul <span class="text-danger">*</span></label>
                                <input type="text" name="judul" class="form-control" placeholder="Tulis judul" value="<?= $aksi['judul'] ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Target (Rp. ) <span class="text-danger">*</span></label>
                                <input type="text" name="target" class="form-control" placeholder="Tulis Nominal Target" value="<?= $aksi['target'] ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Due Date <span class="text-danger">*</span></label>
                                <input type="date" name="due" class="form-control" placeholder="Due Date" value="<?= $aksi['due'] ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr class="my-3">
                            <small>Input Salah Satu Untuk Cover Aksi <span class="text-danger">*</span></small>
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Cover Url</label>
                                <input type="text" name="cover_url" class="form-control" placeholder="Tulis Url Untuk Cover" value="<?= $aksi['cover_url'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-control-label">Upload Cover Aksi</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="input-bukti" name="cover" accept="image/png, image/gif, image/jpeg">
                                <label class="custom-file-label" for="input-bukti">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                </div>
            </form>
        <?php
    }

    function ajaxModalDelete($id){
        $aksi = $this->M_Aksi->getById($id)->row_array();

        ?>
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Hapus Aksi - <strong><?= $aksi['judul'] ?></strong></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4 mb-0">Apakah Anda Yakin! Menghapus Aksi <strong><?= $aksi['judul'] ?></strong> dan Seluruh Data Yang Berkaitan Dengan Aksi <strong><?= $aksi['judul'] ?></strong> </h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link text-white" data-dismiss="modal">Batal</button>
                <form action="<?= site_url('aksi/delete/' . $id) ?>" method="post">
                    <button type="submit" class="btn btn-white ml-auto">Ya, Hapus</button>
                </form>
            </div>
        <?php
    }
}