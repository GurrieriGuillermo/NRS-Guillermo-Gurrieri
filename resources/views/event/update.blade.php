<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">Modificar evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" class="update-form">
                <div class="modal-body">
                    @csrf()
                    @method("put")
                    <div class="form-group">
                        <label for="name">Nombre del evento<span class="text-warning">*</span></label>
                        <input class="form-control update-name" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="range_x">Cantidad de sillas en fila<span class="text-warning">*</span></label>
                        <input class="form-control update-range_x" type="number" name="range_x" requered>
                    </div>
                    <div class="form-group">
                        <label for="range_y">Cantidad de sillas en columna<span class="text-warning">*</span></label>
                        <input class="form-control update-range_y" type="number" name="range_y" requered>
                    </div>
                    <div class="form-group">
                        <label for="event_day">Día y hora del evento<span class="text-warning">*</span></label>
                        <input class="form-control update-event_day" type="datetime" name="event_day" requered>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripcíon</label>
                        <textarea class="form-control update-description" name="description" cols="30" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
