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
								<form action="<?= site_url('home/actionConfirm') ?>" method="POST">
									<input type="hidden" name="rbt" value="">
									<input type="hidden" name="idaksi" value="<?= $aksi->id ?>">
									<div class="form-row mb-0">
										<label class="col colFormLabel col-12 text-black fwSemibold"><span class="d-block mb-1">Buat Aksi Baikmu Hari Ini</span></label>
										<!-- form-group  -->
										<div class="form-group col-12 mb-0">
											<label class="wdFromLabel d-block">Pilih Nominal<span class="text-danger fsSmall"> *</span></label>
											<div class="form-check form-check-inline">
												<span class="customRadioTabBtnLabel">
													<input class="form-check-input customRadioInput" type="radio" name="donationAmountSelection" value="10000" id="donationAmount1" checked="">
													<label class="form-check-label cuFakeLabel" style="width: 80px !important;" for="donationAmount1">10 rb</label>
												</span>
											</div>
											<div class="form-check form-check-inline">
												<span class="customRadioTabBtnLabel">
													<input class="form-check-input customRadioInput" type="radio" name="donationAmountSelection" value="50000" id="donationAmount2">
													<label class="form-check-label cuFakeLabel" style="width: 80px !important;" for="donationAmount2">50 rb</label>
												</span>
											</div>
											<div class="form-check form-check-inline">
												<span class="customRadioTabBtnLabel">
													<input class="form-check-input customRadioInput" type="radio" name="donationAmountSelection" value="100000" id="donationAmount3">
													<label class="form-check-label cuFakeLabel" style="width: 80px !important;" for="donationAmount3">100 rb</label>
												</span>
											</div>
											<div class="input-group mt-1 mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="donation-total-amount">Rp.</span>
												</div>
												<input type="text" class="form-control rounded-right" name="donationAmountManual" placeholder="Nominal Lain">
											</div>
										</div>
									</div>
									<div class="form-row">
										<!-- form-group  -->
										<div class="form-group mb-3 col-12">
											<label class="wdFromLabel d-block">Nama Lengkap<span class="text-danger fsSmall"> *</span></label>
											<input type="text" class="form-control rounded" placeholder="Nama lengkapmu" name="nama" required> 
										</div>
									</div>
									<div class="form-row">
										<!-- form-group  -->
										<div class="form-group col-12">
											<label class="wdFromLabel d-block">Whatsapp/Telphone<span class="text-danger fsSmall"> *</span></label>
											<input type="email" class="form-control rounded" name="email" required>
										</div>
									</div>
									<div class="form-row">
										<!-- form-group  -->
										<div class="form-group col-12">
											<label class="wdFromLabel d-block">Whatsapp/Telphone<span class="text-danger fsSmall"> *</span></label>
											<input type="number" class="form-control rounded" placeholder="08xxxxxxxxxx" name="nowa" required>
										</div>
									</div>
									<div class="form-row mb-3">
										<label class="col colFormLabel text-black fwSemibold mb-2 pb-1"><span class="borderLight borderBottomLight d-block pb-1">Metode Pembayaran</span></label>
										<!-- form-group  -->
										<div class="form-group col-12">
											<div class="form-check form-check-inline">
												<span class="customRadioBtnLabel">
													<input class="form-check-input customRadioInput" type="radio" name="donationPaymentOptions" id="paymentOption1" checked="" value="tf">
													<label class="form-check-label cuFakeLabel" for="paymentOption1">Transfer Bank</label>
												</span>
											</div>
											<div class="form-check form-check-inline">
												<span class="customRadioBtnLabel">
													<input class="form-check-input customRadioInput" type="radio" name="donationPaymentOptions" id="paymentOption2" value="qris">
													<label class="form-check-label cuFakeLabel" for="paymentOption2">QRIS</label>
												</span>
											</div>
										</div>
										<!-- <div class="form-group col-12">
											<label class="wdFromLabel d-block">Donasi Sebagai Anonim</label>
											<input type="checkbox" class="form-control rounded" name="hide" value="1">
										</div> -->
									</div>
									<div class="form-row">
										<!-- form-group  -->
										<div class="form-group mb-1 col-12">
											<button type="submit" class="btn btnPrimary w-100 align-top p-0 border-0 position-relative" data-hover="Klik Untuk Donasi">
												<span class="d-block btnText">Donasi Sekarang</span>
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