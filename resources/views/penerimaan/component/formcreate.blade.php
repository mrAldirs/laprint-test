{!! Form::open([
    'route' => 'penerimaan.store',
    'class' => 'form',
    'method' => 'POST',
    'files' => true,
]) !!}
@csrf
<div class="card-body">
    <div class="form-group">
        {!! Form::label('contact_id', 'Supplier', null) !!}
        {!! Form::select('contact_id', $contact->toArray(), null, [
            'class' => 'form-control',
            'placeholder' => '-- Pilih Supplier --',
        ]) !!}
    </div>
    @error('contact_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('tanggal_diterima', 'Tanggal Diterima', null) !!}
        {!! Form::date('tanggal_diterima', null, [
            'class' => 'form-control',
        ]) !!}
    </div>
    @error('tanggal_diterima')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('purchase_id', 'Purchase Order', null) !!}
        {!! Form::select('purchase_id', $purchase->toArray(), null, [
            'class' => 'form-control',
            'placeholder' => '-- Pilih Purchase Order --',
            'id' => 'purchase_id',
        ]) !!}
    </div>
    @error('purchase_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('product_id', 'Product', null) !!}
        {!! Form::select('product_id', [], null, [
            'class' => 'form-control',
            'placeholder' => '-- Pilih Product --',
            'id' => 'product_id',
            'readonly',
        ]) !!}
    </div>
    @error('product_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('user_id', 'PIC', null) !!}
        {!! Form::select('user_id', $user->toArray(), null, [
            'class' => 'form-control',
            'placeholder' => '-- Pilih PIC --',
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
                {!! Form::text('qty', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Masukkan Quantity Product',
                    'id' => 'qty',
                    'readonly',
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
                {!! Form::text('total', null, [
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
            $('#purchase_id').change(function() {
                var purchaseOrderId = $(this).val();

                if (purchaseOrderId) {
                    $.ajax({
                        url: '/get-purchase-order/' + purchaseOrderId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                $('#product_id').empty();

                                // $.each(data.products, function(key, value) {
                                //     $('#product_id').append('<option value="' + key +
                                //         '">' + value + '</option>');
                                // });

                                $('#product_id').append('<option value="' + data.product.id +
                                    '">' + data.product.nama + '</option>');

                                $('#qty').val(data.qty);
                                $('#total').val(data.total);
                            }
                        },
                        error: function() {
                            alert('Gagal mengambil data Purchase Order');
                        }
                    });
                }
            });
        });
    </script>
@endpush
