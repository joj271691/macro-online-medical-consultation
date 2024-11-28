<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\user;
use App\Models\Doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $role = Auth::user()->role;

            if($role == 'admin')
            {
                return view('admin.index');
            }
            else if($role == 'doctor')
            {
                return view('doctor.dashboard');
            }
            else if($role == 'patient')
            {
                return view('home.index');
            }
        }
            else
            {
                return redirect()->back();
            }
        
    }



                                 // For Patient
               
            public function patientlist(Request $request)
            {
                $search = $request->input('search');
            
                $data = User::where('role', 'patient')->with('doctor') // Filter only patients
                            ->when($search, function ($query, $search) {
                                $query->where(function ($subQuery) use ($search) {
                                    $subQuery->where('name', 'like', "%$search%")
                                            ->orWhere('phone', 'like', "%$search%");
                                });
                            })
                            ->paginate(10); // Paginate results, 10 per page
            
                return view('admin.patient_managment.patient_list', compact('data', 'search'));
            }
                
            public function addpatient(Request $request){

                $user =new user();

                $user->name=$request->name;
                $user->email=$request->email;
                $user->role=$request->role;
                $user->status=$request->status;
                $user->password = Hash::make($request->password); // Hash the password before saving
                $user->save();

                $patient = new patient();

                $patient->user_id=$user->id;
                $patient->address=$request->address;
                $patient->phone=$request->phone;
                $patient->gender=$request->gender;
                $patient->date_of_birth=$request->date_of_birth;

                $patient->save();
                return redirect()->back()->with('success', 'Patient Added successfully!');
            }
            
            public function editpatient($id){

                $user = user::find($id);

                return view('admin.patient_managment.update_patient',compact('user'));
            }
            public function updatepatient(Request $request, $id){

                $user = user::findOrFail($id);

                $user->name=$request->name;
                $user->email=$request->email;
                $user->role=$request->role;
                $user->status=$request->status;
                $user->save();
                
                $patient = Patient::where('user_id', $id)->firstOrFail();
                $patient->phone=$request->phone;
                $patient->address=$request->address;
                $patient->gender=$request->gender;
                $patient->date_of_birth=$request->date_of_birth;

                $patient->save();

                return redirect()->route('admin.patient_managment.patient_list')->with('success', 'Patient updated successfully!');

            }
            public function deletepatient($id){

            $user = User::with('patient')->findOrFail($id);

                // Delete related doctor if exists
                if ($user->patient) {
                    $user->patient->delete();
                }
                    $user->delete();

                    return redirect()->back();
            }






            // For Doctors
            public function doctorlist(){

                $data = User::where('role','doctor')->with('doctor')->paginate(10);  
        
                return view('admin.doctor_managment.doctor_list',compact('data'));
            }
            public function adddoctor(Request $request){
        
                $user=new user();
        
                $user->name=$request->name;
                $user->email=$request->email;
                $user->gender=$request->gender;
                $user->date_of_birth=$request->date_of_birth;
                $user->role=$request->role;
                $user->phone=$request->phone;
                $user->status=$request->status;
                $user->address=$request->address;
                $user->password = Hash::make($request->password); // Hash the password before saving
                $user->save();

                $doctor = new Doctor();
                $doctor->user_id = $user->id; // Associate with the user
                $doctor->specialization = $request->specialization;
                $doctor->medical_license_number = $request->medical_license_number;
                $doctor->license_expiry_date = $request->license_expiry_date;
                $doctor->save();
                return redirect()->back()->with('success', 'Doctor added successfully!');
            }
            
            public function editdoctor($id){
        
                $user = User::where('id',$id)->with('doctor')->firstOrFail();
        
                return view('admin.doctor_managment.update_doctor',compact('user'));
            }
            public function updatedoctor(Request $request, $id)
            {
                // Find the user by ID
                $user = user::findOrFail($id);
            
                // Update user details
                $user->name = $request->name;
                $user->email = $request->email;
                $user->gender = $request->gender;
                $user->date_of_birth = $request->date_of_birth;
                $user->phone = $request->phone;
                $user->status = $request->status ?? $user->status; // Retain the current status if not updated
                $user->address = $request->address;
                $user->save();
            
                // Find and update the doctor details
                $doctor = Doctor::where('user_id', $id)->firstOrFail();
                $doctor->specialization = $request->specialization;
                $doctor->medical_license_number = $request->medical_license_number;
                $doctor->license_expiry_date = $request->license_expiry_date;
                $doctor->save();
            
                return redirect()->route('admin.doctor_managment.doctor_list')->with('success', 'Doctor updated successfully!');
            }
            
            public function deletedoctor($id)
            {
                $user = User::with('doctor')->findOrFail($id);

                // Delete related doctor if exists
                if ($user->doctor) {
                    $user->doctor->delete();
                }

                $user->delete();

                return redirect()->back()->with('success', 'Doctor deleted successfully!');
            }

}
