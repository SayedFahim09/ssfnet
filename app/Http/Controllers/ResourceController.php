<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;
class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=Student::all();
        return view('resource.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return Redirect()->route('resource.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something went worng!',
                'alert-type' => 'error');
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::findorfail($id);
        return view('resource.show',compact('student')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::findorfail($id);
        return view('resource.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            return Redirect()->to('resource')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something went worng!',
                'alert-type' => 'error');
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $student=Student::find($id);
       $student->delete();
        $notification = array(
                'message' => 'Successfully Categorie Delete!',
                'alert-type' => 'success');
            return Redirect()->back()->with($notification);
    }
}
