<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include("admin.css")
</head>
<body>
    <div class="container-scroller">
        @include("admin.sidebar")

        <div class="container mt-5">
            @if (session()->has('message'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h2>Update Doctor</h2>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <form action="{{ url('/update_doctor', $user->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input style="color: whitesmoke" type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input style="color: whitesmoke" type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select style="color: whitesmoke" class="form-control" id="gender" name="gender" required>
                            <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select style="color: whitesmoke" class="form-control" id="role" name="role" required>
                            <option value="patient" {{ $user->role === 'patient' ? 'selected' : '' }}>Patient</option>
                            <option value="doctor" {{ $user->role === 'doctor' ? 'selected' : '' }}>Doctor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input style="color: whitesmoke" type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="specialization" class="form-label">Specialization</label>
                        <input style="color: whitesmoke" class="form-control" type="text" name="specialization" id="specialization" value="{{ $user->doctor->specialization }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="medical_license_number" class="form-label">Medical License Number</label>
                        <input style="color: whitesmoke" class="form-control" type="text" name="medical_license_number" id="medical_license_number" value="{{ $user->doctor->medical_license_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="license_expiry_date" class="form-label">License Expiry Date</label>
                        <input style="color: whitesmoke" class="form-control" type="date" name="license_expiry_date" id="license_expiry_date" value="{{ $user->doctor->license_expiry_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea style="color: whitesmoke" class="form-control" id="address" name="address" required>{{ $user->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select style="color: whitesmoke" class="form-control" id="status" name="status" required>
                            <option value="approved" {{ $user->status === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="pending" {{ $user->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="suspended" {{ $user->status === 'suspended' ? 'selected' : '' }}>Suspended</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Doctor</button>
                </form>
            </div>
        </div>
        @include("admin.script")
    </body>
</html>
