<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $table = 'candidates_education';
    const CREATED_AT = 'created_dt';
    const UPDATED_AT = 'updated_dt';

    protected $fillable = [
        'candidate_id',
        'qual_name',
        'college',
        'address',
        'university',
        'year_of_passing',
        'roll_reg_enroll_pin_hall_no',
        'created_by',
        'updated_by',
    ];
}
