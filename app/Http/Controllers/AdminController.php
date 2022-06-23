<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\Appointment;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function addview(){

        if(Auth::id()){
            if(Auth::user()->usertype == 1){

                return view('admin.add_doctor');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function upload(Request $request){

        $doctor = new doctor;
        //image
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension(); //name of the image
        $request->image->move('doctorimage',$imagename); // save the image in public/doctorimage 
        $doctor->image = $imagename; //image is from doctor table 
        //name
        $doctor->name=$request->name; //$doctor->name is the name in database & $request->name is the name in form
        //number
        $doctor->number=$request->number;
        //speciality
        $doctor->speciality=$request->speciality;
        //room
        $doctor->room=$request->room;
        
        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function show_appointment(){
        $data = appointment::all();

        return view('admin.showappointment',compact('data'));
    }

    public function approve($id){

        $data = appointment::find($id);
        $data->status = "Approved";
        $data->save();

        return redirect()->back();
    }

    public function cancel($id){

        $data = appointment::find($id);
        $data->status = "Canceled";
        $data->save();

        return redirect()->back();
    }

    public function show_doctor(){

        $data = doctor::all();

        return view('admin.showdoctor',compact('data'));
    }

    public function delete_doctor($id){
        $data = doctor::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function update_doctor($id){

        $data = doctor::find($id);

        return view('admin.updatedoctor',compact('data'));
    }

    public function edit_doctor(Request $request, $id){

        $doctor = doctor::find($id);

        $doctor->name = $request->name;
        $doctor->number = $request->number;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;
        
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension(); //name of the image
            $request->image->move('doctorimage',$imagename); // save the image in public/doctorimage 
            $doctor->image = $imagename;
        }
        
        $doctor->save();

        return redirect()->back()->with('message','Doctor Details Updated Successfully');
    }

    public function emailview($id){

        $data = appointment::find($id);

        return view('admin.email_view',compact('data'));
    }

    public function send_email(Request $request, $id){

        $data = appointment::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        Notification::send($data,new TestNotification($details));

        return redirect()->back()->with('message','Email Sent Successfully');

    }
}
