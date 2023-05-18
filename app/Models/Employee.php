<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // Add 'id' to the fillable fields
        'usersID',
        'employeeName',
        'dob_employee',
        'NRIC_employee',
        'gender_employee',
        'nationality_employee',
        'race_employee',
        'marital_employee',
        'children_employee',
        'position_employee',
        'date',
        'bank_name',
        'acc_number',
        'crime_employee',
        'medical_employee',
        'Vaccination',
        'oku',
        'emergency_employee',
        'emergency_name',
        'address',
        'city',
        'postcode',
        'state',
        'country',
        'remarks',
        'created_at',
        'updated_at'
    ];
    protected $table = 'employee';


    public function user()
    {
        return $this->belongsTo(User::class, 'usersID');
    }



}
