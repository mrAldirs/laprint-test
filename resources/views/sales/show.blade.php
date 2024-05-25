@extends('layouts.app')

@section('title', 'Detail Sales Order')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <h1>Detail Sales Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Sales</a></li>
                            <li class="breadcrumb-item active">{{ $data->no_so }}</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button onclick="goBack()" class="btn btn-secondary btn-sm">
                            <i class="fa fa-arrow-left me-2"></i>Kembali
                        </button>
                        @if ($data->status == 'draft')
                            <a href="{{ route('sales.edit', [$data->id]) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit me-2"></i>Edit
                            </a>
                            @if (Auth::user()->role == 'admin')
                                <button class="btn btn-outline-success btn-sm statusButton" data-id="{{ $data->id }}">
                                    <i class="fa fa-eye me-2"></i>Approve
                                </button>
                            @endif
                        @endif
                    </div>
                    <div class="col-8 text-end">
                        @if ($data->status == 'draft')
                            <div class="state text-bg-primary">
                                Draft
                            </div>
                            <div class="state text-muted">
                                Approve
                            </div>
                        @else
                            <div class="state text-muted">
                                Draft
                            </div>
                            <div class="state text-bg-primary">
                                Approve
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
                                <h3 class="card-title">Detail Sales</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-9">
                                                <div>Prefix</div>
                                                <span class="title-text">{{ $data->no_so }}</span>
                                            </div>
                                            <div class="col-3 text-right">
                                                <img src="{{ asset('storage/product/' . $data->product->image) }}"
                                                    class="card-img-top" style="height: 100px; width: 140px;"
                                                    alt="{{ $data->product->image }}">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <dl class="row">
                                                    <dt class="col-2"><strong>Customer</strong></dt>
                                                    <dd class="col-10">{{ $data->contact->nama }}</dd>
                                                </dl>
                                            </div>
                                            <div class="col-6">
                                                <dl class="row">
                                                    <dt class="col-4"><strong>Date</strong></dt>
                                                    <dd class="col-8">{{ $data->date }}</dd>

                                                    <dt class="col-4"><strong>Harga Satuan</strong></dt>
                                                    <dd class="col-8">
                                                        {{ 'Rp ' . number_format($data->product->harga, 0, ',', '.') }}
                                                    </dd>

                                                    <dt class="col-4"><strong>Quantity</strong></dt>
                                                    <dd class="col-8">{{ $data->qty }} Unit</dd>

                                                    <dt class="col-4"><strong>Total</strong></dt>
                                                    <dd class="col-8">
                                                        {{ 'Rp ' . number_format($data->total, 0, ',', '.') }}</dd>

                                                    <dt class="col-4"><strong>Penanggung Jawab</strong></dt>
                                                    <dd class="col-8">
                                                        <span class="badge rounded-pill text-bg-secondary">
                                                            {{ $data->user->name }}
                                                        </span>
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
                let soId = event.target.dataset.id;
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Apakah anda yakin ingin melakukan approve untuk sales order ini?!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#5356FF',
                    cancelButtonColor: '#D71313',
                    confirmButtonText: 'Ya, ubah status!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('sales/approve') }}/" + soId;
                    }
                });
            });
        });
    </script>
@endpush
