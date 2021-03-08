<table class="table table-responsive">
    <thead>
        <tr>
            <th>name</th>
            <th>range</th>
            <th>description</th>
            <th>event_day</th>
            <th>created_at</th>
            <th>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
                    <i class="fa fa-plus"></i>
                </button>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{$event->name}}</td>
                <td>{{$event->range_x}}x{{$event->range_y}}</td>
                <td>{{$event->description}}</td>
                <td>{{$event->event_day}}</td>
                <td>{{$event->created_at}}</td>
                <td>
                    <button type="button" class="create-event btn btn-warning fa fa-edit" data-toggle="modal" data-target="#update" data-id="{{$event->id}}">
                    </button>
                    <button type="button" class="delete-event btn btn-danger fa fa-trash" data-toggle="modal" data-target="#delete" data-id="{{$event->id}}">
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>




