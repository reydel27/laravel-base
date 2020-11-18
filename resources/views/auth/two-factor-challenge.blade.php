@extends('template')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <!-- <img src="/img/login.jpg" alt="login" class="login-card-img"> -->
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                           <!-- <img src="/img/logo.png" alt="logo" class="logo"> -->
                        </div>
                        <p class="login-card-description">Please enter your authentication code to login</p>
                        <form method="POST" action="{{ url('/two-factor-challenge') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="text" name="code" class="form-control" placeholder="Authentication Code">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Submit">
                        </form>
                        <hr>
                        <form method="POST" action="{{ url('/two-factor-challenge') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="text" name="recovery_code" class="form-control" placeholder="Recovery Code">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Submit">
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
@endsection