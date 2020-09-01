<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;

class StudentController extends Controller
{
    public function addStudent()
    {
    	return view('student.addStudent');
    }

    public function insertStudent(Request $request)
    {
    	$validatedData = $request->validate([
	        'name' => 'required|max:25|min:4',
	        'email' => 'required|unique:students',
	        'phone' => 'required|unique:students|max:15|min:9',
	        
	    	]);

    	$student = new Student;
    	$student->name =$request->name;
    	$student->email =$request->email;
    	$student->phone =$request->phone;
		$student->save();

		if ($student) {
    		$notification = array(
                'message' => 'Successfully Student Insert!',
                'alert-type' => 'success');
    		return Redirect()->route('allStudent')->with($notification);
    	}else{
    		$notification = array(
                'message' => 'Something went worng!',
                'alert-type' => 'error');
    		return Redirect()->back()->with($notification);
    	}

    }

    public function allStudent()
    {
    	$student=Student::all();
    	return view('student.allStudent',compact('student'));
    }

    public function viewStudent($id)
    {
        $student=Student::findorfail($id);
        return view('student.viewStudent',compact('student'));    	
    }

    public function deleteStudent($id)
    {	
    	$student=Student::find($id);
    	$student->delete();
    	$notification = array(
                'message' => 'Successfully Categorie Delete!',
                'alert-type' => 'success');
            return Redirect()->back()->with($notification);
    }

    public function editStudent($id)
    {
    	$student=Student::findorfail($id);
    	return view('student.editStudent',compact('student'));
    }

    public function updateStudent(Request $request,$id)
    {
    	$validatedData = $request->validate([
	        'name' => 'required|max:25|min:4',
	        'email' => 'required',
	        'phone' => 'required|max:15|min:9',
	        
	    	]);

    	$student=Student::findorfail($id);
    	$student->name =$request->name;
    	$student->email =$request->email;
    	$student->phone =$request->phone;
		$student->save();

		if ($student) {
    		$notification = array(
                'message' => 'Successfully Student Update!',
                'alert-type' => 'success');
    		return Redirect()->route('allStudent')->with($notification);
    	}else{
    		$notification = array(
                'message' => 'Something went worng!',
                'alert-type' => 'error');
    		return Redirect()->back()->with($notification);
    	}
    }
}
