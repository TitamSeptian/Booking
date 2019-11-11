@extends('argon.layouts.app')

@section('title', '| Tempat')

@section('tempat', 'active')

@section('tempat-data')
    @foreach ($tempatAll as $q)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('booking.index', $q->id) }}">
                {{ $q->name }}
            </a>
        </li>
    @endforeach
@endsection

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
    @include('argon.layouts.headers.empty-card')
    {{-- @section('card-name', 'mememememem') --}}
    
    <div class="container-fluid mt--7">
        <div class="row">
            
            <div class="col-xl-12 mb-5">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">{{ env('app_name') }}</h6>
                                <h2 class="mb-0">Booking {{ $thatTempat->name }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            {{-- <a href="{{ route('tempat.create') }}" class="btn btn-primary btn-sm" id="btn-create">
                                <i class="fas fa-plus"></i> Tambah Jenis
                            </a> --}}
                            {{-- <button type="button" data-link="{{ route('tempat.create') }}" class="btn btn-primary btn-sm" id="btn-create">
                                <i class="fas fa-plus"></i> Tambah 
                            </button> --}}

                            <a href="#" class="btn btn-danger ml-3 btn-sm">
                                <i class="fas fa-file-pdf"></i> Download PDF
                            </a>
                        </div>
                        <div class="form-group">
                            <input 
                                type="date" 
                                name="tgl_booking" 
                                id="tgl_booking" 
                                class="form-control"
                                data-url="{{ route('booking.find', $thatTempat->id) }}">
                        </div>
                        {{-- content here --}}
                        <div class="table-responsive">
                            <table border="1" class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th colspan="{{ count($jam) }}" class="text-center">
                                            <h1>jam main</h1>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="table-tr">
                                        @foreach ($jam as $j)
                                            <td 
                                                class="time-start" 
                                                data-time="{{ $j }}"
                                                data-url="{{ route('booking.store', [
                                                    'tempat' => $thatTempat
                                                ]) }}"
                                                >{{ $j }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('argon.layouts.footers.auth')
        @include('compo._modal')
    </div>
@endsection

@push('js')
{{-- <script src="{{ asset('vendor/datatables/js/datatables.min.js') }}"></script> --}}
<script src="{{ asset('vendor/sweetalert2.all.js') }}"></script>
<script src="{{ asset('js/booking.js') }}"></script>
@endpush