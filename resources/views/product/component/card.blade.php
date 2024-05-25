<div class="row">
    @foreach ($data as $product)
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <img src="{{ asset('storage/product/' . $product->image) }}" class="card-img-top" style="height: 180px;"
                    alt="{{ $product->image }}">
                <div class="card-header">
                    <h5 class="card-title">{{ $product->nama }}</h5>
                    <div class="card-tools">
                        <a href="{{ route('product.show', [$product->id]) }}" class="btn btn-tool">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
