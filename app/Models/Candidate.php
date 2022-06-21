<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';
    const CREATED_AT = 'created_dt';
    const UPDATED_AT = 'updated_dt';

    protected $fillable = [
        'client_ref_id',
        'employee_id',
        'sf_ref_no',
        'name',
        'father_name',
        'image',
        'gender',
        'dob',
        'doj',
        'token',
        'mobile',
        'email',
        'zone',
        'business_unit',
        'grade',
        'passport_no',
        'pancard_no',
        'aadharcard_no',
        'created_by',
        'updated_by',
    ];
}
