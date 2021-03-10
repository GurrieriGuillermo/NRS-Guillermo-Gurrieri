<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user" method="post">
                <div class="modal-body">
                        @csrf()
                        <div class="form-group">
                            <label for="name">Nombre<span class="text-warning">*</span></label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Apellido<span class="text-warning">*</span></label>
                            <input class="form-control" type="text" name="lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span class="text-warning">*</span></label>
                            <input class="form-control" type="text" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña<span class="text-warning">*</span></label>
                            <input class="form-control" type="text" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Confirmación de Contraseña<span class="text-warning">*</span></label>
                            <input class="form-control" type="text" name="password_confirm" required>
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


