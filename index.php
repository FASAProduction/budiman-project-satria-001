<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
    
    <!DOCTYPE html>
	<html lang="id" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>P.O Budiman Official Website</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">			
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="./"><img src="img/budiman.png" alt="" title="" width="110" height="60" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="./">Home</a></li>
				          <li><a href="about.html">Tentang Kami</a></li>
				          <li><a href="cars.html">Paket Tujuan</a></li>	
				          <li><a href="contact.html">Contact</a></li>			          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-7 col-md-6 ">
							<h6 class="text-white ">Selamat Datang di Website P.O Budiman</h6>
							<h1 class="text-white text-uppercase">
								Nikmati Perjalanan Anda Hari Ini!				
							</h1>
							<p class="pt-20 pb-20 text-white">
                                Segera pesan sekarang dengan mengisi formulir data di samping, dan jangan sampai ketinggalan momen berharga Anda!
							</p>
							<a href="#" class="primary-btn text-uppercase">Pesan Sekarang!</a>
						</div>
						<div class="col-lg-5  col-md-6 header-right">
							<h4 class="text-white pb-30">Pesan Bus Sekarang!</h4>
							<form class="form" role="form" autocomplete="off">
                                <div class="from-group">
							    	<input class="form-control txt-field" type="text" name="nama_pelanggan" placeholder="Nama Lengkap">
							    	<input class="form-control txt-field" type="textarea" name="alamat" placeholder="Alamat">
							    </div>
							    <div class="form-group">
							       	<div class="default-select" id="default-select"">
										<select>
											<option value="" disabled selected hidden>Jenis Kelamin</option>
											<option value="Pria">Pria</option>
											<option value="Wanita">Wanita</option>
										</select>
									</div>
                                </div>
                                <div class="from-group">
							    	<input class="form-control txt-field" type="text" name="usia" placeholder="Usia Anda">
							    </div>
							    <div class="from-group">
							    	<input class="form-control txt-field" type="text" name="jml_penumpang" placeholder="Jumlah Penumpang">
							    </div>
							    <div class="form-group row">
							        <div class="col-md-6 wrap-left">
								       	<div class="default-select" id="default-select"">
											<select>
												<option value="" disabled selected hidden>Tujuan</option>
												<option value="1">Yogyakarta (YK)</option>
												<option value="2">Solo (SLO)</option>
												<option value="3">Bekasi (BKS)</option>
												<option value="4">Depok (DPK)</option>
											</select>
										</div>
							        </div>
							        <div class="col-md-6 wrap-right">
										<div class="input-group dates-wrap">                                              
											<input id="datepicker2" class="dates form-control" id="exampleAmount" placeholder="Tgl Berangkat" type="text">                        
											<div class="input-group-prepend">
												<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
											</div>											
										</div>
							        </div>
							    </div>
							    <div class="form-group row">
							        <div class="col-md-12">
							            <button type="reset" class="btn btn-default btn-lg btn-block text-center text-uppercase">Pesan Sekarang!</button>
							        </div>
							    </div>
							</form>
						</div>											
					</div>
				</div>					
			</section>
			<!-- End banner Area -->		

			<!-- Start model Area -->
			<section class="model-area section-gap" id="cars">
				<div class="container">
					<div class="row d-flex justify-content-center pb-40">
						<div class="col-md-8 pb-40 header-text">
							<h1 class="text-center pb-10">Pilih Tujuan Anda</h1>
							<p class="text-center">
								Bisa juga memesan dengan paket tujuan yang telah tersedia.
							</p>
						</div>
					</div>				
					<div class="active-model-carusel">
                        <?php
						 $kon = mysqli_connect("localhost","root","","budiman") or die("Gagal");
						 $query = mysqli_query($kon, "select kd_tujuan, nama_tujuan, harga, tgl_berangkat, jam from jadwal_keberangkatan join tujuan on jadwal_keberangkatan.id_tujuan=tujuan.id_tujuan") or die("Gagal query");
						 while($r = mysqli_fetch_assoc($query)){ ?>
						<div class="row align-items-center single-model item">
							<div class="col-lg-6 model-left">
								<div class="title justify-content-between d-flex">
									<h4 class="mt-20">Yogyakarta (YK) - <?=$r['nama_tujuan'];?> (<?=$r['kd_tujuan'];?>)</h4>
									<h3><?= rupiah($r['harga']);?></h3>
								</div>
								<p>
									Tanggal Berangkat           : <?=$r['tgl_berangkat'];?> <br>
                                    Jam                         : <?=$r['jam'];?> <br>
								</p>
								<a class="text-uppercase primary-btn" href="#">Pesan</a>
							</div>
							<div class="col-lg-6 model-right">
								<img class="img-fluid" src="img/car.jpg" alt="">
							</div>
						</div>
                            <?php } ?>												
					</div>
				</div>	
			</section>
			<!-- End model Area -->						


			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Quick links</h6>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Features</h6>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Resources</h6>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>								
							</div>
						</div>												
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
										<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
			                            	<button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
			                            	<div style="position: absolute; left: -5000px;">
												<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
											</div>

										<div class="info"></div>
									</form>
								</div>
							</div>
						</div>	
						<p class="mt-50 mx-auto footer-text col-lg-12">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>											
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>			
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>



