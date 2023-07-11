<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $table = 'payrolladmin'; // Replace 'leavetable' with the actual table name in your database

    protected $fillable = [
        'employee_id',
        'name',
        'pay_date',
        'pay_period',
        'gross',
        'nett',
        'status',
    ];
}
