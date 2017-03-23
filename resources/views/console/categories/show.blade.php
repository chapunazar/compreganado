@extends('console.master')

@include('console._confirmation',[
    'confirmText'=>'Desea eliminar la categoría '.$category->name.'?',
    'confirmAction'=>'/console/categories/'.$category->id,
    'confirmMethod'=>'DELETE'
])

@section('content')
<div class="row">
    <div class="col">
      <h2>{{ $category->name }}</h2>
    </div>
    <div class="col text-md-right">
       <a href="{{ env('APP_URL')}}/console/breeds/{{ $category->id }}/edit" class ="btn btn-warning btn-sm">Editar</a>&nbsp;
       <a class="btn btn-danger btn-sm" href="" data-target="#confirmModal" data-toggle="modal">Eliminar</a> 
    </div>
 </div>
 
  <hr />
    <p>{{ $category->description }}</p>
		
@endsection