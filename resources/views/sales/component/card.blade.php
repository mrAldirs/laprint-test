<div class="row">
    @foreach ($data as $sales)
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <img src="{{ asset('storage/product/' . $sales->product->image) }}" class="card-img-top"
                    style="height: 180px;" alt="{{ $sales->product->image }}">
                <div class="card-header">
                    <h5 class="card-title">{{ $sales->no_so }}</h5>
                    <div class="card-tools">
                        <a href="{{ route('sales.show', [$sales->id]) }}" class="btn btn-tool">
                            <i class="fas fa-eye"></i>
                        </a>
                        @if ($sales->status == 'draft')
                            <a href="{{ route('sales.edit', [$sales->id]) }}" class="btn btn-tool">
                                <i class="fas fa-pen"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <h5>{{ $sales->product->nama }}</h5>
                    </div>
                    <div class="card-text">
                        <strong>Total:</strong> {{ 'Rp ' . number_format($sales->total, 0, ',', '.') }}
                    </div>
                    <div class="card-text">
                        <strong>Customer:</strong> {{ $sales->user->name }}
                    </div>
                    <div class="card-text text-end">
                        @if ($sales->status == 'draft')
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
