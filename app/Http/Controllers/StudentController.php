<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    //

    public function index()
    {

        $student = Student::all();
        return view('student.index', compact('student'));
    }



    public function addstudent()
    {
        return view('student.addstudent');
    }


     public function store(Request $requset){

        $student = new Student;
        $student->name = $requset->input('name');
        $student->email = $requset->input('email');
        $student->course = $requset->input('course');
        if($requset->hasfile('profile_image'))
        {
            $file = $requset->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }
        $student->save();
        return redirect('/students')->with('status','student Image ADded');
     }


     public function editstudent($id){

        $student =Student::find($id);
        return view('student.edit' ,compact('student'));

     }


     public function update(Request $requset , $id){

        $student = Student::find($id);
        $student->name = $requset->input('name');
        $student->email = $requset->input('email');
        $student->course = $requset->input('course');
         
        if($requset->hasfile('profile_image'))
        {
            $destination = 'uploads/students/'.$student->profile_image;

            if (File::exists($destination))
            {
                File::delete($destination);

            }
            $file = $requset->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }
        $student->update();
        return redirect('/students')->with('status','student Image udpadted');

     }

     public function deletestudent($id){

        $student = Student::find($id);
        $destination = 'uploads/students/'.$student->profile_image;
        if (File::exists($destination))
        {
            File::delete($destination);

        }
        $student->delete();
        return redirect('/students')->with('status','student Image Deleted');

     }

    }
