<?php
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
   

    public static function generateLink()
    {
        $randomLink = Str::random(10); // Generate a random link with 10 characters

        $attendance = new Attendance;
        $attendance->link = $randomLink;
        $attendance->save();

        return $randomLink; // Return the random link if needed
    }


}