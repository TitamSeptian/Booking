@extends('argon.layouts.app')

@section('title', '| Tempat')

@section('tempat', 'active')

@section('content-name', 'Tempat')
{{-- @endsection --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/css/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endpush
@section('content')
    {{-- for dashboard  --}}
    {{-- @include('argon.layouts.headers.cards') --}}
    {{-- for me --}}
    @include('argon.layouts.headers.card-normal')
    {{-- @section('card-name', 'mememememem') --}}
    
    <div class="container-fluid mt--7">
        <div class="row">
            
            <div class="col-xl-12 mb-5">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">{{ env('app_name') }}</h6>
                                <h2 class="mb-0">Tempat</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('tempat.create') }}" class="btn btn-primary btn-sm" id="btn-create">
                                <i class="fas fa-plus"></i> Tambah Jenis
                            </a>

                            <a href="#" class="btn btn-success ml-3 btn-sm">
                                <i class="fas fa-table"></i> Download Excel
                            </a>

                            <a href="#" class="btn btn-danger ml-3 btn-sm">
                                <i class="fas fa-file-pdf"></i> Download PDF
                            </a>
                        </div>

                        <div class="table-responsive">
							<table class="table table-stripped" id="tableTempat">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tempat</th>
                                        <th>Ukuran (m)</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
						    </table>
						</div>
                    </div>
                </div>
            </div>
        </div>

        @include('argon.layouts.footers.auth')
    </div>
@endsection

@push('js')
<script src="{{ asset('vendor/datatables/js/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/sweetalert2.all.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#tableTempat').DataTable({
            responsive: true,
            processing:true,
            serverSide:true,
            ajax: "{{ route('tempat.data') }}",
            columns : [
                    {data: "DT_RowIndex", orderable: false, searchable: false},
                    {data: "name"},
                    {data: "lebar", "render": function (a, b ,c) {
                        return `${c.panjang} x ${c.lebar}`;
                    }},
                    {data:'action', orderable: false, searchable: false},
            ]
        });  
    });
</script>
{{-- <script src="{{ asset('js/tempat.js') }}"></script> --}}
@endpush