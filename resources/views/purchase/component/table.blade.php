<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3 class="card-title">Data Purchase Order</h3>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('purchase.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus me-2"></i>Tambah Purchase Order
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
                        <th>Date</th>
                        <th>Supplier</th>
                        <th>Status</th>
                        <th style="width: 240;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $purchase)
                        <tr class="text-center">
                            <td>{{ $purchase->no_po }}</td>
                            <td>{{ $purchase->product->nama }}</td>
                            <td>{{ 'Rp ' . number_format($purchase->total, 0, ',', '.') }}</td>
                            <td>{{ $purchase->date }}</td>
                            <td>{{ $purchase->contact->nama }}</td>
                            <td>
                                @if ($purchase->status == 'draft')
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
                                <a href="{{ route('purchase.show', [$purchase->id]) }}"
                                    class="btn btn-secondary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if ($purchase->status == 'draft')
                                    <a href="{{ route('purchase.edit', [$purchase->id]) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('purchase.destroy', [$purchase->id]) }}" method="post"
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
