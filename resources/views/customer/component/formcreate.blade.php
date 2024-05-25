{!! Form::open([
    'route' => 'customer.store',
    'class' => 'form',
    'method' => 'POST',
    'files' => true,
]) !!}
@csrf
<div class="card-body">
    <div class="form-group">
        {!! Form::label('nama', 'Nama Customer', null) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Customer']) !!}
    </div>
    @error('nama')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('telpon', 'Nomor Telpon', null) !!}
        {!! Form::number('telpon', null, [
            'class' => 'form-control',
            'placeholder' => 'Masukkan Nomor Telpon',
        ]) !!}
    </div>
    @error('telpon')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {!! Form::label('alamat', 'Alamat Customer', null) !!}
        {!! Form::textarea('alamat', null, [
            'class' => 'form-control',
            'placeholder' => 'Masukkan Alamat Customer',
            'rows' => '3',
        ]) !!}
    </div>
    @error('alamat')
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
