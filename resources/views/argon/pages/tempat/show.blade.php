<div class="container">
	<div class="row">
		<div class="col-md-4">
			<p class="mb-3">Nama :</p>
			<p class="mb-3">Ukuran :</p>
			<p class="mb-3">Keterangan :</p>
			<p class="mb-3">Status :</p>
		</div>
		<div class="col-md-8">
			<p class="mb-3">{{ $data->name }}</p>
            <p class="mb-3">{{ $data->panjang }} x {{ $data->lebar }} Meter</p>
			<p class="mb-3">{{ $data->keterangan }}</p>
			<b class="mb-3">{{ $data->status }}</b>
		</div>
	</div>
</div>