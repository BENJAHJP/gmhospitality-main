@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Users') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin_update/'.$user->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $user->name }}">

                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required="True" value="{{ $user->email }}">

                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required="True" value="{{ $user->password }}">

                        <label for="role" class="form-label">Role:</label>
                        <select id="role" class="form-select" name="role" required="True" value="{{ $user->role }}">
                            @foreach($roles as $role)
                                <option value="{{ $role->value }}" {{ $role->value == $user->role ? 'selected' : ''}}>{{ $role->name }}</option>
                            @endforeach
                        </select>

                        <div class="modal-footer">
                            <a href="{{ url('admin_index') }}" class="btn btn-outline-primary rounded-pill">
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