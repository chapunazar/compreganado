@extends('console.master')

@section('content')
            <h1 class="hidden-xs-down">
            Tu tablero de comando 
            </h1>
            <p class="lead hidden-xs-down">Bienvenido {{ auth()->user()->name }} </p>
        

            <div class="row mb-3">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success">
                            <a class="deco-none" href="/console/listings">
                                <div class="rotate">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <h6 class="text-uppercase">Lotes en venta</h6>
                                <h1 class="display-1">{{ $values['num_listings'] }}</h1>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-danger">
                        <div class="card-block bg-danger">
                            <a class="deco-none" href="/console/comments">
                                <div class="rotate">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <h6 class="text-uppercase">Comentarios hechos</h6>
                                <h1 class="display-1">{{ $values['num_comments'] }}</h1>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-info">
                        <div class="card-block bg-info">
                            <a class="deco-none" href="/console/offers">
                                <div class="rotate">
                                    <i class="fa fa-twitter fa-5x"></i>
                                </div>
                                <h6 class="text-uppercase">Ofertas recibidas</h6>
                                <h1 class="display-1">{{ $values['num_offers'] }}</h1>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-warning">
                        <div class="card-block bg-warning">
                            <div class="rotate">
                                <i class="fa fa-share fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase">Otro</h6>
                            <h1 class="display-1">--</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

            <hr>

            <div class="row mb-3">
                <div class="col-lg-4 col-md-5">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Tu Perfil</h4>
                            <p class="card-text">
                                <ul>
                                <li>Nombre: {{ auth()->user()->name }}</li>
                                <li>Email: {{ auth()->user()->email }}</li>
                                <li>Ingreso: {{ auth()->user()->created_at->format('d M Y') }}</li>
                            </p>
                            <button type="button" class="btn btn-secondary btn-lg">Modificar</button>
                        </div>
                    </div>


                </div>

                <div class="col-lg-8 col-md-7">
                <h2 class="sub-header">Ultimos 10 lotes activos</h2>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Lote</th>
                                    <th>Comentarios</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listings as $listing)
                                <tr>
                                    <td><a href="{{ env('APP_URL')}}/console/listings/{{ $listing->id }}">{{ $listing->title }}</a></td>
                                    <td>{{ count($listing->comments) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/row-->




    
@endsection