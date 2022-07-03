<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        //get all members
        $members = Member::all();

        return view('members.index', compact('members'));
    }

    public function store(){

        //request data and send to db 
        $member = new Member();
        $member->name = request('name');
        $member->phone_number = request('phone_number');
        $member->school = request('school');
        $member->mentor = request('mentor');
        $member->save();
        
        return redirect('/members')->with('mssg', 'member registered successfuly');
    }

    public function edit($id){
        $member = Member::findOrFail($id);
        return redirect('/members');
    }

    public function destroy($id){
        //delete data with id
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect('/members')->with('mssg','member deleted successfully');
    }
}
