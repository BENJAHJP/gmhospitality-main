@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Auth::user()->role == "1")
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Users</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\User::all()->count() }}</h4>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Members</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Member::all()->count() }}</h4>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Mentors</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Mentor::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-md-4 col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Departments</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Department::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(Auth::user()->role == "0")
            <div class="row my-4">
                <div class="col-md-6 col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Members</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Member::all()->count() }}</h4>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3>Mentors</h3>
                            <h3>Total</h3>
                            <h4>{{ \App\Models\Mentor::all()->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
