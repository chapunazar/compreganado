<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Confirme acción</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $confirmText }}
            </div>
            <div class="modal-footer">
                <form method="post" action="{{ $confirmAction }}">
                            {{ method_field($confirmMethod) }}   {{ csrf_field() }}            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-danger-outline">OK</button>
                </form>
            </div>
        </div>
    </div>
</div>



