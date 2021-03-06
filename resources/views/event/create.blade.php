<form action="/event" method="post">
    @csrf()
    <input type="text" name="name">
    <input type="number" name="range_x">
    <input type="number" name="range_y">
    <input type="datetime-local" name="event_day">
    <textarea name="description" cols="30" rows="3"></textarea>
    <input type="submit">
</form>
