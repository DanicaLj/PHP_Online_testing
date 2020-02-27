@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i>Upravljanje korisnicima <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Funkcije</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Dozvole</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Ime</th>
                    <th>Email</th>
                    <th>Datum/Vreme dodavanja korisnika</th>
                    <!--<th>User Roles</th>-->
                    <th>Broj bodova</th>
                    <th>Operacije</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <!--<td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}-->
                    <td>{{ $user->broj_bodova }}</td>
                    <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-success">Dodaj korisnika</a>

</div>

@endsection