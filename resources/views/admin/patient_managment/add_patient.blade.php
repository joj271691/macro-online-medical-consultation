
<body>
    <div class="container-scroller">

        <div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPatientModalLabel">Add New Patient </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   <div class="modal-body">
        <form action="{{ url('add_patient') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input style="color: whitesmoke" type="text" class="form-control" id="name" name="name" required>
            </div>
           
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input style="color: whitesmoke" type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select style="color: whitesmoke" class="form-control" id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select style="color: whitesmoke" class="form-control" id="role" name="role" required>
                    <option value="patient" {{$user->role === 'patient' ? 'selected' : ''}}>Patient</option>
                    <option value="doctor" {{$user->role === 'doctor' ? 'selected' : ''}}>Doctor</option>
                </select>
            </div>            
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input style="color: whitesmoke" type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea style="color: whitesmoke" class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select style="color: whitesmoke" class="form-control" id="status" name="status" required>
                    <option value="active" {{ isset($user) && $user->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ isset($user) && $user->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="pending" {{ isset($user) && $user->status === 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input style="color: whitesmoke" type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Patient</button>
        </form>
                 </div>
                </div>
            </div>
        </div>
    </div>
</body>
