<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title">Data Receipt Product</h3>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('penerimaan.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus me-2"></i>Tambah Receipt Product
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="tableData1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Product</th>
                        <th>Total</th>
                        <th>Tanggal Diterima</th>
                        <th>Supplier</th>
                        <th>Status</th>
                        <th style="width: 240;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $penerimaan)
                        <tr class="text-center">
                            <td>{{ $penerimaan->no_penerimaan }}</td>
                            <td>{{ $penerimaan->product->nama }}</td>
                            <td>{{ 'Rp ' . number_format($penerimaan->total, 0, ',', '.') }}</td>
                            <td>{{ $penerimaan->tanggal_diterima }}</td>
                            <td>{{ $penerimaan->contact->nama }}</td>
                            <td>
                                @if ($penerimaan->status == 'draft')
                                    <span class="badge rounded-pill text-bg-secondary">
                                        Draft
                                    </span>
                                @else
                                    <span class="badge rounded-pill text-bg-success">
                                        Approve
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('penerimaan.show', [$penerimaan->id]) }}"
                                    class="btn btn-secondary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if ($penerimaan->status == 'draft')
                                    <a href="{{ route('penerimaan.edit', [$penerimaan->id]) }}"
                                        class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('penerimaan.destroy', [$penerimaan->id]) }}" method="post"
                                        class="d-inline deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm deleteButton">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
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
