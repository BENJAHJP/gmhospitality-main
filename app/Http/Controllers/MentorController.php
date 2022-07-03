<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;

class MentorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $mentors = Mentor::all();

        return view('mentors.index', compact('mentors'));
    }

    public function store(){
        
        //request data and send to db
        $mentor = new Mentor();
        $mentor->name = request('name');
        $mentor->phone_number = request('phone_number');
        $mentor->department = request('department');
        $mentor->mentees = request('mentees');
        $mentor->school = request('school');
        $mentor->save();
        
        return redirect('/mentors_index')->with('mssg', 'mentor registered successfuly');  
    }

    public function edit($id){
        $mentor = Mentor::findOrFail($id);
        return view('mentors.edit', compact('mentor'));
    }

    public function destroy($id){
        //delete data with id
        $mentor = Mentor::findOrFail($id);
        $mentor->delete();
        return redirect('/mentors_index')->with('mssg', 'mentor deleted successfully');

    }

    public function update($id){
        $mentor = Mentor::findOrFail($id);
        $mentor->name = request('name');
        $mentor->phone_number = request('phone_number');
        $mentor->department = request('department');
        $mentor->mentees = request('mentees');
        $mentor->school = request('school');
        $mentor->update();

        return redirect('/mentors_index')->with('mssg', 'mentor updated successfully');
    }
}
