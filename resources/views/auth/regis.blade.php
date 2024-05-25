@extends('auth/layouts/app')

@section('title', 'Registrasi')

@section('content')

    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <p class="h1"><b>Sign Up </b>Account</p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                {!! Form::open(['route' => 'register', 'class' => 'login-form', 'method' => 'POST']) !!}
                @csrf
                <div class="input-group mb-3">
                    {!! Form::text('name', old('name'), [
                        'class' => 'form-control',
                        'placeholder' => 'Fullname',
                        'required' => true,
                    ]) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    {!! Form::email('email', old('email'), [
                        'class' => 'form-control',
                        'placeholder' => 'Email',
                        'required' => true,
                    ]) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    {!! Form::password('password', [
                        'class' => 'form-control',
                        'placeholder' => 'Password',
                        'required' => true,
                    ]) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    {!! Form::password('retype', [
                        'class' => 'form-control',
                        'placeholder' => 'Retype Password',
                        'required' => true,
                    ]) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('retype')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="input-group mb-3">
                    {!! Form::select('role', ['user' => 'User', 'admin' => 'Admin'], null, [
                        'class' => 'form-control',
                        'placeholder' => 'Role',
                    ]) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                <div class="row mb-3">
                    <div class="col-8">
                    </div>
                    <div class="col-4">
                        {!! Form::submit('Register', [
                            'class' => 'btn btn-primary btn-block',
                            'type' => 'submit',
                        ]) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <p class="mb-0">I already have a membership
                    <a href="{{ route('signin') }}" class="text-center"> Sign In Now!</a>
                </p>
            </div>
        </div>
    </div>
@endsection
