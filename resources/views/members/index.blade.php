@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Members') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card p-4">
                        @if (session('mssg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mssg') }}
                            </div>
                        @endif

                        <div class="text-end">
                            <a href="#" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#member-reg-modal">Add</a>
                        </div>

                        <!-- members registration table -->
                        <table class="table table-striped table-boardered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>School</th>
                                    <th>Mentor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member) 
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->phone_number }}</td>
                                        <td>{{ $member->school }}</td>
                                        <td>{{ $member->mentor }}</td>
                                        <td>
                                            <a class="btn btn-success">Edit</a>
                                            <a href="{{ url('/members/'.$member->id)}}"class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- registration modal -->

                        <div class="modal fade" id="member-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Member registration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('members.store') }}" method="post">
                                            @csrf
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required="True">

                                            <label for="phone_number" class="form-label">Phone Number:</label>
                                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required="True">

                                            <label for="school" class="form-label">School:</label>
                                            <input type="text" class="form-control" id="school" name="school" required="True">

                                            <label for="mentor" class="form-label">Mentor:</label>
                                            <input type="text" class="form-control" id="mentor" name="mentor" required="True">

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
                        <!-- update modal -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection