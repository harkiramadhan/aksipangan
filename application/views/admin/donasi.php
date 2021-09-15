<!-- Header -->
<div class="header bg-primary pb-6 mb-lg-2 mb-3">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-start py-4">
                <div class="col-lg-6 col-12">
                    <h6 class="h2 text-white d-inline-block mb-0">Donasi</h6>
                    <p class="text-white mb-0">Pada halaman ini, admin bisa melihat daftar donasi yang masuk sekaligus
                        melakukan verifikasi apakah donasi benar masuk atau tidak.</p>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block mt-3">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark bg-gradient-white">
                            <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Donasi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-12 text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success ml-1 rounded-pill" data-toggle="modal"
                        data-target="#tambahAgenda"><i class="fas fa-plus-circle mr-1"></i> Donasi Manual</button>
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
                            <h3 class="mb-0">Daftar Donasi Masuk</h3>
                        </div>
                        <div class="col-lg-3 mt-3 mt-lg-0">
                            <div class="form-group-xs">
                                <input type="text" id="myInput" placeholder="Cari Donatur . . . ." class="form-control form-control-alternative">
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
                                    <th>Donatur</th>
                                    <th width="5px" class="text-center">Aksi</th>
                                    <th width="5px" class="text-center">Status</th>
                                    <th width="5px" class="text-center">Nominal</th>
                                    <th width="5px" class="text-center">Tanggal</th>
                                    <th width="5px" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php 
                                    $no = 1;
                                    foreach($donasi->result_array() as $row){ ?>
                                <tr>
                                    <td scope="row" class="text-center"><?= $no++ ?></td>
                                    <td scope="row"><strong><?= $row['nama'] ?></strong></td>
                                    <td scope="row">
                                        <button class="btn btn-primary btn-sm" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?= $row['judul'] ?>">001<i class="fas fa-info-circle ml-1"></i></button>
                                    </td>
                                    <td scope="row text-center">
                                        <?php if($row['status'] == 0): ?>
                                            <button class="btn btn-sm btn-block btn-warning btn-bukti" data-id="<?= $row['id'] ?>">&nbsp;Belum Di Verifikasi&nbsp;</button>
                                        <?php elseif($row['status'] == 1): ?>
                                            <button class="btn btn-sm btn-block btn-success btn-bukti" data-id="<?= $row['id'] ?>">&nbsp;Sudah Di Verifikasi&nbsp;</button>
                                        <?php endif; ?>
                                    </td>
                                    <td scope="row">
                                        Rp. <strong><?= rupiah($row['nominal']) ?></strong>
                                        <span>- <?= $row['jenis'] ?></span>
                                    </td>
                                    <td scope="row"><?= date_indo($row['pay_date']) ?></td>
                                    <td scope="row" class="text-center">
                                        <div class="btn-group">
                                            <?php if($row['status'] == 0): ?>
                                                <button type="button" class="btn btn-sm btn-success mr-1 btn-verif" data-type="verif" data-id="<?= $row['id'] ?>" href="#"><i class="fas fa-check"></i></button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-danger mr-1 btn-verif" data-type="cancel" data-id="<?= $row['id'] ?>" href="#"><i class="fas fa-times"></i></button>
                                            <?php endif; ?>
                                            <button class="btn btn-sm btn-default btn-edit mr-1" data-id="<?= $row['id'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="<?= $row['id'] ?>"><i class="fas fa-trash"></i></button>
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

    <!-- Modal Tambah Donasi-->
    <div class="modal fade" id="tambahAgenda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Donasi Manual</h5>
                </div>
                <form action="<?= site_url('admin/donasi/create') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body bg-secondary">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nama">Nama <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" class="form-control" placeholder="Tulis Nama Donatur" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Tulis Email Donatur">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-whatsapp">No Whatsapp</label>
                                    <input type="text" name="nowa" class="form-control" placeholder="Tulis Nomor Whatsapp">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-nominal">Nominal Donasi <span class="text-danger">*</span></label>
                                    <input type="text" name="nominal" class="form-control" placeholder="Tulis Nominal Donasi">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="input-aksi">Pilih Aksi <span class="text-danger">*</span></label>
                                    <select class="form-control" name="idaksi" required>
                                        <option value="">- Pilih Aksi -</option>
                                        <?php foreach($aksi->result_array() as $a){ ?>
                                            <option value="<?= $a['id'] ?>"><?= $a['judul'] ?></option>
                                        <?php } ?>
                                        <option value="lain">- Lainnya (Tulis di Catatan)</option> 
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
                                            <option value="<?= $p['id'] ?>"><?= $text ?></option>
                                        <?php } ?>
                                        <option value="lain">- Lainnya (Tulis di Catatan)</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Tanggal Pembayaran</label>
                                    <input type="date" name="pay_date" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Catatan</label>
                                    <textarea rows="4" class="form-control" name="catatan" placeholder="Tulis beberapa catatan jika ada"></textarea>
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
                                <p class="h6 mt-3"><i>Diinput Oleh Harki Ramadhan (Admin)</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Donasi -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content content-edit">
                
            </div>
        </div>
    </div>

    <!-- Modal Image Donasi -->
    <div class="modal fade" id="modal-image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content content-image">
                
            </div>
        </div>
    </div>

    <!-- Modal Delete Donasi -->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-md">
            <div class="modal-content content-delete bg-gradient-danger ">
                
            </div>
        </div>
    </div>