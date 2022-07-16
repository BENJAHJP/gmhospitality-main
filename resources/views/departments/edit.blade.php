@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Department') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/departments_update/'.$department->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $department->name }}">

                        <label for="value" class="form-label">Value:</label>
                        <input type="text" class="form-control" id="value" name="value" required="True" value="{{ $department->value }}">

                        <div class="modal-footer">
                            <a href="{{ url('/departments_index') }}" class="btn btn-success rounded-pill">close</a>
                            <button type="submit" class="btn btn-success rounded-pill">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection>