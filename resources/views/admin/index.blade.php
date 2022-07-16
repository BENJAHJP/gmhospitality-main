@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <!-- search form -->
                   <div class="container m-4">
                        <div class="row">
                            <div class="col-8">
                                <div class="container text-start">
                                    <a href="#" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#user-reg-modal">Add</a>
                                </div>
                            </div>
                            <div class="col text-end">
                                <form action="{{ route('admin.search') }}" method="get">
                                    <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                    <button type="submit" class="btn btn-success rounded-pill">Search</button> 
                                </form>
                            </div>
                        </div>   
                    </div>


                    <div class="container p-0">
                        @if (session('mssg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mssg') }}
                            </div>
                        @endif

                        <!-- users registration table -->
                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>password</th>
                                        <th>role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user) 
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->password }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <a href="{{ url('/admin_edit/'.$user->id) }}" class="btn btn-success rounded-pill">Edit</a>
                                                <a href="{{ url('/admin_destroy/'.$user->id)}}"class="btn btn-danger rounded-pill">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->onEachSide(1)->links() }}
                        </div>
                        <!-- registration modal -->

                        <div class="modal fade" id="user-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">User registration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.store') }}" method="post">
                                            @csrf
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required="True">

                                            <label for="email" class="form-label">email:</label>
                                            <input type="email" class="form-control" id="email" name="email" required="True">

                                            <label for="password" class="form-label">password:</label>
                                            <input type="password" class="form-control" id="password" name="password" required="True">
                                            
                                            <label for="role" class="form-label">Role:</label>
                                            <select id="role" class="form-select" name="role" required="False">
                                                <option value="1">Admin</option>
                                                <option value="0">User</option>
                                            </select>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success rounded-pill">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
