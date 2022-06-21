<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateCase extends Model
{
    use HasFactory;

    protected $table = 'candidates_case';
    const CREATED_AT = 'created_dt';
    const UPDATED_AT = 'updated_dt';

    protected $fillable = [
        'candidate_id',
        'client_ref_id',
        'app_no',
        'initial_date',
        'report_type',
        'interim_rep_upload_date',
        'interim_rep_upload_color',
        'final_rep_upload_date',
        'final_rep_color',
        'supp_rep_upload_date',
        'supp_rep_color',
        'created_by',
        'updated_by',
    ];
}
