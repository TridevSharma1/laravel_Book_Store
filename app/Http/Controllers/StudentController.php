<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // Show list
    public function studentlist()
    {
        $students = Student::latest()->get();
        return view('students.index', compact('students'));
    }
    // students.index = stodent->Folder name and index->File name
    // Show form
    public function studentcreateform()
    {
        return view('students.create');
    }

    // Store data

    // public function studentstore(Request $request)
    // {
    //     // Validation (default Laravel messages)
    //     $validator = Validator::make($request->all(), [
    //         'name'   => 'required|string|max:255',
    //         'email'  => 'required|email|unique:students,email',
    //         'phone'  => 'required|digits_between:10,15',
    //         'address' => 'nullable|string',
    //         'image'  => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    //     ]);
    //     // name,email,phone,address,image these are the colums of student 
    //     // table and these are the name attribute of input filled of blade file
    //     // If validation fails
    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     // Image upload
    //     $imagePath = null;

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('students', 'public');
    //     }

    //     // Store student
    //     Student::create([
    //         'name'    => $request->name,
    //         'email'   => $request->email,
    //         'phone'   => $request->phone,
    //         'address' => $request->address,
    //         'image'   => $imagePath,
    //     ]);

    //     return redirect()->route('student.list')
    //         ->with('success', 'Student Added Successfully');
    // }
    public function studentstore(Request $request)
    {
        // 1️⃣ dd validation input
        //  dd($request->all());

        // Validation
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:students,email',
            'phone'  => 'required|digits_between:10,15',
            'address' => 'nullable|string',
            'image'  => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // dd("Validation done");

            if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
            //  dd($validator->errors()); // stops here if validation fails
            }

        // 2️⃣ dd image before uploading
        //  dd($request->file('image'));

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('students', 'public');
        }

        // 3️⃣ Final dd before storing
        //  dd("Image Path: ".$imagePath, "Ready to insert!");

        // Store student (won’t run because dd stops execution)
        Student::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
            'image'   => $imagePath,
        ]);

        return redirect()->route('student.list')
            ->with('success', 'Student Added Successfully');
    }
}
