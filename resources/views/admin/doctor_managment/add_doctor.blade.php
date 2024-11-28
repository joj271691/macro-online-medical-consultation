<body>
    <div class="container-scroller">

        <div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDoctorModalLabel">Add New Doctor </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   <div class="modal-body">
        <form action="{{ url('add_doctor') }}" method="POST">
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
                    <option value="doctor" selected>Doctor</option>
                    <option value="patient" {{ isset($user) && $user->role === 'patient' ? 'selected' : '' }}>Patient</option>
                </select>
            </div>
                      
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input style="color: whitesmoke" type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="specialization">Specialization</label>
                <input  style="color: whitesmoke"  type="text" class="form-control" name="specialization" id="specialization" required>
            </div>
            <div class="mb-3">
                <label for="medical_license_number">Medical License Number</label>
                <input  style="color: whitesmoke"  type="text" class="form-control" name="medical_license_number" id="medical_license_number" required>
            </div>
            <div class="mb-3">
                <label for="license_expiry_date">License Expiry Date</label>
                <input  style="color: whitesmoke"  type="date" class="form-control" name="license_expiry_date" id="license_expiry_date" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea style="color: whitesmoke" class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select style="color: whitesmoke" class="form-control" id="status" name="status" required>
                    <option value="approved" {{ isset($useruser) && $user->status === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="pending" {{ isset($user) && $user->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="suspended" {{ isset($user) && $user->status === 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input style="color: whitesmoke" type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Doctor</button>
        </form>
                 </div>
                </div>
            </div>
        </div>
    </div>
</body>
