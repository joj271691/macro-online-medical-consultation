
<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.css")
</head>
<body>
    <div class="container-scroller">
        @include("admin.sidebar")

        <div class="container mt-5">
            @if (session()->has('message'))
            <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             {{session()->get('message')}}
         </div>
        @endif
        
            <div class="d-flex justify-content-between align-items-center mb-4">
              
                <h2>Doctors</h2>
                <!-- Add New Doctor Button -->
                <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addDoctorModal">+ Add New Doctor</button>
            </div>
                {{-- search --}}
                <form method="GET" action="{{ url('doctor_managment') }}" class="mb-3">
                    <div class="input-group">
                        <input style="color: whitesmoke" type="text" name="search" class="form-control" placeholder="Search by name or phone" value="{{ request()->input('search')}}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form> 
            <div class="table-responsive">
                <table class="table table-bordered  text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Date Of Birth</th>
                            <th>Role</th>
                            <th>Phone</th>
                            <th>Specialization</th>
                            <th>Medical License Number</th>
                            <th>License Expiry Date</th>
                            <th>Status</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <!-- User Details -->
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->date_of_birth }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>{{ $user->phone }}</td>
                                
                                <!-- Doctor-Specific Details -->
                                <td>{{ $user->doctor->specialization ?? 'N/A' }}</td>
                                <td>{{ $user->doctor->medical_license_number ?? 'N/A' }}</td>
                                <td>{{ $user->doctor->license_expiry_date ?? 'N/A' }}</td>
                                
                                <!-- Status Badge -->
                                <td>
                                    @if ($user->role === 'patient')
                                    @if ($user->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @elseif ($user->status === 'inactive')
                                        <span class="badge bg-warning">Inactive</span>
                                    @elseif ($user->status === 'pending')
                                        <span class="badge bg-info">Pending</span>
                                    @endif
                                    @elseif ($user->role === 'doctor')
                                        @if ($user->status === 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif ($user->status === 'pending')
                                            <span class="badge bg-info">Pending</span>
                                        @elseif ($user->status === 'suspended')
                                            <span class="badge bg-danger">Suspended</span>
                                        @else
                                            <span class="badge bg-secondary">Unknown</span>
                                        @endif
                                    @else
                                        <span class="badge bg-secondary">N/A</span>
                                    @endif
                                </td>
                                
                                <!-- Address -->
                                <td>{{ $user->address }}</td>
                                
                                <!-- Action Buttons -->
                                <td>
                                    <a href="{{ url('/edit_doctor', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    
                                    @if ($user->role !== 'admin')
                                        <a href="{{ url('/delete_doctor', $user->id) }}" class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Are you sure to delete this?')">Delete</a>
                                    @else
                                        <span class="btn btn-sm btn-secondary disabled">Not Allowed</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    

                </table> 
                
            </div>  
            <div class="modal-body">
                <!-- This is where you'll load the add_doctor form -->
                @include('admin.doctor_managment.add_doctor')
              </div>

        </div>
    </div>

        @include("admin.script")
    </body>
    </html>