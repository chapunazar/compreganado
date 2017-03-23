@extends('console.master')

@section('content')
    <h2>Nueva Raza</h2>
    <hr>

    <form method="post" action="/console/breeds">
    
        @include('console.breeds._form',['submitButtonText'=>'Crear'])
        
        @include('console.errors')
    
    </form>

	

@endsection