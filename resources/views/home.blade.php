@extends('layouts.app')
<link  rel="stylesheet" href="css/style.css" >
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Ulogovani ste kao {{Auth::user()->name}}</div>
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <p class="par">Izabrali ste  kategoriju pitanja {{Cookie::get('kategorija')}}</p> -->
                    <br>
                    <br>
                    <form action="/provera_korisnika" method="POST">
                        @csrf
                        <div class="button-box">
                        <input type="submit" value="TEST" class="btn btn-warning">
                    </form>
                    <a href="vezba"><button type="button" class="btn btn-info">VEZBA</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
