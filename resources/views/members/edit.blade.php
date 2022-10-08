@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Members') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/members_update/'.$member->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $member->name }}">

                        <label for="phone_number" class="form-label">Phone Number:</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required="True" value="{{ $member->phone_number }}">

                        <label for="school" class="form-label">School:</label>
                        <input type="text" class="form-control" id="school" name="school" required="True" value="{{ $member->school }}">

                        <label for="mentor" class="form-label">Mentor:</label>
                        <input type="text" class="form-control" id="mentor" name="mentor" required="True" value="{{ $member->mentor }}">

                        <input type="hidden" class="form-control" name="created_by" required="True" value="{{ Auth::user()->name }}">

                        <div class="modal-footer">
                            <a href="{{ url('members_index') }}" class="btn btn-outline-primary rounded-pill">
                                <i class="fa-solid fa-times"></i>
                            </a>
                            <button type="submit" class="btn btn-outline-primary rounded-pill">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection