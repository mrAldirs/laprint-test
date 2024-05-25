@extends('auth/layouts/app')

@section('title', 'Login')

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <p class="h1"><b>Sign In </b>Website</p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                {!! Form::open(['route' => 'login', 'class' => 'login-form', 'method' => 'POST']) !!}
                @csrf
                <div class="input-group mb-3">
                    {!! Form::email('email', Session::get('email'), [
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
                <div class="row mb-3">
                    <div class="col-8">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
                {!! Form::close() !!}
                <p class="mb-0">
                    Don't have an account?
                    <a href="{{ route('signup') }}" class="text-center"> Sign Up Now!</a>
                </p>
            </div>
        </div>
    </div>
@endsection
