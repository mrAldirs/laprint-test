<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title">Data Product</h3>
                </div>
                <div class="col-6 text-end">
                    @if ($resp == 'active')
                        <a href="{{ route('product.index2', ['inactive']) }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fa fa-archive me-2"></i>Archive
                        </a>
                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus me-2"></i>Tambah Product
                        </a>
                    @else
                        <a href="{{ route('product.index2', ['active']) }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fa fa-archive me-2"></i>Unarchive
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="tableData1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th style="width: 240;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $product)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->nama }}</td>
                            <td>{{ 'Rp ' . number_format($product->harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($product->status == 'active')
                                    <span class="badge rounded-pill text-bg-success">
                                        Aktif
                                    </span>
                                @else
                                    <span class="badge rounded-pill text-bg-danger">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('product.show', [$product->id]) }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if ($resp == 'active')
                                    <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @endif
                                <form action="{{ route('product.destroy', [$product->id]) }}" method="post"
                                    class="d-inline deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm deleteButton">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

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
