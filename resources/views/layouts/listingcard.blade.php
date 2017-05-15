@extends('layouts.master')

@section('nav')
    @include('layouts.navdetail')
@endsection

@section('content')
<div id="content">
        
    
    <div class="container">
        
        <div class="row">
                <!-- Sidebar -->
        
            <div class="col-12 col-md-2 push-md-10 bd-sidebar">
            @include('layouts.sidebar')
            </div>

      
                <!-- Main content -->
            <div class="col-12 col-md-10 pull-md-2 bd-content">
                @if ($flash = session('message'))
                    <div id="flash-message" class="row justify-content-center">
                        <div class="alert alert-success col-lg-4" role="alert">
                            <center>{{ $flash }}</center>
                        </div>
                    </div>
                @endif
                <div class="col-sm-10"> 
                    
                    <div class="card">
                        <div class="card-header">
                        <h2>{{ $listing->title }}</h2>   <i> de <strong>{{ $listing->user->name }}</strong> {{ $listing->created_at->diffForHumans() }}</i> 

                            <div class="text-right">
                            @if($listing->hasExpired())
                                <span class="badge badge-danger">Expiró el {{ $listing->expiration_date->toFormattedDateString() }} </span>
                            @else
                            
                                @if (Auth::check())
                                <ul class="navbar-nav ml-auto">
                                  <li class="nav-item active">
                                   <a href="" class="btn btn-warning btn-sm" role="button" data-target="#modalOffer" data-toggle="modal"  data-backdrop="static" >Ofertar al vendedor</a>
                                  </li>
                                </ul> 
                                @else
                                   <span class="badge badge-warning">Para que lo contacten debe registrarse.</span>
                                    

                                @endif  
                            @endif
                            </div>  
                        </div>
                 
                                     
                        <div class="card-block">
                            
                        <table class="table">
                            <tbody>
                                <tr>
                                        
                                        <td colspan="2">
                                             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 400px; margin: 0 auto">
                                                  <ol class="carousel-indicators">
                                                        <?php $counter=0; foreach ($listing->listingfiles as $file){ ?>
                                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $counter }}" <?= ($counter==0)?'class="active"':'' ?>class="active">
                                                                
                                                            </li>
                                                        <?php $counter++; } ?>
                                                  </ol>
                                                  <div class="carousel-inner" role="listbox">
                                                    <?php $counter=0; foreach ($listing->listingfiles as $file){ ?>
                                                        <div class="carousel-item<?= ($counter==0)?' active':'' ?>">
                                                          <img class="d-block img-fluid" src="/{{ $file->filename }}" alt="imagen">
                                                        </div>
                                                    <?php $counter++; } ?>
                                                  </div>
                                                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                  </a>
                                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                  </a>
                                                </div>
                                        </td>
                                </tr>
                                <tr>
                                        <th colspan="2">Vence el {{ $listing->expiration_date->toFormattedDateString() }}
                                        @if ($listing->expiration_date->diffInDays(\Carbon\Carbon::now()) <= 10)
                                            en {{ $listing->expiration_date->diffInDays(\Carbon\Carbon::now()) }} dia(s)
                                        @endif
                                         </th>
                                </tr>
                                <tr>
                                        <th>Raza</th>
                                        <td>{{ $listing->breed->name }}</td>
                                </tr>
                                <tr>
                                        <th>Categoría</th>
                                        <td>{{ $listing->category->name }}</td>
                                </tr>
                                <tr>
                                        <th>Cabezas</th>
                                        <td>{{ $listing->heads }}</td>
                                </tr>
                                <tr>
                                        <th>Peso approx</th>
                                        <td>{{ $listing->unitweight }}</td>
                                </tr>                            
                                <tr>
                                        <th>Métodos de pago:</th>
                                        <td>
                                            @if (count($listing->paymentmethods))
                                                @foreach ($listing->paymentmethods as $pm)
                                                    <span class="badge badge-pill badge-info">{{ $pm->name }}</span>
                                                @endforeach
                                            @else
                                                No definido
                                            @endif
                                        </td>
                                </tr>  
                                <tr>
                                        <th>Notas</th>
                                        <td>{{ $listing->description }}</td>
                                </tr>                            
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>    <br />
                            <div class="col-sm-7">
                                <strong>Comentarios:</strong> {{ count($listing->comments) }} comentario(s)
                                @foreach ($listing->comments as $comment)
                                <div class="card">
                                            <div class="card-header">
                                            <strong>{{ $comment->user->name }}</strong>
                                                @if ($listing->user->email==$comment->user->email)
                                                <span class="badge badge-success">Vendedor</span>
                                                @endif
                                            <span class="text-muted">{{ $comment->created_at->diffForHumans() }}:&nbsp;</span>
                                        </div>
                                        <div class="card-block">
                                            <div class="card-text">
                                                {{ $comment->body }}
                                            </div>
                                        </div>
                                </div> <br />             
                                @endforeach
                            </div><!-- /col-sm-* -->

                    <br />   
                    {{-- add comment --}}
                    <div class="card">
                        <div class="card-block">
                            <form method="post" action="/listings/{{ $listing->id }}/comments">
                              {{ csrf_field() }}
                              <div class="form-group">
                                <textarea id="body" name="body" class="form-control" placeholder="Agregue comentarios..." required></textarea>
                              </div>
                                @if (Auth::check())
                              <div class="form-group">
                              <button type="submit" class="btn btn-primary">Agregar</button>
                              </div>
                                @else
                                Necesita loguearse para comentar.
                                @endif

                            @include('layouts.errors')

                            </form>
                        </div>
                    </div>        
                
            </div>
        </div>
    </div>
    

    
