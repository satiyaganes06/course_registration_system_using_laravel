<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    protected $primaryKey = 'id';

    protected $fillable =[
        'course_name',
        'course_code',
        'course_credit',
        'course_description'
    ];
}
