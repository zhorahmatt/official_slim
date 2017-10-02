<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Subscribe to Alert</h3>
				<form action="">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="To subscibe, enter your email here">
						<span class="input-group-btn">
							<button class="btn" type="button"><i class="fa fa-send"></i></button>
						</span>
					</div>
				</form>
			</div>

			<div class="col-md-6 text-right">
				<h3>Sales Requiries</h3>
				<a href="" class="email">{{ $setting->email }}</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<ul class="list-inline list-footer">
					<li class="list-inline-item"><a href=""><i class="fa fa-copyright"></i> &nbsp;Copyright 2017, All rights reserved</a></li>
					<li class="list-inline-item"><a href="">Privacy Policy</a></li>
					<li class="list-inline-item"><a href="">Licensing & Copyright</a></li>
					<li class="list-inline-item"><a href="">Terms & Conditions</a></li>
					<li class="list-inline-item"><a href="">Refund Policy</a></li>
				</ul>
			</div>

			<div class="col-md-4 text-right">
				<ul class="list-inline list-sosmed">
					@if ($setting->facebook != "")
						<li class="list-inline-item"><a href="https://www.facebook.com/{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
					@endif

					@if ($setting->twitter != "")
						<li class="list-inline-item"><a href="https://twitter.com/{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
					@endif

					@if ($setting->linkedin != "")
						<li class="list-inline-item"><a href="https://www.linkedin.com/{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
					@endif

					@if ($setting->google != "")
						<li class="list-inline-item"><a href="https://plus.google.com/{{ $setting->google }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
					@endif

					@if ($setting->instagram != "")
						<li class="list-inline-item"><a href="https://www.instagram.com/{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
					@endif

					@if ($setting->youtube != "")
						<li class="list-inline-item"><a href="https://www.youtube.com/{{ $setting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
</footer>