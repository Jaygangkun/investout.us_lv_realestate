<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Requests\TimeslotStoreRequest;
use App\Inquiry;
use Carbon\Carbon;
use function foo\func;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingContoller extends Controller
{
    public function index()
    {
        $slots = Booking::orderBy('date', 'desc')->get();
        $slots = collect($slots)->groupBy('date');
        $timeslots = [];
        if (collect($slots)->count() > 0) {
            $c = 0;
            foreach ($slots as $key => $slot) {
                $timeslots[$c]['date'] = $key;
                $timeslots[$c]['total'] = collect($slot)->count();
                $c++;
            }
        } else {
            $timeslots = null;
        }
        return view('admin.bookings.index', compact('timeslots'));
    }

    public function addTimeSlot()
    {
        return view('admin.bookings.form');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'slots' => 'required|array|min:1',
                'slots.*.start' => 'required',
                'slots.*.end' => 'required'
            ], ['slots.required' => 'You have to add at least one slot.',
                    'slots.*.start.required' => 'start time can not be empty',
                    'slots.*.end.required' => 'start time can not be empty'
                ]
            );

            if ($validator->fails()) {
                return redirect(route('booking.add'))
                    ->withErrors($validator)
                    ->withInput();
            }
            $date = $request->date;
            $exist = Booking::whereDate('date', $date)->first();
            if ($exist) {
                return redirect()->back()->with('failure', 'Time-slots are already added for this date, Please try update or select different date!');
            }
            $slotss = array_values($request->slots);
            $available=0;
            for($k=0;$k < collect($slotss)->count();$k++) {
                $start_time = Carbon::parse($slotss[$k]['start'])->format('H:i:s');
                $end_time = Carbon::parse($slotss[$k]['end'])->format('H:i:s');


                foreach ($slotss as $key => $val) {
                    if ($key != $k) {
                        if ($val['start'] < $start_time && $val['end'] > $start_time) {
                            $available++;
                        } elseif (($val['end'] < $end_time) && ($val['start'] > $end_time)) {
                            $available++;
                        } elseif($val['start']==$start_time && $val['end']==$end_time){
                            $available++;
                        }
                    }
                }
            }
            if ($available>0) {
                return redirect()->back()->withInput()->with('failure', 'Time slots are conflicting please correct them');
            }
            for ($k = 0; $k < collect($slotss)->count(); $k++) {
                Booking::create([
                    'date' => Carbon::parse($date)->format('Y-m-d'),
                    'start_time' => Carbon::parse($slotss[$k]['start'])->format('H:i:s'),
                    'end_time' => Carbon::parse($slotss[$k]['end'])->format('H:i:s'),
                ]);
            }
            return redirect(route('booking.index'))->with('success', 'Time-slots are created!');

        } catch
        (\Exception $e) {
            return redirect(route('booking.index'))->with('failure', 'Something went wrong!');
        }
    }

    public function edit($id)
    {
        $timeslots = Booking::where('date', $id)->toSql();
        dd($timeslots);
        $date = $id;
        $count = collect($timeslots)->count();
        return view('admin.bookings.form', compact('timeslots', 'count', 'date'));
    }

    public function update(Request $request)
    {
        try {

            if ($request->slots) {
                $validator = Validator::make($request->all(),
                    [
                        'slots' => 'required|array|min:1',
                        'slots.*.start' => 'required',
                        'slots.*.end' => 'required'
                    ], [
                        'slots.required' => 'You have to add at least one slot.',
                        'slots.*.start.required' => 'start time can not be empty',
                        'slots.*.end.required' => 'start time can not be empty'
                    ]
                );

                if ($validator->fails()) {
                    return redirect(route('booking.add'))
                        ->withErrors($validator)
                        ->withInput();
                }
            }
            if ($request->oldSlots) {
                $validator = Validator::make($request->all(),
                    [
                        'oldSlots' => 'required|array|min:1',
                        'oldSlots.*.start' => 'required',
                        'oldSlots.*.end' => 'required'
                    ], [
                        'oldSlots.required' => 'You have to add at least one slot.',
                        'oldSlots.*.start.required' => 'start time can not be empty',
                        'oldSlots.*.end.required' => 'start time can not be empty'
                    ]
                );
            }

            if ($validator->fails()) {
                return redirect(route('booking.add'))
                    ->withErrors($validator)
                    ->withInput();
            }
            $date = $request->old_date;
            $updatedDate = $request->date;
            $exist = Booking::whereDate('date', $updatedDate)->whereDate('date', '!=', $date)->get();
            if (collect($exist)->count() > 0) {
                return redirect()->back()->with('failure', 'Time-slots are already added for this date, Please try update or select different date!');
            }
            $available=0;
            if($request->slots && $request->oldSlots){
               $combinedSlots= array_merge($request->slots,$request->oldSlots);
                for($j=0;$j < collect($combinedSlots)->count();$j++) {

                    $start_time = Carbon::parse($combinedSlots[$j]['start'])->format('H:i:s');
                    $end_time = Carbon::parse($combinedSlots[$j]['end'])->format('H:i:s');
                    foreach ($combinedSlots as $key => $val) {
                        if ($key != $j) {
                            if ($val['start'] < $start_time && $val['end'] > $start_time) {
                                $available++;
                            } elseif (($val['end'] < $end_time) && ($val['start'] > $end_time)) {
                                $available++;
                            } elseif($val['start']==$start_time && $val['end']==$end_time){
                                $available++;
                            }
                        }
                    }
                }
                if ($available>0) {
                    return redirect()->back()->withInput()->with('failure', 'Time slots are conflicting please correct them');
                }
            }

            if ($request->slots) {
                $slotss = array_values($request->slots);
                for($k=0;$k < collect($slotss)->count();$k++) {

                    $start_time = Carbon::parse($slotss[$k]['start'])->format('H:i:s');
                    $end_time = Carbon::parse($slotss[$k]['end'])->format('H:i:s');


                    foreach ($slotss as $key => $val) {
                        if ($key != $k) {
                            if ($val['start'] < $start_time && $val['end'] > $start_time) {
                                $available++;
                            } elseif (($val['end'] < $end_time) && ($val['start'] > $end_time)) {
                                $available++;
                            } elseif($val['start']==$start_time && $val['end']==$end_time){
                                $available++;
                            }
                        }
                    }
                }
                if ($available>0) {
                    return redirect()->back()->withInput()->with('failure', 'Time slots are conflicting please correct them');
                }
                for ($l = 0; $l < collect($slotss)->count(); $l++) {
                    Booking::create([
                        'date' => $updatedDate,
                        'start_time' => Carbon::parse($slotss[$l]['start'])->format('H:i:s'),
                        'end_time' => Carbon::parse($slotss[$l]['end'])->format('H:i:s'),
                    ]);
                }
            }
            else {
                $oldSlots = array_values($request->oldSlots);
                for($m=0;$m < collect($oldSlots)->count();$m++) {
                    $start_time = Carbon::parse($oldSlots[$m]['start'])->format('H:i:s');
                    $end_time = Carbon::parse($oldSlots[$m]['end'])->format('H:i:s');


                    foreach ($oldSlots as $key => $val) {
                        if ($key != $m) {
                            if ($val['start'] < $start_time && $val['end'] > $start_time) {
                                $available++;
                            } elseif (($val['end'] < $end_time) && ($val['start'] > $end_time)) {
                                $available++;
                            } elseif($val['start']==$start_time || $val['end']==$end_time){
                                $available++;
                            }
                        }
                    }
                }
                if ($available>0) {
                    return redirect()->back()->withInput()->with('failure', 'Time slots are conflicting please correct them');
                }
                for ($n = 0; $n < collect($request->oldSlots)->count(); $n++) {
                    Booking::where('id', $oldSlots[$n]['id'])->update([
                        'date' => $updatedDate,
                        'start_time' => Carbon::parse($oldSlots[$n]['start'])->format('H:i:s'),
                        'end_time' => Carbon::parse($oldSlots[$n]['end'])->format('H:i:s'),
                    ]);
                }
            }


            return redirect(route('booking.index'))->with('success', 'Time slots are updated!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('failure', 'Something went wrong');
        }
    }

    public function deleteSlot($date)
    {
        try {
            Booking::whereDate('date', $date)->delete();
            return redirect(route('booking.index'))->with('success', 'Timeslots are deleted!');
        } catch (\Exception $e) {
            return redirect(route('booking.index'))->with('failure', 'Something went wrong!');
        }
    }

    public function getTimeSlots(Request $request)
    {
        $date = Carbon::parse($request->date)->format('Y-m-d');
//        $date = Carbon::parse($parsedDateTime)->format('Y-m-d');
        $timeslots = Booking::whereDate('date', $date)->where('is_booked', 0)->get();
        foreach ($timeslots as $k=>$v){
            $timeslots[$k]['start_time']=Carbon::parse($v['start_time'])->format('g:i a');
            $timeslots[$k]['end_time']=Carbon::parse($v['end_time'])->format('g:i a');
        }
        return response()->json(['message' => 'time-slots fetched!', 'timeSlots' => $timeslots]);
    }

    public function deleteTimeSlot(Request $request)
    {
        Booking::where('id', $request->id)->delete();
        return 'deleted';
    }

}
