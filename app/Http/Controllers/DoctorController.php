<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Doctor Dashboard
    public function dashboard()
    {
        // Retrieve doctor-related data (appointments, stats)
        return view('doctor.dashboard');
    }
    public function appointments()
    {
        // $appointments = Appointment::with('doctor', 'patient');
        return view('doctor.appointments');
    }

    // Doctor Appointments Page
    // public function appointments()
    // {
    //     // Get upcoming appointments for the doctor
    //     $appointments = Appointment::where('doctor_id', auth()->user()->id)
    //                                ->where('status', 'pending')
    //                                ->get();

    //     return view('doctor.appointments', compact('appointments'));
    // }

    // Consultation with Patient
    // public function consultation(Appointment $appointment)
    // {
    //     // Check if the appointment belongs to the logged-in doctor
    //     if ($appointment->doctor_id != auth()->user()->id) {
    //         abort(403);
    //     }

    //     return view('doctor.consultation', compact('appointment'));
    // }
}
