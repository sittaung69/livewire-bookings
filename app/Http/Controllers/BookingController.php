<?php

namespace App\Http\Controllers;

use App\Bookings\TimeSlotGenerator;
use App\Models\Schedule;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $schedule = Schedule::find(2);

        $slots = (new TimeSlotGenerator($schedule))->get();
        
        return view('bookings.create', [
            'slots' => $slots
        ]);
    }
}
