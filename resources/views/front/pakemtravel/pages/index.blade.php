@extends('front.pakemtravel.layouts.main')

@section('title', $menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $page->keyword)
@section('description', strip_tags(str_limit($page->content, 250)))
@section('image', $page->image)

@section('contents')



	<div class="main-container">
	
		<div class="container-fluid no-left-padding no-right-padding page-banner" style="background: #000BA7 url({{ url("resources/uploaded")."/".$page->image }}) no-repeat center; background-size: cover;">
			<div class="container">
				<h3 style="color: #fff">{{ $page->title }}</h3>
			</div>
		</div>
	
		<main class="site-main">

			@if($page->id === 4)
				<div class="container-fluid no-left-padding no-right-padding portfolio-single">
					{{--  <div class="container">  --}}
						<?php echo $page->content; ?>
					{{--  </div>  --}}
				</div>
				
			@else
				<!-- Services Section -->
				<div class="container" style="margin-bottom: 50px;">
					<?php echo $page->content; ?>
				</div>
			@endif		

			@if($page->id === 4)
				<!-- Services Section -->
			<div class="container-fluid no-left-padding no-right-padding services-section3">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Teknik <span>Pelaksanaan</span></h3>
						<p>There are many variations of passages of Lorem Ipsum available</p>
					</div><!-- Section Header /- -->
					<!-- Row -->
					<div class="row">
						<div class="col-xs-12">
							<div class="col-sm-6 col-xs-12 no-padding">
								<div class="srv-box">
									<span><i class="lnr">1</i></span>
									<h3>Rekening Peserta</h3>
									<p>Peserta segera membuka rekening paling lambat 15 (lima belas) hari setelah resmi terdaftar dengan saldo awal &nbsp;sesuai dengan paket yang dipilih.</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-sm-6 col-xs-12 no-padding">
								<div class="srv-box">
									<span><i class="lnr">2</i></span>
									<h3>Pemberangkatan</h3>
									<p>Sistem pemberangkatan dilaksanakan setiap tahun sebanyak 24 (dua puluh empat) orang dengan memilih &nbsp;2 (dua) orang peserta setiap bulannya</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-sm-6 col-xs-12 no-padding">
								<div class="srv-box">
									<span><i class="lnr">3</i></span>
									<h3>Pemilihan Peserta</h3>
									<p>Sistem pemilihan peserta dengan cara pencabutan nomor urut calon jamaah yang dilaksanakan lewat media elektronic &nbsp;yang disaksikan oleh Notaris.</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-sm-6 col-xs-12 no-padding">
								<div class="srv-box">
									<span style="background-color: #2c2bd6;"><i class="lnr" style="color: #fff;">4</i></span>
									<h3 style="color: #000BA7;"><b><i>Peserta Terpilih</i></b></h3>
									<p style="color: #000BA7;"><b><i>Peserta yang telah terpilih , tidak diwajibkan lagi menabung untuk bulan selanjutnya sampai masa pelaksanaan berakhir</i></b></p>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-sm-6 col-xs-12 no-padding">
								<div class="srv-box">
									<span><i class="lnr">5</i></span>
									<h3>Sisa Peserta</h3>
									<p>Peserta yang tersisa pada tahun terakhir pelaksanaan, akan diberangkatkan secara &nbsp;serentak.</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-sm-6 col-xs-12 no-padding">
								<div class="srv-box">
									<span><i class="lnr">6</i></span>
									<h3>Pewarisan Peserta</h3>
									<p>Peserta yang meninggal dunia, dapat diwariskan ke ahli waris yg ditunjuk dan diberikan uang duka dari pihak asuransi yang bekerjasama dengan penyelenggara.</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-sm-6 col-xs-12 no-padding">
								<div class="srv-box">
									<span><i class="lnr">7</i></span>
									<h3>Pengunduran Diri</h3>
									<p>Peserta yang mengundurkan diri dengan alasan sesuatu hal, bisa digantikan dengan peserta baru</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-sm-6 col-xs-12 no-padding">
								<div class="srv-box">
									<span><i class="lnr">8</i></span>
									<h3>Keterlambatan Setoran</h3>
									<p>Peserta yang terlambat setoran tabungan dari batas waktu yang telah ditetapkan, tidak akan diikutkan dalam pencabutan nomor urut</p>
								</div>
							</div>
						</div>
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</div><!-- Services Section /- -->
			@endif
			

		</main>
		
	</div>

@endsection
