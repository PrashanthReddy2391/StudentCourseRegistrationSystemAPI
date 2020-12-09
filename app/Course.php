<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['Course_Name','Course_Description','Start_Date','Course_Duration'];



    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
