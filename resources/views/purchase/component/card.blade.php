<div class="row">
    @foreach ($data as $purchase)
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <img src="{{ asset('storage/product/' . $purchase->product->image) }}" class="card-img-top"
                    style="height: 180px;" alt="{{ $purchase->product->image }}">
                <div class="card-header">
                    <h5 class="card-title">{{ $purchase->no_so }}</h5>
                    <div class="card-tools">
                        <a href="{{ route('purchase.show', [$purchase->id]) }}" class="btn btn-tool">
                            <i class="fas fa-eye"></i>
                        </a>
                        @if ($purchase->status == 'draft')
                            <a href="{{ route('purchase.edit', [$purchase->id]) }}" class="btn btn-tool">
                                <i class="fas fa-pen"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <h5>{{ $purchase->product->nama }}</h5>
                    </div>
                    <div class="card-text">
                        <strong>Total:</strong> {{ 'Rp ' . number_format($purchase->total, 0, ',', '.') }}
                    </div>
                    <div class="card-text">
                        <strong>Supplier:</strong> {{ $purchase->user->name }}
                    </div>
                    <div class="card-text text-end">
                        @if ($purchase->status == 'draft')
                            <span class="badge rounded-pill text-bg-secondary">
                                Draft
                            </span>
                        @else
                            <span class="badge rounded-pill text-bg-success">
                                Approve
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
