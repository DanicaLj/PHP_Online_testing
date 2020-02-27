<html>
@extends('layouts.app')
   <link  rel="stylesheet" href="css/style.css" >
   @section('content')
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <head>
      <style>
      .card{
         text-align:center;
      }
      </style>
      <title>Pitanja</title>
   </head>
   
   <body>
      <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
                   <div class="card">
                      <p class="par">Vreme je za test</p>
                      <p class="par">Srecno!</p>
                     <form action='/ponovo_provera' method='POST'>
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
                  </div>
               </div>
          </div>    
      </div>
   </body>
</html>