<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index(){
        $roles = Role::ALL();
        $users = User::paginate(10);

        return view('admin.index', compact('users','roles'));
    }

    public function store(){
        request()->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'created_by'=>'required',
            'password'=>'required',
            'role'=>'required',
        ]);

        // send data to db
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->created_by = request('created_by');
        $user->password = Hash::make(request('password'));
        $user->role = request('role');
        $user->save();

        return redirect('/admin_index')->with('mssg', 'user registered successfuly');  
    }

    public function edit($id){
        $roles = Role::ALL();
        $user = User::findOrFail($id);

        return view('admin.edit', compact('user','roles'));

    }

    public function update($id){
        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->created_by = request('created_by');
        $user->password = Hash::make(request('password'));
        $user->role = request('role');
        $user->update();

        return redirect('/admin_index')->with('mssg', 'user updated successfully');

    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin_index')->with('mssg','user deleted successfully');

    }

    public function search(){
        $roles = Role::All();
        $search = request('search');
        if($search){
            $users = User::where('name', 'LIKE', "%{$search}%")->paginate(3);
        }else{
            $users = User::paginate(10);
        }

        return view('admin.index', compact('users','roles'));
    }
}
