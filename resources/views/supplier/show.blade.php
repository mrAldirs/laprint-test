@extends('layouts.app')

@section('title', 'Detail Supplier')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <h1>Detail Supplier</h1>
                    </div>
                    <div class="col-sm-4 text-center">
                        {{-- <a href="{{ route('supplier.penyewas', [$data->id]) }}" class="btn btn-outline-primary btn-md">
                            <i class="fa fa-users me-2"></i>
                            {{ $penyewas }} Penyewa
                        </a>
                        <a href="{{ route('supplier.complains', [$data->id]) }}" class="btn btn-outline-primary btn-md">
                            <i class="fa fa-comment me-2"></i>
                            {{ $complains }} Komplain
                        </a> --}}
                    </div>
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Supplier</a></li>
                            <li class="breadcrumb-item active">{{ $data->nama }}</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button onclick="goBack()" class="btn btn-secondary btn-sm">
                            <i class="fa fa-arrow-left me-2"></i>Kembali
                        </button>
                        <a href="{{ route('customer.edit', [$data->id]) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-edit me-2"></i>Edit
                        </a>
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
                                <h3 class="card-title">Detail Supplier</h3>
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
                                                <img src="{{ asset('storage/contact/' . $data->image) }}"
                                                    class="card-img-top" style="height: 100px; width: 140px;"
                                                    alt="{{ $data->image }}">
                                            </div>
                                        </div>
                                        <div class="detail-title">
                                            <span>PROFIL SUPPLIER</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <dl class="row">
                                                    <dt class="col-2"><strong>Tipe</strong></dt>
                                                    <dd class="col-10">{{ $data->type }}</dd>

                                                    <dt class="col-2"><strong>Alamat</strong></dt>
                                                    <dd class="col-10">{!! $data->alamat !!}</dd>
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
