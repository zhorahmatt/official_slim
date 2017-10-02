<!-- Footer Main -->
	<footer id="footer-main" class="container-fluid no-left-padding no-right-padding footer-main">
		<!-- Top Footer -->
		<div class="container-fluid no-left-padding no-right-padding top-footer">
			<!-- Container -->
			<div class="container">
				<!-- Row -->
				<div class="row">					
					<!-- Widget About -->
					<div class="col-md-8 col-sm-6 col-xs-6">
						<aside class="widget widget_about">
							<h3 class="widget-title">Sekilas Tentang Kami</h3>
							<p>{{ $setting->meta_description }}</p>
							<aside class="widget widget_social">
								<ul>
									@if ($setting->facebook != "")
										<li><a href="https://www.facebook.com/{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
									@endif

									@if ($setting->twitter != "")
										<li><a href="https://twitter.com/{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
									@endif

									@if ($setting->linkedin != "")
										<li><a href="https://www.linkedin.com/{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									@endif

									@if ($setting->google != "")
										<li><a href="https://plus.google.com/{{ $setting->google }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
									@endif

									@if ($setting->instagram != "")
										<li><a href="https://www.instagram.com/{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
									@endif

									@if ($setting->youtube != "")
										<li><a href="https://www.youtube.com/{{ $setting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
									@endif
								</ul>
							</aside>
						</aside>
					</div><!-- Widget About /- -->
					<!-- Widget Contact -->
					<div class="col-md-4 col-sm-6 col-xs-6">
						<aside class="widget widget_contact">
							<h3 class="widget-title">Kontak :</h3>
							<p><i class="lnr lnr-map"></i><span>Alamat :</span>{{ $setting->address }}</p>
							<p><i class="lnr lnr-smartphone"></i><span>Telpon :</span><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></p>
							<p><i class="lnr lnr-envelope"></i><span>Email :</span><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>							
						</aside>
					</div><!-- Widget Contact /- -->
				</div><!-- Row /- -->
			</div><!-- Container /- -->
		</div><!-- Top Footer -->
		<!-- Bottom Footer -->
		<div class="container-fluid no-left-padding no-right-padding bottom-footer">
			<!-- Container -->
			<div class="container">
				<!-- Row -->
				<div class="row">
					<div class="col-md-4 btm-ftr-left">
					</div>
					<div class="col-md-4 btm-ftr-center">
						<p>Copyright © 2017 Pakem Tour & Travel</p>
					</div>
					<div class="col-md-4 btm-ftr-right">
						<a id="back-to-top" href="#"><i class="fa fa-rocket"></i></a>
					</div>
				</div><!-- Row /- -->
			</div><!-- Container -->
		</div><!-- Bottom Footer /- -->
	</footer><!-- Footer Main /- -->