<?php
class Donasi extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->library('image_lib');
        $this->load->model([
            'M_Donasi',
            'M_Aksi'
        ]);

        if($this->session->userdata('masuk') != TRUE){
            $this->session->set_flashdata('msg', 'Sesi Anda Telah Habis, Silahkan Login Kembali');
            redirect('', 'refresh');
        }
    }

    function index(){
        $var['title'] = "Donasi - Admin aksipangan.com";
        $var['pembayaran'] = $this->db->get('metode_pembayaran');
        $var['donasi'] = $this->M_Donasi->get();
        $var['aksi'] = $this->M_Aksi->get();
        $var['ajax'] = ['donasi'];
        
        $this->load->view('admin/header', $var);
        $this->load->view('admin/donasi', $var);
        $this->load->view('admin/footer', $var);
    }

    function create(){
        $fileName = '';
        $config['upload_path']      = './assets/img/bukti/';  
        $config['allowed_types']    = 'jpg|jpeg|png'; 
        $config['encrypt_name']    = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $img = $this->upload->data();
            $this->resizeImage($img['file_name']); 

            $fileName = $img['file_name'];
        }

        $data = [
            'nama' => $this->input->post('nama', TRUE),
            'email' => $this->input->post('email', TRUE),
            'nowa' => $this->input->post('nowa', TRUE),
            'nominal' => $this->input->post('nominal', TRUE),
            'idaksi' => ($this->input->post('idaksi', TRUE) == 'lain') ? NULL : $this->input->post('idaksi', TRUE),
            'idmetode' => ($this->input->post('idmetode', TRUE) == 'lain') ? NULL : $this->input->post('idmetode', TRUE),
            'pay_date' => $this->input->post('pay_date', TRUE),
            'catatan' => $this->input->post('catatan', TRUE),
            'img' => $fileName
        ];

        $this->db->insert('donasi', $data);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Donasi Berhasil Di Tambahkan");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', "Donasi Gagal Di Tambahkan");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function update($id){
        $donasi = $this->M_Donasi->getById($id)->row_array();
        $fileName = $donasi['img'];
        $config['upload_path']      = './assets/img/bukti/';  
        $config['allowed_types']    = 'jpg|jpeg|png'; 
        $config['encrypt_name']    = TRUE;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            if($donasi['img'] == TRUE){
                $path = './assets/img/bukti/';
                $filename = $donasi['img'];
                unlink($path.$filename);
            }
            
            $img = $this->upload->data();
            $this->resizeImage($img['file_name']); 

            $fileName = $img['file_name'];
        }

        $data = [
            'nama' => $this->input->post('nama', TRUE),
            'email' => $this->input->post('email', TRUE),
            'nowa' => $this->input->post('nowa', TRUE),
            'nominal' => $this->input->post('nominal', TRUE),
            'idaksi' => ($this->input->post('idaksi', TRUE) == 'lain') ? NULL : $this->input->post('idaksi', TRUE),
            'idmetode' => ($this->input->post('idmetode', TRUE) == 'lain') ? NULL : $this->input->post('idmetode', TRUE),
            'pay_date' => $this->input->post('pay_date', TRUE),
            'catatan' => $this->input->post('catatan', TRUE),
            'img' => $fileName
        ];

        $this->db->where('id', $id)->update('donasi', $data);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Donasi Berhasil Di Simpan");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', "Donasi Gagal Di Simpan");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function delete($id){
        $donasi = $this->M_Donasi->getById($id)->row_array();
        if($donasi['img'] == TRUE){
            $path = './assets/img/bukti/';
            $filename = $donasi['img'];
            unlink($path.$filename);
        }

        $this->db->where('id', $id)->delete('donasi');
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Donasi Berhasil Di Hapus");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', "Donasi Gagal Di Hapus");
            redirect($_SERVER['HTTP_REFERER']);
        }
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

    // Ajax //
    function ajaxModalEdit($id){
        $donasi = $this->M_Donasi->getById($id)->row_array();
        $pembayaran = $this->db->get('metode_pembayaran');
        $aksi = $this->M_Aksi->get();
        
        ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Donasi</h5>
            </div>
            <form action="<?= site_url('admin/donasi/update/' . $id) ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body bg-secondary">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" placeholder="Tulis Nama Donatur" value="<?= $donasi['nama'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Tulis Email Donatur" value="<?= $donasi['email'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-whatsapp">No Whatsapp</label>
                                <input type="text" name="nowa" class="form-control" placeholder="Tulis Nomor Whatsapp" value="<?= $donasi['nowa'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-nominal">Nominal Donasi <span class="text-danger">*</span></label>
                                <input type="text" name="nominal" class="form-control" placeholder="Tulis Nominal Donasi" value="<?= $donasi['nominal'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="input-aksi">Pilih Aksi <span class="text-danger">*</span></label>
                                <select class="form-control" name="idaksi" required>
                                    <option value="">- Pilih Aksi -</option>
                                    <?php foreach($aksi->result_array() as $a){ ?>
                                        <option value="<?= $a['id'] ?>" <?= ($a['id'] == $donasi['idaksi']) ? 'selected' : '' ?>><?= $a['judul'] ?></option>
                                    <?php } ?>
                                    <option value="lain" <?= ($donasi['idaksi'] == NULL) ? 'selected' : '' ?>>- Lainnya (Tulis di Catatan)</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="input-pembayaran">Jenis Pembayaran <span class="text-danger">*</span></label>
                                <select class="form-control" name="idmetode" required>
                                    <option value="">- Pilih Pembayaran -</option>
                                    <?php foreach($pembayaran->result_array() as $p){ 
                                        if($p['jenis'] == 'TF'){
                                            $text = $p['jenis'] . ' - ' . $p['rekening'] .' ' . $p['nama'] . ' ' . $p['nomor'];
                                        }else{
                                            $text = $p['jenis'] . ' - ' . $p['nama'];
                                        }
                                    ?>
                                        <option value="<?= $p['id'] ?>" <?= ($p['id'] == $donasi['idmetode']) ? 'selected' : '' ?>><?= $text ?></option>
                                    <?php } ?>
                                    <option value="lain" <?= ($donasi['idmetode'] == NULL) ? 'selected' : '' ?>>- Lainnya (Tulis di Catatan)</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Tanggal Pembayaran</label>
                                <input type="date" name="pay_date" class="form-control" placeholder="" value="<?= $donasi['pay_date'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Catatan</label>
                                <textarea rows="4" class="form-control" name="catatan" placeholder="Tulis beberapa catatan jika ada"><?= $donasi['catatan'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-control-label">Upload Bukti</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img" id="input-bukti">
                                <label class="custom-file-label" for="input-bukti">Choose file</label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- <p class="h6 mt-3"><i>Diinput Oleh Harki Ramadhan (Admin)</i></p> -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                </div>
            </form>
        <?php
    }

    function ajaxModalDelete($id){
        $donasi = $this->M_Donasi->getById($id)->row_array();

        ?>
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Hapus Donasi</strong></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4 mb-0">Apakah Anda Yakin! Menghapus Donasi <br> <strong><?= $donasi['nama'] ?></strong></h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link text-white" data-dismiss="modal">Batal</button>
                <form action="<?= site_url('admin/donasi/delete/' . $id) ?>" method="post">
                    <button type="submit" class="btn btn-white ml-auto">Ya, Hapus</button>
                </form>
            </div>
        <?php        
    }

    function ajaxModalImage(){
        $iddonasi = $this->input->get('iddonasi', TRUE);
        $donasi = $this->db->select('donasi.*, aksi.judul')
                            ->from('donasi')
                            ->join('aksi', 'donasi.idaksi = aksi.id')
                            ->where('donasi.id', $iddonasi)
                            ->get()->row(); 
        ?>
            <div class="modal-header bg-secondary">
                <h6 class="modal-title mb-0" id="modal-title-notification">Bukti Donasi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center" width="100%">
                <button class=" btn btn-block btn-default mb-3"><strong><?= $donasi->nama ?></strong> - <?= $donasi->judul ?></button>
                <?php if($donasi->img == TRUE): ?>
                    <div class="py-3 text-center mb-0">
                        <img class="rounded" src="<?= base_url('assets/img/bukti/' . $donasi->img) ?>" alt="" width="100%">
                    </div>
                <?php else: ?>
                    <div class="py-0 text-center mb-0">
                        <div class="alert alert-danger" role="alert">
                            <strong>Bukti Tidak Tersedia</strong>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer bg-secondary">
                <button type="button" class="btn btn-sm btn-default text-white" data-dismiss="modal">Tutup</button>
            </div>
        <?php
    }

    function ajaxUpdateStatus(){
        $id = $this->input->post('id', TRUE);
        $type = $this->input->post('type', TRUE);
        $text = ($type == 'verif') ? 'Verifikasi' : 'Batalkan';
        
        $donasi = $this->db->get_where('donasi', ['id' => $id])->row();

        $this->db->where('id', $id)->update('donasi', [
            'status' => ($type == 'verif') ? 1 : 0
        ]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Donasi " . $donasi->nama . " Berhasil Di " . $text);
        }else{
            $this->session->set_flashdata('error', "Donasi " . $donasi->nama . " Gagal Di " . $text);
        }
    }
}