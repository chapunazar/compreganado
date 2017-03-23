        {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="type">Tipo</label>
        <input type="text" class="form-control" id="type" name="type">
      </div>
      <div class="form-group">
        <label for="description">Descripción</label>
        <textarea id="description" name="description" class="form-control"></textarea>
      </div>
      <div class="form-group">
      <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
      </div>