<!-- Header -->
<div class="header bg-primary pb-6 mb-lg-2 mb-3">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-start py-4">
                <div class="col-lg-6 col-12">
                    <h6 class="h2 text-white d-inline-block mb-0">Aksi</h6>
                    <p class="text-white mb-0">Pada halaman ini, admin bisa membuat, edit, dan hapus aksi pada aksipangan.com.</p>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block mt-3">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark bg-gradient-white">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Aksi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-12 text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success ml-1 rounded-pill" data-toggle="modal"
                        data-target="#tambahAksi"><i class="fas fa-plus-circle mr-1"></i> Aksi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header d-md-inline-block bg-transparent border-0">
                    <div class="row align-items-center">
                        <div class="col-lg-9">
                            <h3 class="mb-0">Daftar Aksi</h3>
                        </div>
                        <div class="col-lg-3 mt-3 mt-lg-0">
                            <div class="form-group-xs">
                                <input type="text" id="myInput" placeholder="Cari Aksi . . . ." class="form-control form-control-alternative">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="max-height: 500px">
                    <div id="table_guru">
                        <table class="table table-sm align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5px" class="text-center">No</th>
                                    <th>Judul</th>
                                    <th width="5px" class="text-center">Cover</th>
                                    <th width="5px" class="text-center">Terkumpul</th>
                                    <th width="5px" class="text-center">Target</th>
                                    <th width="5px" class="text-center">Due Date</th>
                                    <th width="5px" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php 
                                    $no = 1;
                                    foreach($aksi->result() as $row){ 
                                        $getDonasi = $this->db->select('SUM(`nominal`) as total')
                                                                ->from('donasi')    
                                                                ->where([
                                                                    'idaksi' => $row->id,
                                                                    'status' => 1
                                                                ])->get()->row();
                                ?>
                                    <tr>
                                        <td scope="row" class="text-center"><?= $no++ ?></td>
                                        <td scope="row"><strong><?= $row->judul ?></strong></td>
                                        <td scope="row">
                                            <?php if($row->cover == TRUE){
                                                $url = base_url('assets/img/aksi/') . $row->cover;
                                            }else{
                                                $url = $row->cover_url;
                                            }?>
                                            <button class="btn btn-primary btn-sm"  data-toggle="popover"  data-html="true" data-placement="left" data-content="<img height='250px' src='<?= $url ?>'/>"><i class="fas fa-eye"></i></button>
                                        </td>
                                        <td scope="row">Rp. <strong><?= ($getDonasi->total > 0) ? rupiah($getDonasi->total) : 0 ?></strong></td>
                                        <td scope="row">Rp. <?= rupiah($row->target) ?></td>
                                        <td><?= ($row->due == TRUE) ? longdate_indo($row->due) : '..' ?></td>
                                        <td scope="row" class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-default mr-1 btn-edit" data-id="<?= $row->id ?>"><i class="fas fa-pencil-alt"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="<?= $row->id ?>"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Aksi-->
    <div class="modal fade" id="tambahAksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Aksi</h5>
                </div>
                <form action="<?= site_url('admin/aksi/create') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body bg-secondary">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" >Judul <span class="text-danger">*</span></label>
                                <input type="text" name="judul" class="form-control" placeholder="Tulis judul" value="" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" >Deskripsi <span class="text-danger">*</span></label>
                                <textarea name="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Target (Rp. ) <span class="text-danger">*</span></label>
                                <input type="text" name="target" class="form-control" placeholder="Tulis Nominal Target" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Due Date </label>
                                <input type="date" name="due" class="form-control" placeholder="Due Date" >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr class="my-3">
                            <small>Input Salah Satu Untuk Cover Aksi <span class="text-danger">*</span></small>
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Cover Url</label>
                                <input type="text" name="cover_url" class="form-control" placeholder="Tulis Url Untuk Cover">
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
            </div>
        </div>
    </div>

    <!-- Modal Edit Aksi -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content content-edit">
                
            </div>
        </div>
    </div>

    <!-- Modal Delete Aksi -->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-md">
            <div class="modal-content content-delete bg-gradient-danger ">
                
            </div>
        </div>
    </div>