<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inquiry;
use App\Reservation;

class ReservationController extends Controller
{
    public function index(){
        $inquiries=Inquiry::with('bookings')->get();

        return view('admin.reservations.index',compact('inquiries'));
    }

    public function calendarEvent(){
        $inquiries=Booking::whereDate('date','>=',Carbon::today()->addDay(2)->format('Y-m-d'))->groupBy('date')->get();
        $data=[];
        foreach ($inquiries as $key=>$inq) {
            $data[$key]['id']=$inq->id;
            $data[$key]['title'] = 'Click here!';
            $data[$key]['date'] = $inq->date;
            $data[$key]['start'] = $inq->date.'T'.$inq->start_time;
            $data[$key]['allDay '] = true;
            $data[$key]['color'] = 'yellow';
        }
        return response()->json($data);
    }
}
