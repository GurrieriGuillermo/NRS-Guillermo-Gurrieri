<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view("event.event", ['events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->fill(
            $request->only(
                'name',
                'range_x',
                'range_y',
                'description',
                'event_day'
            )
        );
        $event->save();
        return redirect(url('/event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Event::find($id)->update(
            $request->only(
                'name',
                'range_x',
                'range_y',
                'description',
                'event_day'
            )
        );
        return redirect(url('/event'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect(url('/event'));
    }

    /**
     * show a card listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEventCardList()
    {
        $events = Event::all();
        return view("dashboard.eventlist", ['events' => $events]);
    }
    public function showEvent($id)
    {
        $event = Event::find($id);
        return view("dashboard.event", ['event' => $event]);
    }

}
