<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gender',
        'date_of_birth',
        'address',
        'phone',
        // 'medical_history',
    ];
    protected $primaryKey = 'patient_id';
    protected $table = 'patients';

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
    return $this->belongsToMany(Doctor::class, 'appointments');
}

public function payments()
{
    return $this->hasOne(Payment::class);
}
}
