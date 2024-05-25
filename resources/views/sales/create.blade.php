@extends('layouts.app')

@section('title', 'Create Sales Order')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Sales Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Sales Order</a></li>
                            <li class="breadcrumb-item active">Create Sales Order</li>
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
                                <h3 class="card-title">Form Create Sales Order</h3>
                            </div>
                            @include('sales.component.formcreate')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
