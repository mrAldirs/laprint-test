{!! Form::open([
    'route' => ['product.update', [$data->id]],
    'class' => 'form',
    'method' => 'PUT',
    'files' => true,
]) !!}
@csrf
<div class="card-body">
    <div class="form-group">
        {!! Form::label('nama', 'Nama Product', null) !!}
        {!! Form::text('nama', $data->nama, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Product']) !!}
    </div>
    @error('nama')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('harga', 'Harga Product', null) !!}
        {!! Form::text('harga', $data->harga, ['class' => 'form-control', 'placeholder' => 'Masukkan Harga Product']) !!}
    </div>
    @error('harga')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('image', 'Foto Profil') !!}
        {!! Form::file('image', ['class' => 'form-control', 'id' => 'imageInput']) !!}
        <div id="imagePreview" class="mt-2"></div>
    </div>
    @error('image')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
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
