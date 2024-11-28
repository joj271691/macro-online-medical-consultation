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
             {{session()->get('message')}}
         </div>
        @endif
        <h2>update patient</h2>

            <div class="d-flex justify-content-between align-items-center mb-4">
              
                <form action="{{url('/update_patient',$user->id)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input style="color: whitesmoke" type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input style="color: whitesmoke" type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select style="color: whitesmoke" class="form-control" id="gender" name="gender" value="{{$user->patient->gender}}" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{$user->patient->date_of_birth}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select style="color: whitesmoke" class="form-control" id="role" name="role" value="{{$user->role}}" required>
                            <option value="patient" {{$user->role === 'patient' ? 'selected' : ''}}>Patient</option>
                            <option value="doctor" {{$user->role === 'doctor' ? 'selected' : ''}}>Doctor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input style="color: whitesmoke" type="text" class="form-control" id="phone" name="phone" value="{{$user->patient->phone}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea style="color: whitesmoke" class="form-control" id="address" name="address" required>{{$user->patient->address}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select style="color: whitesmoke" class="form-control" id="status" name="status" value="{{$user->status}}" required>
                            <option value="active" {{$user->status === 'active' ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{$user->status === 'inactive' ? 'selected' : ''}}>Inactive</option>
                            <option value="pending" {{$user->status === 'pending' ? 'selected' : ''}}>Pending</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">update Patient</button>
                </form>
            </div>
            
        </div>
        


        </div>

        @include("admin.script")
    </body>
    </html>