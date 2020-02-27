@extends('layouts.app')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
@section('title', '| AdminIndex')

@section('content')


<style>
	.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 20px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
.justify-content-center	{
	text-align:center;
}
</style>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
		
	<h2>Dobrodosli na Admin stranicu!</h2>
	<!-- <h3>Izabrali ste kategoriju {{Cookie::get('kategorija')}}</h3> -->
	@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
	@endif
	@if (session('poruka'))
    <div class="alert alert-success">
        {{ session('poruka') }}
    </div>
	@endif
	<a href='users'><button class="btn btn-info">Pogledaj korisnike</button></a>
	<h3>Unesite novo pitanje</h3>
	<form action='/dodaj_pitanje' method="POST">
		@csrf
		<label>Izaberite kategoriju</label>
		<select name='odaberi'>
				<option value="lako">Laka pitanja</option>
				<option value="srednje">Srednja pitanja</option>
				<option value="tesko">Teska pitanja</option>
		</select><br>
		<label>Unesite tekst pitanja:</label>
		<input type="text" name="pitanje"><br>
		<label>Unesite tacan odgovor:</label>
		<input type="text" name="odgovor"><br>
		<label>Unesite netacan odgovor:</label>
		<input type="text" name="netacan_odgovor"><br>
		<label>Unesite netacan odgovor:</label>
		<input type="text" name="netacan_odgovor2"><br>
		<button  type="submit" class="btn btn-warning">Posalji</button>
	</form>
	
	<h3>Izaberite kategoriju pitanja</h3>
	<form action='/odabir_kategorije' method='GET'>
	
		<select name='izaberi'>
			<option value="lako">Laka pitanja</option>
			<option value="srednje">Srednja pitanja</option>
			<option value="tesko">Teska pitanja</option>
		</select>
	
		<button  type="submit" class="btn btn-warning">Posalji</button>
		<br>
	</form>
</div>
</div>
</div>
@endsection