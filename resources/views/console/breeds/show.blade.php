@extends('console.master')

@include('console._confirmation',[
    'confirmText'=>'Desea eliminar la raza '.$breed->name.'?',
    'confirmAction'=>'/console/breeds/'.$breed->id,
    'confirmMethod'=>'DELETE'
])

@section('content')
    <div class="row">
    <div class="col">
      <h2>{{ $breed->name }}</h2>
    </div>
    <div class="col text-md-right">
       <a href="{{ env('APP_URL')}}/console/breeds/{{ $breed->id }}/edit" class ="btn btn-warning btn-sm">Editar</a>&nbsp;
       <a class="btn btn-danger btn-sm" href="" data-target="#confirmModal" data-toggle="modal">Eliminar</a> 
    </div>
  </div>
    
   
    <h4 class="text-muted">{{ $breed->type }}</h4>
    <hr />

                   
    <p>{{ $breed->description }}</p>


@endsection
