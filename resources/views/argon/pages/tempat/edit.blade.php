<form action="{{ route('tempat.update', $data->id) }}" class="form-horizontal" method="POST" id="form-edit">
    {{ method_field('PUT') }}
	@csrf
	<div class="form-group">
		<label for="nama_level">
			Nama Tempat
		</label>
        <input type="text" name="name" class="form-control" id="name" autocomplete="off" value="{{ $data->name }}">
    </div>
    <div class="form-group">
        <label for="lebar">
            Lebar
        </label>
        <input type="number" name="lebar" min="1" class="form-control" id="lebar" autocomplete="off" value="{{ $data->lebar }}">
    </div>
    <div class="form-group">
        <label for="lebar">
            Panjang
        </label>
        <input type="number" name="panjang" min="1" class="form-control" id="panjang" autocomplete="off" value="{{ $data->panjang }}">
    </div>
    <div class="form-group">
        <label for="keterangan">
            Keterangan
        </label>
        <textarea class="form-control" id="keterangan" name="keterangan">{{ $data->keterangan }}</textarea>
    </div>
    <div class="form-group">
        <label for="status">
            Status
        </label>
        <select name="status" id="status" class="form-control">
            <option value="AKTIF" {{ $data->status == 'AKTIF' ? 'selected' : '' }}>AKTIF</option>
            <option value="NONAKTIF" {{ $data->status == 'NONAKTIF' ? 'selected' : '' }}>NONAKTIF</option>
        </select>
    </div>

	<div class="d-flex">
		<button type="submit" class="btn btn-primary ml-auto" id="action-primary">Edit</button>
	</div>
</form>