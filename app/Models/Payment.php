<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
// Payment.php
public function appointment()
{
    return $this->belongsTo(Appointment::class);
}
}
