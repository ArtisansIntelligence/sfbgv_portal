<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = "grade";
    /** 
     * The properties that map default timestamps to given values
     */
    const CREATED_AT = 'created_dt';
    const UPDATED_AT = 'updated_dt';


    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
    ];
}
