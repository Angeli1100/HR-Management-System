<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['link','userID','employeeName','check_in','check_out']; // Add 'link' to the fillable attributes
    
    public static function generateLink()
    {
        $randomLink = Str::random(10); // Generate a random link with 10 characters

        $attendance = Attendance::create(['link' => $randomLink]); // Save the link in the database

        return $attendance;// Return the Attendance model instance if needed
    }
}