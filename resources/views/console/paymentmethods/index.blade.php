@extends('console.master')

@section('content')

<div class="row">
    <div class="col">
        <h2>Métodos de Pago</h2>
    </div>
    <div class="col text-md-right">
        <a href="/console/paymentmethods/create" class="btn btn-success btn-sm" role="button">Nuevo</a>
    </div>
</div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($paymentmethods as $paymentmethod)
                <tr>
                    <td><a href="{{ env('APP_URL')}}/console/paymentmethods/{{ $paymentmethod->name }}">{{ $paymentmethod->name }}</a></td>
                    <td><a href="{{ env('APP_URL')}}/console/listings/paymentmethods/{{ $paymentmethod->name }}" class ="btn btn-info btn-sm">Ver Lotes ({{ count($paymentmethod->listings) }})</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@endsection