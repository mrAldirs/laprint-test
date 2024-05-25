@extends('layouts.app')

@section('title', 'Sales Order')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Sales Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sales Order</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm" style="display: none;"
                            id="insert">
                            <i class="fa fa-plus me-2"></i>Tambah Sales
                        </a>
                    </div>
                    <div class="col-6">
                        <ul class="nav nav-pills justify-content-end">
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary btn-sm me-1 active" aria-current="page"
                                    href="#tableList" onclick="showTable()"><i class="fa fas fa-table"></i> Table</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary btn-sm me-1" aria-current="page" href="#cardList"
                                    onclick="showCard()"><i class="fa fas fa-columns"></i> Card</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row fade show" id="tableList" style="display: block;">
                    @include('sales.component.table')
                </div>

                <div class="row fade show" id="cardList" style="display: none;">
                    @include('sales.component.card')
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        function showTable() {
            document.getElementById('tableList').style.display = 'block';
            document.getElementById('cardList').style.display = 'none';
            document.querySelector('a[href="#tableList"]').classList.add('active');
            document.querySelector('a[href="#cardList"]').classList.remove('active');
            document.getElementById('insert').style.display = 'none';
        }

        function showCard() {
            document.getElementById('tableList').style.display = 'none';
            document.getElementById('cardList').style.display = 'block';
            document.querySelector('a[href="#cardList"]').classList.add('active');
            document.querySelector('a[href="#tableList"]').classList.remove('active');
            document.getElementById('insert').style.display = 'inline';
        }
    </script>
    <script src="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
@endpush
