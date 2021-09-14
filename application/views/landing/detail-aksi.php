<main>
    <!-- bannerSec / bannerSecII -->
    <section class="bannerSec bannerSecII d-flex position-relative overflow-hidden">
        <div class="alignCenter w-100 d-flex align-items-center">
            <div class="container pt-15 py-md-10 pt-lgwd-25 pb-lgwd-10">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="captionWrap position-relative">
                            <h1 class="text-white fwSemibold mb-2">
                                <span class="d-block"><?= $aksi->judul ?></span>
                            </h1>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="list-unstyled cbbPageList fontCabin text-capitalize d-flex mb-0 p-0">
                            <li>
                                <a href="<?= site_url() ?>">Beranda</a>
                            </li>
                            <li>
                                <a href="<?= site_url('aksi') ?>">Aksi</a>
                            </li>
                            <li><?= $aksi->judul ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <span class="bgImg bgCover position-absolute" style="background-image: url(<?= base_url('assets/landing') ?>/images/banner/banner-mini100.png)"></span>
    </section>
    <!-- causesGridSection -->
    <div class="causesGridSection py-10 py-md-15 pt-lg-17">
        <div class="container">
            <div class="row">
                <!-- BlogPostListingSection --> 
                <div class="col-12 col-md-7 col-lg-8 mx-auto">
                    <div class="row justify-content-center">
                        <!-- latNewsPost -->
                        <div class="col-12">
                            <article id="content" class="mb-5">
                                <!-- causeGridCol -->
                                <div class="causeGridCol casueGridSinglePost d-flex w-100 bg-white fontCabin hasShadow rounded-lg">
                                    <div class="d-flex flex-column w-100 position-relative">
                                        <!-- cgColImg -->
                                        <div class="cgColImg overflow-hidden position-relative">
                                            <img src="<?= base_url('assets/img/aksi/' . $aksi->cover) ?>" class="img-fluid w-100" alt="image description">
                                            <!-- <span class="donarsCountNumber fsSmall fontCabin text-white">10 Donars</span> -->
                                        </div>
                                        <!-- cgColDetail -->
                                        <div class="cgColDetail px-3 px-lg-5 pt-3 pb-3">
                                            <div class="row mt-2 pb-2">
                                                <div class="col">
                                                    <span class="text-left text-black"><strong>Terkumpul</strong></span>
                                                    <span class="d-block text-left"><i class="fa fa-wallet mr-1 text-info"></i> Rp. 0</span>
                                                </div>
                                                <div class="col-5">
                                                    <span class="text-left text-black"><strong>Sisa Hari</strong></span>
                                                    <!-- <span class="d-block text-left"><i class="fa fa-calendar-day mr-1 text-danger"></i> 31 Hari</span> -->
                                                    <span class="d-block text-left"><i class="fa fa-calendar-day mr-1 text-danger"></i> ∞</span>
                                                </div>
                                            </div>
                                            <h4 class="h4 cgColTitle mb-5 fwSemibold mt-3"><?= $aksi->judul ?></h4>
                                            <!-- cgspTabList -->
                                            <ul class="nav nav-tabs fwSemibold cgspTabList justify-content-between justify-content-sm-start" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="tab01" data-toggle="tab" href="#cgspDeskripsi" role="tab" aria-controls="cgspDeskripsi" aria-selected="true">Deskripsi</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab02" data-toggle="tab" href="#cgspFoto" role="tab" aria-controls="cgspFoto" aria-selected="false">Foto</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab03" data-toggle="tab" href="#cgspOrangBaik" role="tab" aria-controls="cgspOrangBaik" aria-selected="false">Orang Baik</a>
                                                </li>
                                            </ul>
                                            <!-- tab-content -->
                                            <div class="tab-content pt-5" id="myTabContent">
                                                <div class="tab-pane fade show active" id="cgspDeskripsi" role="tabpanel" aria-labelledby="tab01">
                                                    <p><?= $aksi->deskripsi ?></p>
                                                </div>
                                                <div class="tab-pane fade" id="cgspFoto" role="tabpanel" aria-labelledby="tab02">
                                                    <div class="row mb-5 mb-sm-10 mx-sm-n2">
                                                        <div class="col-12 col-sm-6 px-sm-2">
                                                            <!-- imgWarp -->
                                                            <div class="imgWarp mb-3">
                                                                <img src="http://placehold.it/410x250" class="img-fluid" alt="image description">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 px-sm-2">
                                                            <!-- imgWarp -->
                                                            <div class="imgWarp mb-3">
                                                                <img src="http://placehold.it/410x250" class="img-fluid" alt="image description">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 px-sm-2">
                                                            <!-- imgWarp -->
                                                            <div class="imgWarp mb-3">
                                                                <img src="http://placehold.it/410x250" class="img-fluid" alt="image description">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 px-sm-2">
                                                            <!-- imgWarp -->
                                                            <div class="imgWarp mb-3">
                                                                <img src="http://placehold.it/410x250" class="img-fluid" alt="image description">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="cgspOrangBaik" role="tabpanel" aria-labelledby="tab03">
                                                    <!-- cDonRow -->
                                                    <div class="row cDonRow mb-2 mx-md-n2">
                                                        <div class="col-12 col-md-6 col d-flex px-md-2">
                                                            <!-- cDonCol -->
                                                            <div class="cDonCol rounded d-flex align-items-center w-100 py-4 px-5">
                                                                <span class="cDonImgWrap rounded-circle position-relative overflow-hidden d-flex justify-content-center align-items-center mr-3">KD</span>
                                                                <div class="cDonarInfoWrap">
                                                                    <strong class="cDonarName fwNormal d-block">Khon Deck</strong>
                                                                    <span class="cDonatationAmount d-block">Donated: $100.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col d-flex px-2">
                                                            <!-- cDonCol -->
                                                            <div class="cDonCol rounded d-flex align-items-center w-100 py-4 px-5">
                                                                <span class="cDonImgWrap rounded-circle position-relative overflow-hidden d-flex justify-content-center align-items-center mr-3">AN</span>
                                                                <div class="cDonarInfoWrap">
                                                                    <strong class="cDonarName fwNormal d-block">Amna Rose</strong>
                                                                    <span class="cDonatationAmount d-block">Donated: $32.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col d-flex px-2">
                                                            <!-- cDonCol -->
                                                            <div class="cDonCol rounded d-flex align-items-center w-100 py-4 px-5">
                                                                <span class="cDonImgWrap rounded-circle position-relative overflow-hidden d-flex justify-content-center align-items-center mr-3">DR</span>
                                                                <div class="cDonarInfoWrap">
                                                                    <strong class="cDonarName fwNormal d-block">Decko Rasa</strong>
                                                                    <span class="cDonatationAmount d-block">Donated: $15.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col d-flex px-2">
                                                            <!-- cDonCol -->
                                                            <div class="cDonCol rounded d-flex align-items-center w-100 py-4 px-5">
                                                                <span class="cDonImgWrap rounded-circle position-relative overflow-hidden d-flex justify-content-center align-items-center mr-3">M</span>
                                                                <div class="cDonarInfoWrap">
                                                                    <strong class="cDonarName fwNormal d-block">Merlin</strong>
                                                                    <span class="cDonatationAmount d-block">Donated: $5.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col d-flex px-2">
                                                            <!-- cDonCol -->
                                                            <div class="cDonCol rounded d-flex align-items-center w-100 py-4 px-5">
                                                                <span class="cDonImgWrap rounded-circle position-relative overflow-hidden d-flex justify-content-center align-items-center mr-3">KA</span>
                                                                <div class="cDonarInfoWrap">
                                                                    <strong class="cDonarName fwNormal d-block">Kavi Aarun</strong>
                                                                    <span class="cDonatationAmount d-block">Donated: $50.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 col d-flex px-2">
                                                            <!-- cDonCol -->
                                                            <div class="cDonCol rounded d-flex align-items-center w-100 py-4 px-5">
                                                                <span class="cDonImgWrap rounded-circle position-relative overflow-hidden d-flex justify-content-center align-items-center mr-3">PT</span>
                                                                <div class="cDonarInfoWrap">
                                                                    <strong class="cDonarName fwNormal d-block">Piease Taro</strong>
                                                                    <span class="cDonatationAmount d-block">Donated: $150.00</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-5 mb-md-10">
                                                        <div class="col-12 text-center">
                                                            <a href="javascript:void(0);" class="txtLink fwSemibold fsSmall">Load More&hellip;</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btnPrimary btnMin align-top p-0 border-0 position-relative btn-block mb-5" data-hover="Donasi Seakrang">
                                                <span class="d-block btnText">Donasi Sekoarang</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- widget/.widgetShare -->
                                <div class="widget widgetShare text-center mb-0 py-7 py-md-12">
                                    <h4 class="h4 fwSemibold mb-5">Share this Post</h4>
                                    <!-- shareSocialLinks -->
                                    <ul class="list-unstyled shareSocialLinks d-flex flex-wrap justify-content-center fontCabin mb-0 pl-0 text-capitalize">
                                        <li>
                                            <a href="javascript:void(0);" class="sslinks facebook">
                                                <strong class="text fwSemibold">Facebook</strong>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="sslinks twitter">
                                                <strong class="text fwSemibold">Twitter</strong>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="sslinks google">
                                                <strong class="text fwSemibold">Google</strong>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="sslinks instagram">
                                                <strong class="text fwSemibold">Instagram</strong>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>