@extends('console.master')

@section('content')


<div class="row">
    <div class="col">
        <h2>Ofertas Recibidas</h2>
    </div>
</div>
        <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Usuario</th>
                  <th>Lote</th>
                  <th>Monto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($offers as $offer)
                <tr>
                    <td>{{ $offer->created_at->toFormattedDateString() }}</td>
                    <td><a href="#" id="linkContact" name="linkContact" data-params='{"name":"{{ $offer->user->name }}", "email":"{{ $offer->user->email }}"}'>{{ $offer->user->name }}</a></td>
                    <td><a href="{{ env('APP_URL')}}/listings/{{ $offer->listing->id }}">{{ $offer->listing->title }}</a></td>
                    <td>{{ $offer->amount }}</td>
                    <td>
                        <a href="{{ env('APP_URL')}}/console/listing/{{ $offer->listing->id }}/offer/{{ $offer->id }}" class ="btn btn-danger btn-sm">Borrar</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

<!-- Modal -->

<div class="modal fade" id="modalCard" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="contactName" name="contactName">Nombre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <div class="modal-body">
                Email: <b id="contactEmail" name="contactEmail">email</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary-outline" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- End Modal -->

@endsection


@section('scripts')
<script type="text/javascript">


//$("linkContact").click(function(e) {
$("[name='linkContact']").click(function(e) {

  var data = $(this).data('params');
  //data object is automatically parsed  
  $("#contactName").text("Contactate con " + data.name);
  $("#contactEmail").text(data.email);
  $("#modalCard").modal('toggle');
  return false;

});

</script>
@endsection