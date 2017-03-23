@extends('console.master')



@section('content')
    <h2>Nuevo Lote a la venta</h2>
    <hr>

<div class="col-md-7 col-lg-8 main">
<form method="post" action="/console/listings"  enctype="multipart/form-data">
    {{ csrf_field() }}

    
  <div class="form-group" >

    <label for="title">Título</label>
    <input type="text" class="form-control" id="title" name="title" value="Autogenerado..." disabled>  
  </div>

  <div class="form-group">
    <label for="heads">Cabezas</label>
    <input type="text" class="form-control" id="heads" name="heads" required>
  </div>

  <div class="form-group">
    <label for="category_id">Categoría</label>
    <select class="form-control" id="category_id" name="category_id">
      @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="breed_id">Raza</label>
    <select class="form-control" id="breed_id" name="breed_id">
      @foreach($breeds as $breed)
        <option value="{{ $breed->id }}">{{ $breed->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="unitweight">Peso unitario (kg.)</label>
    <input type="text" class="form-control" id="unitweight" name="unitweight" required v-bind="value2">
  </div>

  <div class="form-group">
    <label for="paymentmethods">Métodos de Pago</label>
    <select class="form-control" multiple="multiple" id="paymentmethods" name="paymentmethods[]">
      @foreach($pms as $pm)
        <option value="{{ $pm->id }}">{{ $pm->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label for="description">Descripción</label>
    <textarea id="description" name="description" class="form-control"></textarea>
  </div>

<!--
  <div class="form-group">
    <label for="files">Imágenes del lote</label>
    <input type="file" id="files" name="files[]" class="form-control-file" aria-describedby="fileHelp" multiple>
    <small id="fileHelp" class="form-text text-muted">Suba hasta 5 imágenes del lote.</small>
  </div>
-->
  <label for="files">Imágenes del lote</label>
  <div class="form-group">
          <input name="files[]" id="files" type="file" multiple>
          <br>
  </div>

  <div class="form-group">
  <button type="submit" class="btn btn-primary">Crear</button>
  </div>
    
      @include('layouts.errors')
    
</form>

</div>

@endsection

@section('scripts')
<script type="text/javascript">

// Select 2 dropdowns
$("#paymentmethods").select2({
  placeholder: "Seleccione los métodos de pago que usted acepta",
});
$("#breed_id").select2({
  placeholder: "Seleccione la raza del animal",
});
$("#category_id").select2({
  placeholder: "Seleccione la categoría del animal",
});

// Title auto fill
$("#heads").keyup(function( event ) {
  txt = $('#heads').val() + " " + $('#category_id :selected').text() + " " + $('#breed_id :selected').text();;
  $('#title').val(txt);
});

$("#category_id").change(function( event ) {
  txt = $('#heads').val() + " " + $('#category_id :selected').text() + " " + $('#breed_id :selected').text();;
  $('#title').val(txt);
});


$("#breed_id").change(function( event ) {
  txt = $('#heads').val() + " " + $('#category_id :selected').text() + " " + $('#breed_id :selected').text();;
  $('#title').val(txt);
});

/*// FileInput
$(document).ready(function () {
        $("#files").fileinput({
            'theme': 'explorer',
            'language': 'es', 
            //'uploadUrl': '#',
            allowedFileExtensions: ['jpg', 'png', 'gif', 'bmp'],
            maxFileSize: 2048,
            maxFilesNum: 5,
            overwriteInitial: false,
            showUpload: false,
            initialPreviewAsData: true,
        });
});
*/
</script>
@endsection

