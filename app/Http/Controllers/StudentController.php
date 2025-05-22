<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    public function index()
    {
        $students = student::get();

        return view('Students.index', compact('students'));
    }

    public function create(){
        return view('Students.create');
    }

    public function store(Request $request){
        $request->validate([
            'lname' => 'required|max:255|string',
            'fname' => 'required|max:255|string',
            'midname' => 'required|max:255|string',
            'age' => 'required|integer',
            'address' => 'required|max:255|string',
            'zip' => 'required|integer'

        ]);
        student::create($request->all());

        return redirect()->route('Students.index')->with('success', 'Student added successfully.');

    }

    public function edit( int $id){
        $students = student::find($id);
        return view ('Students.edit',compact('students'));
    }

    public function update(Request $request, int $id) {
        
            $request->validate([
                'fname' => 'required|max:255|string',
                'lname' => 'required|max:255|string',
                'midname' => 'required|max:255|string',
                'age' => 'required|integer',
                'address' => 'required|max:255|string',
                'zip' => 'required|integer',
                
            ]);
        
            student::findOrFail($id)->update($request->all());
            return redirect ()->back()->with('status','Employee Updated Successfully!');
            
    }

    public function destroy(Request $request, int $id){
        $students = student::findOrFail($id);
        $students->delete();
        return redirect ()->back()->with('status','Student Deleted');
    }

}
