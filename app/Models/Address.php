<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $primaryKey = 'address_id';
    protected $table = 'candidates_address';
    const CREATED_AT = 'created_dt';
    const UPDATED_AT = 'updated_dt';

    protected $fillable = [
        'candidate_id',
        'address',
        'permanent_address',
        'city',
        'permanent_city',
        'state',
        'permanent_state',
        'pincode',
        'permanent_pincode',
        'created_by',
        'updated_by',
    ];
}
