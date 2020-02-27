@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikujte svoju email adresu') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Poruka vam je poslata na Vašu email adresu.Molimo Vas proverite') }}
                        </div>
                    @endif

                    {{ __('Radi provere verifikacionog linka,proverite svoj email.') }}
                    {{ __('Ako niste dobili email') }}, <a href="{{ route('verification.resend') }}">{{ __('klinite ovde') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
