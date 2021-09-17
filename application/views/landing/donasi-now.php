<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the page title -->
	<title><?= $title ?> - Aksipangan.com </title>
	<meta name="description" content="Aksi menebar kebaikan untuk mampu membantu masyaratkat dalam segala hal khususnya kebutuhan pangan.">
	<meta name="keywords" content="aksi, pangan, aksipangan, donasi, aksi kebaikan">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="facebook-domain-verification" content="7mr661tn7v2kfjep8ulw0sb6mnuk8o" />

	<link rel="shortcut icon" href="<?= base_url('assets/landing/') ?>images/brand/logo100.svg" type="image/svg">
	<!-- inlcude google cabin font cdn link -->
	<link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<!-- inlcude google nunito font cdn link -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital@0;1&display=swap" rel="stylesheet">
	<!-- include the site bootstrap stylesheet -->
	<link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/bootstrap.css">
	<!-- include the site fontawesome stylesheet -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="<?= base_url('assets/landing/') ?>style.css">
	<!-- include theme color setting stylesheet -->
	<link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/colors.css">
	<!-- include the site responsive stylesheet -->
	<link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/responsive.css">

	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '543920057035740');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=543920057035740&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->
</head>
<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<div class="phTopWrap">
			<header id="pageHeader">
				<!-- sticky-wrap-headerFixer -->
				<div class="sticky-wrap-headerFixer bg-white w-100">
					<div class="headerFixer">
						<div class="container clearfix align-items-center">
							<div class="row">
								<div class="col-12 col-md-7 col-lg-8 mx-auto my-3 d-flex align-items-center">
									<!-- menuHolder -->
									<a href="#"><i class="fas fa-arrow-left"></i></a>
									<p class="mb-0 ml-auto"><?= $aksi->judul ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>
		<main>
			<!-- causesGridSection -->
			<div class="causesGridSection py-10 py-md-15 pt-lg-17 mt-4">
				<div class="container">
					<div class="row">
						<!-- BlogPostListingSection --> 
						<div class="col-12 col-md-7 px-lg-7 mx-auto">
							<!-- widgetForm  -->
							<aside class="widget widgetForm mb-0 fontCabin mt-0 bg-white hasShadow rounded overflow-hidden">
								<div class="px-3 py-3 border rounded mb-3">
									<p class="h6">ID DONASI #<?= str_pad($data['id'], 7, "0", STR_PAD_LEFT) ?></p>
									<div class="d-flex">
										<p class="mb-0 w-25 text-left">Nama</p>
										<p class="mb-0 text-left">: <?= $data['nama'] ?></p>
									</div>
									<div class="d-flex">
										<p class="mb-0 w-25 text-left">Nomor</p>
										<p class="mb-0 text-left">: <?= $data['nowa'] ?></p>
									</div>
									<div class="d-flex">
										<p class="mb-0 w-25 text-left">Email</p>
										<p class="mb-0 text-left">: <?= $data['email'] ?></p>
									</div>
									
								</div>
								<label class="text-center col colFormLabel col-12 text-black fwSemibold"><span class="d-block mb-1">Instruksi Pembayaran										</span></label>
								<p class="text-center">Transfer sesuai nominal di bawah ini:</p>
								<h2 class="text-center">
									<span>Rp</span>&nbsp;<span class=""><?= rupiah($data['nominal']) ?></span>
								</h2>
								
								<?php if($data['payment_option'] == 'tf'): ?>
									<?php foreach($payment_method as $p){ ?>
										<p class="">ke rekening <strong><?= $p->rekening ?> a.n <?= $p->nama ?></strong></p>
										<div class="d-flex align-items-center px-3 py-2 border rounded mb-3">
											<img alt="bank" src="https://assets.kitabisa.cc/images/banks/bca.png" style="width: 80px; height: auto;">
											<h5 class="mb-0 mx-auto" font-size="16px" font-weight="bold" class=""><?= $p->nomor ?></h5>
											<span class="">Salin</span>
										</div>
									<?php } ?>
								<?php elseif($data['payment_option'] == 'qris'): ?>
									<div class="text-center">
										<p class="text-center"><strong>Bayar Dengan QRIS Sesuai Nominal Di Atas</strong></p>
										<img alt="bank" src="<?= base_url('assets/img/qris-aksipangan.jpeg') ?>" style="width: 100%; height: auto;">
									</div>
								<?php endif; ?>
								<p class="text-center mb-2">Upload bukti transfer:</p>
								<form action="<?= site_url('home/uploadBukti') ?>" method="post" enctype='multipart/form-data'>
								<input type="hidden" name="donateid" value="<?= $this->uri->segment(3) ?>">
								<div class="custom-file mb-3">
									<input type="file" class="custom-file-input" id="customFile" name="img">
									<label class="custom-file-label" for="customFile">Pilih bukti</label>
								</div>
								<div class="form-row">
									<!-- form-group  -->
									<div class="form-group mb-1 col-12">
										<button type="submit" class="btn btnPrimary w-100 align-top p-0 border-0 position-relative" data-hover="Klik Untuk Selesai">
											<span class="d-block btnText">Donasi Selesai</span>
										</button>
									</div>
								</div>
								</form>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- back top of the page -->
		<span id="back-top" class="text-center fa fa-caret-up"></span>
		<!-- loader of the page -->
		<div id="loader" class="loader-holder">
			<div class="block"><img src="<?= base_url('assets/landing/') ?>images/svg/hearts.svg" width="100" alt="loader"></div>
		</div>
	</div>
	<!-- include jQuery library -->
	<script src="<?= base_url('assets/landing/') ?>js/jquery-3.4.1.min.js"></script>
	<!-- include bootstrap popper JavaScript -->
	<script src="<?= base_url('assets/landing/') ?>js/popper.min.js"></script>
	<!-- include bootstrap JavaScript -->
	<script src="<?= base_url('assets/landing/') ?>js/bootstrap.min.js"></script>
	<!-- include custom JavaScript -->
	<script src="<?= base_url('assets/landing/') ?>js/jqueryCustom.js"></script>
	<!-- isotope JavaScript -->
	<script src='https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'></script>
</body>
</html>