@extends('console.master')

@include('console._confirmation',[
    'confirmText'=>'Desea eliminar el método de pago '.$paymentmethod->name.'?',
    'confirmAction'=>'/console/paymentmethods/'.$paymentmethod->name,
    'confirmMethod'=>'DELETE'
])


@section('content')

   <div class="row">
    <div class="col">
      <h2>{{ $paymentmethod->name }}</h2>
    </div>
    <div class="col text-md-right">
       <a href="{{ env('APP_URL')}}/console/paymentmethods/{{ $paymentmethod->id }}/edit" class ="btn btn-warning btn-sm">Editar</a>&nbsp;
       <a class="btn btn-danger btn-sm" href="" data-target="#confirmModal" data-toggle="modal">Eliminar</a> 
    </div>
  </div>
    
 
    <hr />

		
@endsection