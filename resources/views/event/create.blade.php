<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/event" method="post">
                <div class="modal-body">
                        @csrf()
                        <div class="form-group">
                            <label for="name">Nombre del evento<span class="text-warning">*</span></label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="range_x">Cantidad de sillas en fila<span class="text-warning">*</span></label>
                            <input class="form-control" type="number" name="range_x" requered>
                        </div>
                        <div class="form-group">
                            <label for="range_y">Cantidad de sillas en columna<span class="text-warning">*</span></label>
                            <input class="form-control" type="number" name="range_y" requered>
                        </div>
                        <div class="form-group">
                            <label for="event_day">Día y hora del evento<span class="text-warning">*</span></label>
                            <input class="form-control" type="datetime-local" name="event_day" requered>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcíon</label>
                            <textarea class="form-control" name="description" cols="30" rows="3"></textarea>
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


