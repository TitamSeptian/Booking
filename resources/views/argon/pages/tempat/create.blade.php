<form action="{{ route('tempat.store') }}" class="form-horizontal" method="POST" id="form-store">
	@csrf
	<div class="form-group">
		<label for="nama_level">
			Nama Tempat
		</label>
		<input type="text" name="name" class="form-control" id="name" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="lebar">
            Lebar
        </label>
        <input type="number" name="lebar" min="1" class="form-control" id="lebar" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="lebar">
            Panjang
        </label>
        <input type="number" name="panjang" min="1" class="form-control" id="panjang" autocomplete="off">
    </div>

	<div class="d-flex">
		<button type="submit" class="btn btn-primary ml-auto" id="action-primary">Tambah</button>
	</div>
</form>