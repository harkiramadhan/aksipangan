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
			<!-- pageHeader -->
			<header id="pageHeader">
				<div class="hdTopBar py-2 bg-secondary">
					<div class="container clearfix position-relative">
						<div class="row">
							<div class="col-6 col-lg-5 overflow-hidden">
								<!-- topBarContactList -->
								<ul class="list-unstyled topBarContactList align-items-center mb-0">
									<li>
										<a href="https://wa.me/628118448335" target="_blank" class="text-white">
											<i class="fab fa-whatsapp text-white"><span class="sr-only">icon</span></i>
											<span class="d-none d-md-inline ml-2">08118448335</span><span class="ml-2">/</span>
										</a>
										<a href="mailto:aksi.pangan@gmail.com" class="text-white ml-2">
											<i class="fas fa-envelope text-white"><span class="sr-only">icon</span></i>
											<span class="d-none d-md-inline ml-2">aksi.pangan@gmail.com</span>
										</a>
									</li>
								</ul>
							</div>
							<div class="col-6 col-lg-7 d-flex justify-content-end position-static">
								<!-- socialNetworks -->
								<ul class="list-unstyled socialNetworks m-0 p-0 d-none d-lg-flex align-items-center justify-content-center ftSocialLinks">
									<li>
										<a href="https://www.instagram.com/aksipangan/"><i class="fab fa-instagram icn text-center text-white"><span class="sr-only">icon</span></i></a>
									</li>
									<li>
										<a href="https://www.facebook.com/aksipangan/"><i class="fab fa-facebook icn text-center text-white"><span class="sr-only">icon</span></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- sticky-wrap-headerFixer -->
				<div class="sticky-wrap-headerFixer bg-white w-100">
					<div class="headerFixer">
						<div class="container clearfix align-items-center">
							<div class="row">
								<div class="col-12 d-flex align-items-center py-lg-0 py-3">
									<!-- mainLogo -->
									<div class="logo">
										<a href="<?= site_url('') ?>">
											<img src="<?= base_url('assets/landing/') ?>images/brand/logo-primary.png" class="img-fluid" alt="aksi-pangan" style="max-width: 200px;">
										</a>
									</div>
									<!-- menuHolder -->
									<div class="d-flex menuHolder justify-content-end align-items-center flex-grow-1">
										<!-- navbar -->
										<nav class="navbar navbar-expand-md navbar-dark navHolder navbar-light p-0 position-static">
											<div class="collapse navbar-collapse navCollapse" id="navBarOpener">
												<!-- navbar-nav -->
												<ul class="navbar-nav mr-auto pageMainNavigation">
													<li class="nav-item">
														<a class="nav-link dropdown-toggle active"  role="button" href="<?= site_url() ?>">Beranda</a>
													</li>
													<li class="nav-item">
														<a class="nav-link dropdown-toggle"  role="button" href="<?= site_url('aksi') ?>">Aksi Baik</a>
													</li>
												</ul>
											</div>
											<!-- <a href="10-Donate.html" class="btn btnPrimary align-top hdBtn p-0 border-0 position-relative" data-hover="Klik Donasi">
												<span class="d-block btnText">Donasi Sekarang<i class="fas fa-heart ml-2"></i></span>
											</a> -->
											<button class="navbar-toggler navOpener ml-2 border-secondary" type="button" data-toggle="collapse" data-target="#navBarOpener" aria-controls="navBarOpener" aria-expanded="false" aria-label="Toggle navigation">
												<span class="navbar-toggler-icon border-secondary"></span>
											</button>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>
