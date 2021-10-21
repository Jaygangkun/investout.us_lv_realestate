<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Requests\InquiryStoreRequest;
use App\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\envoysAppointmentSchedule;

class InquiryController extends Controller
{
    public function store(InquiryStoreRequest $request)
    {
        $inputs = $request->except('_token');
        try {
            $inputs['is_approved'] = 0;
            Booking::where('id',$request->slot_id)->update(['is_booked'=>1]);
            Inquiry::create($inputs);
            return redirect(route('envoy.index'))->with('success', 'Inquiry form is submitted!');
        }catch(\Exception $e){
            return redirect(route('envoy.index'))->with('failure','something went wrong!');
        }
}

    public function accept(Request $request,$id)
    {
        try {
            $inquiries = Inquiry::where('id', $id)->first();
            Inquiry::where('id', $id)->update(['is_approved'=>1]);
            Mail::to($inquiries->email)->send(new envoysAppointmentSchedule($inquiries, $inquiries->first_name.' '.$inquiries->last_name));
            return redirect(route('reservation.index'))->with('success', 'Inquiry Request Accepted');
        }catch (\Exception $e){
            return redirect()->back()->with('failure','something went wrong');
        }
    }
    public function reject(Request $request,$id)
    {
        try {
            $inquiries=Inquiry::where('id', $id)->first();
            Inquiry::where('id',$id)->update(['is_approved'=>2]);
            Booking::where('id',$inquiries->slot_id)->update(['is_booked'=>0]);
            return redirect(route('reservation.index'))->with('success', 'Inquiry Request Rejected');
        }catch (\Exception $e){
            return redirect()->back()->with('failure','something went wrong');
        }
    }

    public function editInquiry($id){
       $inquiries= Inquiry::with('bookings')->where('id',$id)->first();
       return view('admin.reservations.form',compact('inquiries'));
    }

    public function updateInquiry(Request $request,$id){
        $inputs=$request->except('_token');
        Inquiry::where('id',$id)->update([
           'first_name'=>$inputs['first_name'],
           'last_name'=>$inputs['last_name'],
           'email'=>$inputs['email'],
           'mobile_number'=>$inputs['mobile_number'],
            'date'=>$inputs['date'],
            'zipcode'=>$inputs['zipcode'],
           'description'=>$inputs['description']

        ]);
        return redirect(route('reservation.index'))->with('success','Inquiry Details Updated!');
    }

    public function deleteInquiry($id){
      $inquiry=  Inquiry::where('id',$id)->first();
        Booking::where('id',$inquiry->slot_id)->update(['is_booked'=>0]);
        $inquiry->delete();
        return redirect()->back()->with('Inquiry Deleted!');
    }
}
