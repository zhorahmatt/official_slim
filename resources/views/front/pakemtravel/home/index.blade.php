@extends('front.pakemtravel.layouts.main')

@section('contents')
<div id="home_slider_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="home-slider-3" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
	<!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
	<div id="home_slider_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
	<ul>
		@foreach ($slideshow as $slide)
		<!-- SLIDE  -->
		<li data-index="rs-1" data-transition="fade,random-premium,random-static,random" data-slotamount="default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default,default,default,default" data-easeout="default,default,default,default" data-masterspeed="300,default,default,default" data-thumb="" data-rotate="0,0,0,0" data-saveperformance="off" class="" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
			<!-- MAIN IMAGE -->
			<img src="{{ url('resources/uploaded') }}/{{ $slide->image }}" data-bgcolor='#f1f1f1' style='background:#f1f1f1' alt="" title="slide-3"  width="1920" height="810" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
			
			<!-- LAYER NR. 1 -->
			<div class="tp-caption tp-resizeme" id="slide-1-layer-1" 
				data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
				data-y="['middle','middle','middle','middle']" data-voffset="['-75','-43','-60','-50']" 
				data-fontsize="['50','50','43','31']"
				data-lineheight="['55','55','40','40']"
				data-letterspacing="['7.5','7.5','3.5','2.5']"
				data-width="none"
				data-height="none"
				data-whitespace="nowrap"			 
				data-type="text" 
				data-responsive_offset="on" 
				data-frames='[{"delay":10,"speed":2000,"sfxcolor":"#ffffff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
				data-textAlign="['inherit','inherit','inherit','inherit']"
				data-paddingtop="[0,0,0,0]"
				data-paddingright="[0,0,0,0]"
				data-paddingbottom="[0,0,0,0]"
				data-paddingleft="[0,0,0,0]"
				style="z-index: 5; white-space: nowrap; font-size: 50px; line-height: 55px; font-weight: 700; color: #fff; letter-spacing: 7.5px;font-family:PT Sans;text-transform:uppercase;">{{ $slide->title }}    
			</div>
		</li>
		@endforeach
	</ul>
	<div class="tp-bannertimer" style="height: 5px; background: rgba(0,0,0,0.15);"></div>	</div>
</div><!-- END REVOLUTION SLIDER -->


{{--  <div class="main-word">
	<div class="container">
		Setiap muslim pasti merindukan BAITULLAH, sempurnakan kerinduan Anda pada BAITULLAH dengan ibadah Umrah. Tabungan Umrah PT. PAKEM TRAVEL kini hadir membantu anda untuk menyempurnakan niat anda beribadah dan berziarah ke BAITULLAH. Dengan Program Tabungan Umroh Berjangka, Terjangkau dan Terbatas yang diselenggarakan oleh PT. PANDI KENCANA MURNI Travel.
	</div>
</div>  --}}


<div class="container-fluid no-left-padding no-right-padding about-section">
	<!-- Container -->
	<div class="container">
		<!-- Row -->
		<div class="row">
			<div class="col-md-7 about-content">
				<!-- Section Header -->
				<div class="section-header">
					<h3><span>Tabungan Umrah</span> Sejuta Ummat</h3>
					<p>Berjangka, Terjangkau & Terbatas</p>
				</div><!-- Section Header /- -->
				<div id="skill_type-1" class="skill-block">
					<p>Setiap muslim pasti merindukan BAITULLAH, sempurnakan kerinduan Anda pada BAITULLAH dengan ibadah Umrah.  PT. PANDI KENCANA MURNI Travel kini hadir membantu anda untuk menyempurnakan niat anda beribadah dan berziarah ke BAITULLAH dengan program TABUNGAN UMROH SEJUTA UMMAT</p>
					<div class="skill-progress-box">
						<h3 class="block-title">Maksud dan Tujuan</h3>
					</div>
					<p>1. Merealisasikan niat beribadah ke BAITULLAH melalui ibadah UMROH dengan cara menabung tanpa harus membayar angsuran setelah menunaikan ibadah UMROH.</p><br>
					<p>2. Merealisasikan niat beribadah ke BAITULLAH melalui ibadah UMROH dengan Tenang, Nyaman , Murah dan Berkah karena sesui syariah.</p>
					
					<div class="skill-progress-box">
						<h3 class="block-title">apa itu Berjangka, Terjangkau & Terbatas ?</h3>
						<h3 class="block-title">Bagaimana Teknik Pelaksanaannya ?</h3>
					</div>
					
					<a href="{{ url('page/teknik-pelaksanaan') }}" title="Learn More">Klik Disini</a>
				</div>
			</div>
		</div><!-- Row -->
	</div><!-- Container /- -->
	<div class="abt-img">
		<img src="{{ url('resources/uploaded') }}/home_banner.jpg" alt="About">
	</div>
</div>

<!-- Counter Section -->
<div id="counter-section" class="container-fluid no-left-padding no-right-padding counter-section counter-style-1">
	<!-- Container -->
	<div class="container">
		<!-- Row -->
		<div class="row">
			<div id="counter_type-1">
				<div class="col-md-offset-3 col-md-3">
					<div class="counter-box">
						<i class="fa fa-trophy" style="color: #fff;"></i>
						<span id="count_1_box-1" data-skills_percent="{{ $visitors_count }}"></span>
						<h4>Pengunjung</h4>
					</div>
				</div>
				<div class="col-md-3">
					<div class="counter-box">
						<i class="fa fa-users" style="color: #fff;"></i>
						<span id="count_1_box-2" data-skills_percent="9"></span>
						<h4>Perwakilan Cabang</h4>
					</div>
				</div>
			</div>
		</div><!-- Row /- -->
	</div><!-- Container /- -->
</div><!-- Counter Section /- -->

<!-- Client Section -->
<div class="container-fluid no-left-padding no-right-padding client-section gray-bg">
	<!-- Container -->
	<div class="container">
		<!-- Section Header -->
		<div class="section-header">
			<h3><span>Penghargaan</span></h3>
		</div><!-- Section Header /- -->
		<div class="">
			<div class="col-md-4 col-xs-6">
				<a href="#"><img src="{{ url('resources/assets/front/pakemtravel') }}/images/1.jpg" alt="Penghargaan" /></a>
			</div>
			<div class="col-md-4 col-xs-6">
				<a href="#"><img src="{{ url('resources/assets/front/pakemtravel') }}/images/2.jpg" alt="Penghargaan" /></a>
			</div>
			<div class="col-md-4 col-xs-6">
				<a href="#"><img src="{{ url('resources/assets/front/pakemtravel') }}/images/3.jpg" alt="Penghargaan" /></a>
			</div>
		</div>
	</div><!-- Container /- -->
</div><!-- Client Section /- -->

<!-- Call To Action Section -->
<div class="container-fluid no-left-padding no-right-padding call-to-action-section">
	<!-- Container -->
	<div class="container">
		<div class="call-to-action-block">
			<h3>anda ingin Bermitra dengan kami?</h3>
			<a href="#" class="learn-more" title="Learn More">Hubungi {{ $setting->phone }}</a>
			<h4>atau datang langsung ke <a href="{{ url('/page/kantor-kantor') }}">kantor perwakilan</a> terdekat kami.</h3>			
		</div>
	</div><!-- Container /- -->
</div><!-- Call To Action Section /- -->

@endsection