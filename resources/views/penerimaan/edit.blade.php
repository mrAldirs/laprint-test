@extends('layouts.app')

@section('title', 'Edit Penerimaan')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Receipt</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('penerimaan.index') }}">Penerimaan</a></li>
                            <li class="breadcrumb-item active">Edit Receipt</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Receipt</h3>
                            </div>
                            @include('penerimaan.component.formedit')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
