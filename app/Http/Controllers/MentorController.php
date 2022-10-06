<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Department;

class MentorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        //get all data
        $departments = Department::all();
        $mentors = Mentor::paginate(10);

        return view('mentors.index', compact(['mentors','departments']));
    }

    public function store(){
        
        request()->validate([
            'name'=>'required',
            'phone_number'=>'required',
            'department'=>'required',
            'mentees'=>'required',
            'school'=>'required',
            'created_by'=>'required'
        ]);
        
        //request data and send to db
        $mentor = new Mentor();
        $mentor->name = request('name');
        $mentor->phone_number = request('phone_number');
        $mentor->department = request('department');
        $mentor->mentees = request('mentees');
        $mentor->school = request('school');
        $mentor->created_by = request('created_by');
        $mentor->save();
        
        return redirect('/mentors_index')->with('mssg', 'mentor registered successfuly');  
    }

    public function edit($id){
        //edit query
        $departments = Department::all();
        $mentor = Mentor::findOrFail($id);
        return view('mentors.edit', compact(['mentor', 'departments']));
    }

    public function destroy($id){
        //delete data with id
        $mentor = Mentor::findOrFail($id);
        $mentor->delete();
        return redirect('/mentors_index')->with('mssg', 'mentor deleted successfully');

    }

    public function update($id){

        request()->validate([
            'name'=>'required',
            'phone_number'=>'required',
            'department'=>'required',
            'mentees'=>'required',
            'school'=>'required',
            'created_by'=>'required'
        ]);
            $mentor = Mentor::findOrFail($id);
            $mentor->name = request('name');
            $mentor->phone_number = request('phone_number');
            $mentor->department = request('department');
            $mentor->mentees = request('mentees');
            $mentor->school = request('school');
            $mentor->created_by = request('created_by');
            $mentor->update();

        return redirect('/mentors_index')->with('mssg', 'mentor updated successfully');
    }

    public function search(){
        //search query
        $departments = Department::all();
        $search = request('search');

        if($search){
            $mentors = Mentor::where('name', 'LIKE', "%{$search}%")->paginate(3);
        }else{
            $mentors = Mentor::paginate(10);
        }

        return view('mentors.index', compact(['mentors','departments']));
    }
}
