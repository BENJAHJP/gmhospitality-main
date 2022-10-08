@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Auth::user()->role == "admin")
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white bg-danger shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Users</h3>
                                    <h3>Total</h3>
                                    <h4>{{ \App\Models\User::all()->count() }}</h4>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white bg-success shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Members</h3>
                                    <h3>Total</h3>
                                    <h4>{{ \App\Models\Member::all()->count() }}</h4>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white bg-primary shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Mentors</h3>
                                    <h3>Total</h3>
                                    <h4>{{ \App\Models\Mentor::all()->count() }}</h4>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <br>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white bg-warning shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Departments</h3>
                                    <h3>Total</h3>
                                    <h4>{{ \App\Models\Department::all()->count() }}</h4>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white bg-info shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Roles</h3>
                                    <h3>Total</h3>
                                    <h4>{{ \App\Models\Role::all()->count() }}</h4>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        @endif

        @if(Auth::user()->role == "user")
            <div class="row my-4">
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white bg-success shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Members</h3>
                                    <h3>Total</h3>
                                    <h4>{{ \App\Models\Member::all()->count() }}</h4>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                </div>
                            </div>                                
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white bg-primary shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Mentors</h3>
                                    <h3>Total</h3>
                                    <h4>{{ \App\Models\Mentor::all()->count() }}</h4>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
