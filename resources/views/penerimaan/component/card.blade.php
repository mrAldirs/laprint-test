<div class="row">
    @foreach ($data as $penerimaan)
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <img src="{{ asset('storage/product/' . $penerimaan->product->image) }}" class="card-img-top"
                    style="height: 180px;" alt="{{ $penerimaan->product->image }}">
                <div class="card-header">
                    <h5 class="card-title">{{ $penerimaan->no_penerimaan }}</h5>
                    <div class="card-tools">
                        <a href="{{ route('penerimaan.show', [$penerimaan->id]) }}" class="btn btn-tool">
                            <i class="fas fa-eye"></i>
                        </a>
                        @if ($penerimaan->status == 'draft')
                            <a href="{{ route('penerimaan.edit', [$penerimaan->id]) }}" class="btn btn-tool">
                                <i class="fas fa-pen"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <h5>{{ $penerimaan->product->nama }}</h5>
                    </div>
                    <div class="card-text">
                        <strong>Total:</strong> {{ 'Rp ' . number_format($penerimaan->total, 0, ',', '.') }}
                    </div>
                    <div class="card-text">
                        <strong>Supplier:</strong> {{ $penerimaan->user->name }}
                    </div>
                    <div class="card-text text-end">
                        @if ($penerimaan->status == 'draft')
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
