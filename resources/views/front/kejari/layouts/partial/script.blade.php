<script src="{{ asset('assets') }}/front/kejari/js/kejari.js"></script>
<script>
	@if ( Session::has('subscribe_success') )
		$('#subscribeSuccessModal').modal('show');
	@endif
</script>