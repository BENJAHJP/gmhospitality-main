<div class="card">
    <div class="card-header">
        {{ __('Update Mentors') }}
    </div>

    <div class="card-body">
        <form action="{{ url('/mentors_update/'.$mentor->id) }}" method="post">
            @csrf
            @method("put")
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $mentor->name }}">

            <label for="phone_number" class="form-label">Phone Number:</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" required="True" value="{{ $mentor->phone_number }}">

            <label for="mentees" class="form-label">Mentees:</label>
            <input type="text" class="form-control" id="mentees" name="mentees" required="True" value="{{ $mentor->mentees }}">

            <label for="department" class="form-label">Department:</label>
            <select id="department" class="form-select" name="department" required="True" value="{{ $mentor->department }}">
                <option value="hospitality">Hospitality</option>
                <option value="media">Media</option>
            </select>

            <label for="school" class="form-label">School:</label>
            <input type="text" class="form-control" id="school" name="school" required="True" value="{{ $mentor->school }}">

            <div class="modal-footer">
                <button type="submit" class="btn btn-success rounded-pill">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>