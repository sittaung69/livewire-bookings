<?php

namespace App\Http\Controllers;

use App\Bookings\Filters\SlotsPassedTodayFilter;
use App\Bookings\TimeSlotGenerator;
use App\Models\Schedule;
use App\Models\Service;
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
        $schedule = Schedule::find(1);
        $service = Service::find(2);

        $slots = (new TimeSlotGenerator($schedule, $service))
            ->applyFilters([
                new SlotsPassedTodayFilter()
            ])
            ->get();
        
        return view('bookings.create', [
            'slots' => $slots
        ]);
    }
}
