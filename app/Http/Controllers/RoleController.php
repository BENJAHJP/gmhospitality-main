<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index(){
        $roles = Role::paginate(5);

        return view('roles.index', compact('roles'));
    }

    public function store(){
        request()->validate([
            'name'=>'required',
            'value'=>'required',
            'created_by'=>'required'
        ]);

        $role = new Role();
        $role->name = request('name');
        $role->value = request('value');
        $role->created_by = request('created_by');
        $role->save();

        return redirect('/roles_index')->with('role registered successfuly'); 
    }

    public function update($id){
        request()->validate([
            'name'=>'required',
            'value'=>'required',
            'created_by'=>'required'
        ]);
        
        $role = Role::findOrFail($id);
        $role->name = request('name');
        $role->value = request('value');
        $role->created_by = request('created_by');
        $role->update();

        return redirect('/roles_index')->with('role updated successfuly');

    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect('/roles_index')->with('role deleted successfuly');
    }

    public function edit($id){
        $role = Role::findOrFail($id);

        return view('roles.edit', compact('role'));

    }

    public function search(){
        $search = request('search');

        if($search){
            $roles = Role::where('name','LIKE',"%{$search}%")->paginate(3);
        }else{
            $roles = Role::paginate(5);
        }

        return view('roles.index', compact('roles'));
    }    
}
