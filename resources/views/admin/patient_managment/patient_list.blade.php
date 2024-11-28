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
              
                <h2>Patients</h2>
                
                <!-- Add New Patient Button -->
                <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addPatientModal">+ Add New Patient</button>
            </div>
             {{-- search --}}
             <form method="GET" action="{{ url('patient_managment') }}" class="mb-3">
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
                            <th>Status</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->isEmpty())
                        <tr>
                            <td colspan="10" class="text-center">No results found for "{{ request('search') }}"</td>
                        </tr>
                    @else
                        @foreach ($data as $user)

                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->patient->gender ?? 'N/A'}}</td>
                            <td>{{$user->patient->date_of_birth ?? 'N/A'}}</td>
                            <td>{{ucfirst($user->role)}}</td>
                            <td>{{$user->patient->phone ?? 'N/A'}}</td>
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
                                    @endif
                                @endif
                            </td>                            
                            <td>{{$user->patient->address ?? 'N/A'}}</td>

                            <td>
                                <a href="{{url('/edit_patient', $user->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                @if($user->role !== 'admin')

                                    <a href="{{url('/delete_patient', $user->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                                @else
                                    <span class="btn btn-sm btn-secondary disabled">Not Allowed</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table> 

                {{-- <div class="d-flex justify-content-center mt-4">
                    {{ $data->links('pagination::bootstrap-5') }}
                </div> --}}
            </div>     
      
            <div class="modal-body">
                <!-- This is where you'll load the add_patient form -->
                @include('admin.patient_managment.add_patient')
              </div>

        </div>
    </div>

        @include("admin.script")
    </body>
    </html>