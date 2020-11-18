@extends('template')
@section('content')
<div class="container">
    <div class="card login-card">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body">
                    @if(! auth()->user()->two_factor_secret)
                    You have not enabled two factor auth
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        <button type="submit" Enabled class="btn btn-primary">Enable</button>
                    </form>
                    @else

                    You have two factor auth enabled
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" Enabled class="btn btn-primary">Disable</button>
                    </form>                    
                    @endif



                    @if (session('status') == 'two-factor-authentication-enabled')
                        You have now enabled two facto auth, please scan the following QR code into your phone authenticator application.
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}

                        <p>Please store theses recovery codes in a secure location.</p>
                        @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                            {{ trim($code) }} <br>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection