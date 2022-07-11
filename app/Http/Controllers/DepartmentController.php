<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index(){
        $departments = Department::paginate(5);

        return view('departments.index', compact('departments'));
    }

    public function store(){
        $department = new Department();
        $department->name = request('name');
        $department->value = request('value');
        $department->save();

        return redirect('/departments_index')->with('mssg', 'user registered successfuly'); 
    }

    public function update($id){
        $department = Department::findOrFail($id);
        $department->name = request('name');
        $department->value = request('value');
        $department->update();

        return redirect('/departments_index')->with('mssg', 'user updated successfuly');

    }

    public function destroy($id){
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect('/departments_index')->with('mssg', 'user deleted successfuly');
    }

    public function edit($id){
        $department = Department::findOrFail($id);

        return view('departments.edit', compact('department'));

    }

    public function search(){
        $search = request('search');

        if($search){
            $departments = Department::where('name','LIKE',"%{$search}%")->paginate(3);
        }else{
            $departments = Department::paginate(5);
        }

        return view('departments.index', compact('departments'));
    }
}
