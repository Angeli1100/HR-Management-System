<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leavetable'; // Replace 'leavetable' with the actual table name in your database

    protected $fillable = [
        'usersID',
        'employeeName',
        'email',
        'dateFrom',
        'dateTo',
        'duration',
        'file',
        'select_leave',
        'status',
        'annualLeaveData',
        'emergencyLeaveData',
        'hospitalityLeaveData',
        'paidLeaveData',
        'annual_qouta',
        'emergency_qouta',
        'hospitality_qouta',
        'paidLeave_qouta',
    ];
}