</div><!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="modalOffer" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Ingrese su oferta</h4>
                            <form method="post" action="/listings/{{ $listing->id }}/offers" name="frm_offer" id="frm_offer">
                              {{ csrf_field() }}
                                <div class="form-group">
                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="$/kg." required>
                                </div>
                              <div class="form-group">
                                <textarea id="body" name="body" class="form-control" placeholder="Deje una nota al vendedor"></textarea>
                              </div>
                                @if (Auth::check())
                              <div class="form-group">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="button" class="btn btn-primary" id="btn_offer" name="btn_offer">Ofertar</button>
                              </div>
                                @else
                                Necesita loguearse para ofertar.
                                @endif

                            <div id="form-msg"></div>

                            </form>
                        </div>
                    </div>  
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">

/* Submit offer ajax   */
$(function() {
    $("#btn_offer").click(function(e){
        e.preventDefault();

        //make ajax call
        $.ajax({
            type: "POST",
            url: "/listings/{{ $listing->id }}/offers",
            data: $('#frm_offer').serialize(),
            success: function(msg){
                /*if(msg == 1) $("#modal").modal('hide');
                else if(msg == 2) $("#message").html("Bad Email");
                */
                txtHTML = '<div class="alert alert-success">';
                txtHTML += 'Su oferta ha sido enviada';
                txtHTML += '</div>';

                // empty form so it doesnt show again with the previous offer when modal is reopened
                $('#frm_offer').trigger("reset");

                //Close modal
                //$('#modalOffer').modal('toggle');

                $("#btn_offer").prop("disabled",true);
                $( '#form-msg' ).html( txtHTML );
                setTimeout(function(){
                    location.reload();
                    /*
                    $('#modalOffer').modal('toggle');
                    //clear msg div
                    $( '#form-msg' ).html( '' );
                    */
                }, 4000);
                


            },
            error: function(jqXhr){
                if( jqXhr.status === 401 ) //redirect if not authenticated user.
                    $( location ).prop( 'pathname', '/login' );
                if( jqXhr.status === 422 ) {
                    var errors = jqXhr.responseJSON;
                    //console.log(errors);
                    errorsHtml = '<div class="alert alert-danger"><ul>';

                    $.each( errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></div>';
                
                    $( '#form-msg' ).html( errorsHtml ); //appending to a <div id="form-msg"></div> inside form
                } else {
                    //Unhandled error, sent to home
                    $( location ).prop( 'pathname', '/' );
                }
            }
        });

    });
});


</script>
@endsection