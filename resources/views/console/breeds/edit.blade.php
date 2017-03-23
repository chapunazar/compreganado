@extends('console.master')

@section('content')
    <h2>Editar Raza {{ $breed->name }}</h2>
    <hr>

    <form method="post" action="console/breeds/{{ $breed->id }}">
        {{ method_field('PATCH') }}
    
        @include('console.breeds._form',['submitButtonText'=>'Grabar'])
        
        @include('console.errors')
    
    </form>

	

@endsection