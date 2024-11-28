<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.css")
</head>
<body>
    <div class="container-scroller">
        @include("doctor.sidebar")
        <div>
    <h1>Appointments</h1>
    <div>
        <a href="#" class="btn btn-primary">Create Appointment</a>

    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Doctor</th>
                <th>Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>d</th>
            </tr>
            {{-- @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->id }}</td>
                <td>{{ $appointment->doctor->name }}</td>
                <td>{{ $appointment->patient->name }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->appointment_time }}</td>
                <td>{{ $appointment->status }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('appointments.delete', $appointment->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>
</div>
</body>