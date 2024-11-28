<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'doctors';
    protected $primaryKey = 'doctor_id';

    // Mass assignable attributes
    protected $fillable = [
        'user_id', // Foreign key referencing the users table
        'specialization', // Example: Field for doctor specialization
        'medical_license_number', // Example: Field for doctor license number
        'license_expiry_date',
        // Add other fields as necessary
    ];
public function user()
{
    return $this->belongsTo(User::class);
}

public function medicalRecords()
{
    return $this->hasMany(MedicalRecord::class);
}

public function appointments()
{
    return $this->belongsToMany(Patient::class, 'appointments');
}

}
