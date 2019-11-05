<div class="container">
	<div class="row">
		<div class="col-md-4">
			<p class="mb-3">Nama :</p>
			<p class="mb-3">Ukuran :</p>
			<p class="mb-3">Keterangan :</p>
		</div>
		<div class="col-md-8">
			<p class="mb-3">{{ $data->name }}</p>
            <p class="mb-3">{{ $data->panjang }} x {{ $data->lebar }}</p>
			<p class="mb-3">{{ $data->keterangan }}</p>
		</div>
	</div>
</div>