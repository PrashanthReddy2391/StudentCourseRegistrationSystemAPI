<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['course_id','First_Name','Last_Name','Currently_Enrolled','Matriculation_date'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}
