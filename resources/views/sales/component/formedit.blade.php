{!! Form::open([
    'route' => ['sales.update', $data->id],
    'class' => 'form',
    'method' => 'PUT',
    'files' => true,
]) !!}
@csrf
<div class="card-body">
    <div class="form-group">
        {!! Form::label('contact_id', 'Customer', null) !!}
        {!! Form::select('contact_id', $contact->toArray(), $data->contact->id, [
            'class' => 'form-control',
            'placeholder' => '-- Pilih Customer --',
        ]) !!}
    </div>
    @error('contact_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('product_id', 'Product', null) !!}
        {!! Form::select('product_id', $product->toArray(), $data->product->id, [
            'class' => 'form-control',
            'placeholder' => '-- Pilih Product --',
            'id' => 'product_id',
            'data-hargas' => json_encode($productHarga->toArray()),
        ]) !!}
    </div>
    @error('product_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('user_id', 'Penanggung Jawab', null) !!}
        {!! Form::select('user_id', $user->toArray(), $data->user->id, [
            'class' => 'form-control',
            'placeholder' => '-- Pilih Penanggung Jawab --',
        ]) !!}
    </div>
    @error('user_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('qty', 'Quantity Product', null) !!}
                {!! Form::text('qty', $data->qty, [
                    'class' => 'form-control',
                    'placeholder' => 'Masukkan Quantity Product',
                    'id' => 'qty',
                ]) !!}
            </div>
            @error('qty')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('total', 'Total', null) !!}
                {!! Form::text('total', $data->total, [
                    'class' => 'form-control',
                    'placeholder' => 'Total Sales',
                    'id' => 'total',
                    'readonly',
                ]) !!}
            </div>
            @error('total')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>

<div class="card-footer">
    <a href="#" id="cancelButton" class="btn btn-danger">
        <i class="fa fa-times me-2"></i>Cancel
    </a>
    <button type="submit" class="btn btn-primary float-right">
        <i class="fas fa-save me-2"></i>Simpan
    </button>
</div>
{!! Form::close() !!}

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#product_id, #qty').on('change keyup', function() {
                var hargaProduct = $('#product_id').data('hargas');
                var productId = $('#product_id').val();
                var qty = $('#qty').val();
                var harga = productId ? hargaProduct[productId] : 0;
                var total = qty * harga;
                $('#total').val(total);
            });
        });
    </script>
@endpush
