@extends('layouts.app')

@section('title', 'Inventory')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Inventory</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Inventory</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title">Data Inventory Product</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="tableData1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Quantity Available</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $inventory)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/product/' . $inventory->product->image) }}"
                                                        alt="" class="img-fluid" width="64px" height="64px">
                                                </td>
                                                <td>{{ $inventory->product->nama }}</td>
                                                <td>{{ $inventory->qty_tersedia }} Unit</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush
