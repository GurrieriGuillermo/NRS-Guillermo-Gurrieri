
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="update-form">
            @csrf()
            @method("put")
            <input class="update-name" type="text" name="name">
            <input class="update-range_x" type="number" name="range_x">
            <input class="update-range_y" type="number" name="range_y">
            <input class="update-event_day" type="datetime-local" name="event_day">
            <textarea class="update-description" name="description" cols="30" rows="3"></textarea>
            <input type="submit">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>