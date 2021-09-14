<main>
    <!-- bannerSec / bannerSecII -->
    <section class="bannerSec bannerSecII d-flex position-relative overflow-hidden">
        <div class="alignCenter w-100 d-flex align-items-center">
            <div class="container pt-15 py-md-10 pt-lgwd-35 pb-lgwd-10">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="captionWrap position-relative">
                            <h1 class="text-white fwSemibold mb-1">
                                <span class="d-block">Aksi Baik</span>
                            </h1>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="list-unstyled cbbPageList fontCabin text-capitalize d-flex mb-0 p-0">
                            <li>
                                <a href="<?= site_url() ?>">Beranda</a>
                            </li>
                            <li>Aksi Baik Kami</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <span class="bgImg bgCover position-absolute" style="background-image: url(<?= base_url('assets/landing') ?>/images/banner/banner-mini100.png)"></span>
    </section>
    <div class="causesGridSection py-10 pt-md-15 pb-md-3 pt-lg-10 pb-lg-5 mb-lg-10 mb-15">
        <div class="container">
            <div class="row cgSecRow">
                <?php foreach($aksi->result() as $row){ ?>
                <!-- <?= $row->judul ?> -->
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- causeGridCol -->
                    <article class="causeGridCol hasOver d-flex w-100 bg-white fontCabin hasShadow rounded-lg  rounded-top">
                        <div class="d-flex flex-column w-100 position-relative">
                            <!-- cgColImg -->
                            <div class="overflow-hidden position-relative progress-bar rounded-top" id="progress-bar">
                                <img src="<?= base_url('assets/img/aksi/' . $row->cover) ?>" class="img-fluid w-100 rounded-top" alt="<?= $row->judul ?>">
                            </div>
                            <!-- cgColCountersList -->
                            <div style="border: 1px solid #eee;">
                                <div class="row mt-2 px-3 pb-2">
                                    <div class="col">
                                        <span class="text-left text-black"><strong>Terkumpul</strong></span>
                                        <span class="d-block text-left"><i class="fa fa-wallet mr-1 text-info"></i> Rp. 0</span>
                                    </div>
                                    <div class="col-5">
                                        <span class="text-left text-black"><strong>Sisa Hari</strong></span>
                                        <!-- <span class="d-block text-left"><i class="fa fa-calendar-day mr-1 text-danger"></i> 31 Hari</span> -->
                                        <span class="d-block text-left"><i class="fa fa-calendar-day mr-1 text-danger"></i><?= ($row->due == TRUE) ? due($row->due) :'&#8734;' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class=" px-3 pt-2 mb-2">
                                <h4 class="h4 cgColTitle mb-2 fwSemibold"><a href="<?= site_url('aksi/' . $row->id) ?>"><?= $row->judul ?></a></h4>
                                <p class="mb-0 text-justify"><?= $row->deskripsi ?></p>
                            </div>
                            <div class=" px-3 pb-3">
                                <p><strong>Donasi Sekarang, Melalui :</strong></p>
                                <div class="btn-group">
                                    <!-- https://wa.me/628118448335 -->
                                    <a href="https://forms.gle/zy7bmXjY6gyiCnxA6" target="_blank" class="btn btnPrimary btnMin align-top p-0 border-light position-relative" data-hover="Klik Untuk Donasi">
                                        <span class="d-block btnText"></i>Form Donasi</span>
                                    </a>
                                    <a href="https://api.whatsapp.com/send/?phone=6281290478592&text=Hallo%2C%20%E2%80%A8%0A%0ASaya%20_tulis%20nama%20anda_%2C%0A%E2%80%A8Ingin%20berdonasi%20di%20aksi%20Aksi%201000%20HP%20Untuk%20Anak%20Petani%20dan%20Nelayan.%0A%0A%E2%80%A8%E2%80%A8Senilai%20Rp.%20_tulis%20nominal%20transfer_%E2%80%A8%0A%0ATransfer%20melalui%20rekening%3A%0ABank%20Syariah%20Indonesia%20%28BSI%29%0ANo%20%3A%207168079863%0Aa.n%20%3A%20AKSI%20PANGAN%0A%0A%E2%80%A8Terimakasih" target="_blank" class="btn btnWhite btnMin align-top p-0 border-0 position-relative" data-hover="Melalui Whatsapp">
                                        <span class="d-block btnText"><i class="fab fa-whatsapp mr-2"></i>Whatsapp</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>