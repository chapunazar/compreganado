@extends('console.master')


@section('content')


<div class="row">
    <div class="col">
        <h2>Usuarios</h2>
    </div>
</div>
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                    <td><a href="{{ env('APP_URL')}}/console/users/{{ $user->id }}">{{ $user->name }}</a> &nbsp;
                        @if ($user->isAdmin()) 
                            <span class="badge badge-pill badge-success">Admin</span>
                        @endif 
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @if (!$user->isAdmin()) 
                            <a href="{{ env('APP_URL')}}/console/users/{{ $user->id }}/toggleadmin" class ="btn btn-danger btn-sm">Hacer Admin</a>
                    @else
                            <a href="{{ env('APP_URL')}}/console/users/{{ $user->id }}/toggleadmin" class ="btn btn-success btn-sm">Quitar Admin</a>
                    @endif
                    </td>
                   
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@endsection