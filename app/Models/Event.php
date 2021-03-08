<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

use App\Models\Booking;
use App\Models\DetailBooking;

class Event extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'event_day',
        'range_x',
        'range_y',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public static function getOccupiedSeats(int $id)
    {
        $seat = array();
        $bookings = Event::find($id)->bookings()->get();
        foreach ($bookings as $booking) {
            $detailBookings = $booking->detailBookings()->get();
            foreach ($detailBookings as $detailBooking) {
                array_push($seat, $detailBooking->seat) ;
            }
        }
        return $seat;
    }
    public static function getOccupiedSeatByUsers(int $id)
    {
        $seat = array();
        $bookings = Event::find($id)->bookings()->where('user_id', Auth::user()->id)->get();
        foreach ($bookings as $booking) {
            $detailBookings = $booking->detailBookings()->get();
            foreach ($detailBookings as $detailBooking) {
                array_push($seat, $detailBooking->seat) ;
            }
        }
        return $seat;
    }

}





