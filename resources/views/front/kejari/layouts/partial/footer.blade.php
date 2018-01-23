<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="logo">
					<img src="{{ asset('uploaded') }}/{{ $setting->logo }}" alt="Logo {{ $setting->meta_title }}"><br>
					<span>Kejaksaan Negeri Soppeng</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="info">
					<span>
						<b>Situs Terkait</b>
						<ul class="list-unstyled">
							<li><a href="www.kejaksaan.go.id" target="_blank">Kejaksaan Agung</a></li>
							<li><a href="www.mahkamahagung.go.id" target="_blank">Mahkamah Agung</a></li>
							<li><a href="www.polri.go.id" target="_blank">Polri</a></li>
							<li><a href="www.kpk.go.id" target="_blank">KPK</a></li>
							<li><a href="www.kejati-sulsel.go.id" target="_blank">Kejaksaan Tinggi Sulawesi Selatan</a></li>
							<li><a href="www.pn-watansoppeng.go.id" target="_blank">Pengadilan Negeri Watansoppeng</a></li>
							<li><a href="www.jaksamenyapa.com" target="_blank">Jaksa Menyapa</a></li>
						</ul>
					</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="info">
					<span><b>Alamat</b><br>{{ $setting->address }}</span>
					<span><b>Telp</b><br>{{ $setting->phone }}</span>
					<span>
						<ul class="list-unstyled sosmed">
							@if ($setting->facebook != "")
									<li class="d-inline"><a href="https://www.facebook.com/{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
								@endif

								@if ($setting->twitter != "")
									<li class="d-inline"><a href="https://twitter.com/{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
								@endif

								@if ($setting->linkedin != "")
									<li class="d-inline"><a href="https://www.linkedin.com/{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								@endif

								@if ($setting->google != "")
									<li class="d-inline"><a href="https://plus.google.com/{{ $setting->google }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								@endif

								@if ($setting->instagram != "")
									<li class="d-inline"><a href="https://www.instagram.com/{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
								@endif

								@if ($setting->youtube != "")
									<li class="d-inline"><a href="https://www.youtube.com/{{ $setting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
								@endif
						</ul>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="overlay"></div>
</footer>

<div class="copyright">
	<i class="fa fa-copyright"></i> copyright 2017 . Kejaksaan Negeri Soppeng . Dev by <a href="https://www.docotel.com/">DTC</a>
</div>