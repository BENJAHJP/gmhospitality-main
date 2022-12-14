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
        $members = Member::paginate(10);

        return view('members.index', compact('members'));
    }

    public function store(){

        request()->validate([
            'name'=>'required',
            'phone_number'=>'required',
            'mentor'=>'required',
            'school'=>'required',
            'created_by'=>'required'
        ]);
        //request data and send to db 
        $member = new Member();
        $member->name = request('name');
        $member->phone_number = request('phone_number');
        $member->school = request('school');
        $member->mentor = request('mentor');
        $member->created_by = request('created_by');
        $member->save();
        
        return redirect('/members_index')->with('mssg', 'member registered successfuly');
    }

    public function edit($id){
        $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

    public function destroy($id){
        //delete data with id
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect('/members_index')->with('mssg','member deleted successfully');
    }

    public function update($id){
        request()->validate([
            'name'=>'required',
            'phone_number'=>'required',
            'mentor'=>'required',
            'school'=>'required',
            'created_by'=>'required'
        ]);
        
        $member = Member::findOrFail($id);
        $member->name = request('name');
        $member->phone_number = request('phone_number');
        $member->school = request('school');
        $member->mentor = request('mentor');
        $member->created_by = request('created_by');
        $member->update();

        return redirect('/members_index')->with('mssg', 'member updated successfully');
    }

    public function search(){
        $search = request('search');
        if($search){
            $members = Member::where('name', 'LIKE', "%{$search}%")->paginate(3);
        }else{
            $members = Member::paginate(10);
        }

        return view('members.index', compact('members'));
    }
}
