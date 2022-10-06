@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Role') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/roles_update/'.$role->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $role->name }}">

                        <label for="value" class="form-label">Value:</label>
                        <input type="text" class="form-control" id="value" name="value" required="True" value="{{ $role->value }}">

                        <input type="hidden" class="form-control"  name="created_by" required="True" value="{{ Auth::user()->name }}">

                        <div class="modal-footer">
                            <a href="{{ url('/roles_index') }}" class="btn btn-outline-primary rounded-pill">
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