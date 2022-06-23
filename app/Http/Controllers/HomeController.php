<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){

            if(Auth::user()->usertype=='0'){
                $doctors = doctor::all();
                return view('user.home',compact('doctors'));
            }else{
                return view('admin.home');
            }

        }else{
            redirect()->back();
        }
    }

    public function index(){
        if(Auth::id()){
            return redirect('home');
        }else{
            $doctors = doctor::all(); // get all the data from database
    
            return view('user.home',compact('doctors')); // send the data to home page
        }
    }

    public function appointment(Request $request){
        $appointment = new appointment;
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->doctor = $request->doctor;
        $appointment->number = $request->number;
        $appointment->message = $request->message;
        $appointment->status = 'In Progress';

        if(Auth::id()){

            $appointment->user_id = Auth::user()->id;
        }

        $appointment->save();

        return redirect()->back()->with('message','Appointment Maked Successfully We Contact with you soon!');

    }

    public function myappointment(){
        if(Auth::id()){

            $userid = Auth::user()->id;

            $appointment = appointment::where('user_id', $userid)->get();


            return view('user.myappointment',compact('appointment'));
        }else{
            return redirect()->back();
        }
    }

    public function cancel_appoint($id){

        $data = appointment::find($id);
        $data->delete();

        return redirect()->back();
    }
}
