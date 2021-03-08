<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DetailBooking;
use App\Models\Booking;
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
    public function getEventById($id)
    {
        $event = Event::find($id);
        return response()->json($event);
    }
    
    public function showEvent($id)
    {
        $event = Event::find($id);
        $userBookings = Booking::where([
            ['user_id', Auth::user()->id],
            ['event_id', $id],
        ])->get();
        $occupiedSeats = Event::getOccupiedSeats($id);
        $occupiedSeatByUsers = Event::getOccupiedSeatByUsers($id);
        return view("dashboard.event", [
            'event' => $event,
            'userBookings' => $userBookings,
            'occupiedSeats' => $occupiedSeats,
            'occupiedSeatByUsers' => $occupiedSeatByUsers
        ]);
    }

    public function confirmEventBooking( Request $request, $event_id)
    {
        $occupiedSeats = Event::getOccupiedSeats($event_id);
        $isFreeSeats = $this->isFreeSeats($occupiedSeats, $request->seats);
        if ($isFreeSeats) {
            $booking_id = $this->saveBooking($event_id);
            $this->saveDetailBooking($booking_id, $request->seats);
            return true;
        }else{
            return false;
        }
    }

    private static function isFreeSeats($occupiedSeats, $seatsBooking)
    {
        $intersect = array_intersect($occupiedSeats, $seatsBooking);
        return (count($intersect) == 0) ? true : false;
    }

    private static function saveBooking($event_id)
    {
        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'event_id' => $event_id
        ]);
        return $booking->id;
    }
    private static function saveDetailBooking($booking_id, $seats)
    {
        foreach ($seats as $seat) {
            DetailBooking::create([
                'booking_id' => $booking_id,
                'seat' => $seat
            ]);
        }
    }
    
}
