<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder\UserSeeder;
use Illuminate\Support\Str;

use Faker\Generator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\Booking;
use App\Models\DetailBooking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => "admin",
                'lastname' => "admin",
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
            ]
        );
        for ($i=0; $i <  rand(5, 7) ; $i++) { 
            User::create(
                [
                    'name' => "user_" . $i,
                    'lastname' => "user_" . $i,
                    'email' => 'user_' .  $i . '@gmail.com',
                    'password' => Hash::make('user'),
                ]
            );
        }
        for ($i=0; $i <  rand(5, 7) ; $i++) { 
            $range_x = rand(8, 15);
            $range_y = rand(8, 15);
            $event = Event::create([
                'name' =>  Str::random(10),
                'description' => Str::random(10),
                'event_day' => Carbon::create('2021', rand(1, 12) , rand(1, 29)),
                'range_x' => $range_x,
                'range_y' => $range_y,
            ]);
            for ($j=0; $j <  rand(5, 9) ; $j++) { 
                $booking = Booking::create([
                    'user_id' =>  rand(1, 5),
                    'event_id' => $event->id,
                ]);
                $rand_x = rand(1, $range_x);
                $rand_y = rand(1, $range_y);
                for ($k=0; $k <  rand(1, 7) ; $k++) {
                    DetailBooking::create([
                        'booking_id' => $booking->id,
                        'seat' => $rand_x ."x". $rand_y,
                    ]);
                    $rand_y ++; 
                }
            }
        }
        
    }
}
