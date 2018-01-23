<!-- Modal -->
<div class="modal modal-subscribe fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="{{ route('subscribers_store') }}" method="post">
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="subscribeModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<div class="container">
						<h3>Berlangganan untuk mendapatkan pemberitahuan <i>update</i> selanjutnya</h3>
						<br>
						<br>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<input type="text" name="email" class="form-control" placeholder="Masukkan alamat email Anda!">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<button class="btn btn-block btn-custom">Berlangganan</button>
								</div>
							</div>
						</div>
						<br>
						<br>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal modal-subscribe fade" id="subscribeSuccessModal" tabindex="-1" role="dialog" aria-labelledby="subscribeSuccessModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form action="{{ route('subscribers_store') }}" method="post">
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="subscribeSuccessModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<div class="container">
						<h3>Terima Kasih telah berlangganan bersama kami</h3>
						<br>
						<br>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>