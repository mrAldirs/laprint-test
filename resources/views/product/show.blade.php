@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <h1>Detail Product</h1>
                    </div>
                    <div class="col-sm-4 text-center">
                        {{-- <a href="{{ route('customer.penyewas', [$data->id]) }}" class="btn btn-outline-primary btn-md">
                            <i class="fa fa-users me-2"></i>
                            {{ $penyewas }} Penyewa
                        </a>
                        <a href="{{ route('customer.complains', [$data->id]) }}" class="btn btn-outline-primary btn-md">
                            <i class="fa fa-comment me-2"></i>
                            {{ $complains }} Komplain
                        </a> --}}
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                            <li class="breadcrumb-item active">{{ $data->nama }}</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button onclick="goBack()" class="btn btn-secondary btn-sm">
                            <i class="fa fa-arrow-left me-2"></i>Kembali
                        </button>
                        <a href="{{ route('product.edit', [$data->id]) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-edit me-2"></i>Edit
                        </a>
                        @if ($data->status == 'active')
                            <button class="btn btn-outline-danger btn-sm statusButton" data-id="{{ $data->id }}">
                                <i class="fa fa-eye me-2"></i>Nonaktifkan
                            </button>
                        @else
                            <button class="btn btn-outline-success btn-sm statusButton" data-id="{{ $data->id }}">
                                <i class="fa fa-eye me-2"></i>Aktifkan
                            </button>
                        @endif
                    </div>
                    <div class="col-8 text-end">
                        @if ($data->status == 'active')
                            <div class="state text-bg-primary">
                                Aktif
                            </div>
                            <div class="state text-muted">
                                Nonaktif
                            </div>
                        @else
                            <div class="state text-muted">
                                Aktif
                            </div>
                            <div class="state text-bg-primary">
                                Nonaktif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detail Product</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-9">
                                                <div>Nama</div>
                                                <span class="title-text">{{ $data->nama }}</span>
                                            </div>
                                            <div class="col-3 text-right">
                                                <img src="{{ asset('storage/product/' . $data->image) }}"
                                                    class="card-img-top" style="height: 100px; width: 140px;"
                                                    alt="{{ $data->image }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <dl class="row">
                                                    <dt class="col-2"><strong>Harga</strong></dt>
                                                    <dd class="col-10">
                                                        {{ 'Rp ' . number_format($data->harga, 0, ',', '.') }}</dd>

                                                    <dt class="col-2"><strong>Status</strong></dt>
                                                    <dd class="col-10">
                                                        @if ($data->status == 'active')
                                                            <span class="badge rounded-pill text-bg-success">
                                                                Aktif
                                                            </span>
                                                        @else
                                                            <span class="badge rounded-pill text-bg-danger">
                                                                Nonaktif
                                                            </span>
                                                        @endif
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        document.querySelectorAll('.statusButton').forEach(item => {
            item.addEventListener('click', event => {
                let prdId = event.target.dataset.id;
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Apakah anda yakin ingin mengubah status product ini?!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#5356FF',
                    cancelButtonColor: '#D71313',
                    confirmButtonText: 'Ya, ubah status!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('product/change-status') }}/" + prdId;
                    }
                });
            });
        });
    </script>
@endpush
