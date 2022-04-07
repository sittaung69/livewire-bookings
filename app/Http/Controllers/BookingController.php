<?php

namespace App\Http\Controllers;

use App\Bookings\Filters\AppointmentFilter;
use App\Bookings\Filters\SlotsPassedTodayFilter;
use App\Bookings\Filters\UnavailabilityFilter;
use App\Bookings\TimeSlotGenerator;
use App\Models\Appointment;
use App\Models\Employee;
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
        $service = Service::find(1); // 1 hour

        $employee = Employee::find(1); // Alex

        $slots = $employee->availableTimeSlots($schedule, $service);
        
        return view('bookings.create', [
            'slots' => $slots
        ]);
    }
}
