<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {   
        $request->validate([
            'name' => 'required|string', // Assuming 'name' is a string field.
            'phone' => 'required|numeric', // Assuming 'phone' is a numeric field.
            'speciality' => 'required|string', // Assuming 'speciality' is a string field.
            'room' => 'string', // Assuming 'room' is a string field.
            'image' => 'required|image|mimes:jpg,png', // Validate image upload.
        ]);

        // Check if a file was uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('doctorimage'), $imagename);
        }

        $doctor = new Doctor;
        $doctor->name = $request->input('name');
        $doctor->phone = $request->input('phone');
        $doctor->speciality = $request->input('speciality');
        $doctor->room = $request->input('room');
        $doctor->image = $imagename; // Assign the image filename.

        $doctor->save();

        return redirect()->back();
    }
    // $doctor=new doctor;

    // $image=$request->image;
        

    // $imagename=time().'.'.$image->getClientOriginalExtention();

    // $request->image->move('doctorimage',imagename);

    // $doctor->image=$imagename;

    // $doctor->name=$request->name;

    // $doctor->phone=$request->number;

    // $doctor->speciality=$request->speciality;

    // $doctor->save();

    // return redirect()->back();

}

