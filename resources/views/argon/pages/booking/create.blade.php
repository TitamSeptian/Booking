<form action="{{ route('booking.store', [ 'tempat' => $thatTempat->id ]) }}" class="form-horizontal" method="POST" id="form-store">
	@csrf
	<div class="form-group">
		<label for="nama_level">
			Nama Booking
		</label>
		<input type="text" name="name" class="form-control" id="name" autocomplete="off">
    </div>
</form>