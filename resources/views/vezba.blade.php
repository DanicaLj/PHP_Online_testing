<html>
@extends('layouts.app')
   <link  rel="stylesheet" href="css/style.css" >
   @section('content')
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <head>
      <title>Vezba</title>
   </head>
   
   <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <p class="par">Vreme je za vezbu! Srecno!</p>
            <form action='/proveri' method='POST'>
              @csrf
            @foreach ($pitanje as $p)
            <label for='odg'>{{$p->pitanje}}</label><br>
            <input type="radio" name="{{$p->id}}" value="dfd">{{$p->netacan_odgovor}}<br>
            <input type="radio" name="{{$p->id}}" value="srf">{{$p->netacan_odgovor2}}<br>
            <input type="radio" name="{{$p->id}}" value="{{$p->id}}">{{$p->odgovor}}<br>
              <br>
            @endforeach
            <div class="button-box">
              <input type="submit"  class = "btn btn-warning"> 
            </div>
            </form>
      @if($provere==1)
        <div class="alert alert-danger">
        Niste tacno odgovorili!
         </div>
      @endif
      @if($provere==2)
        <div class="alert alert-success">
        Tacno ste odgovorili!
         </div>
      @endif
   </div>
  </div>
</div>
</div>
   </body>
</html>