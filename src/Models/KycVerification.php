<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KycVerification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'address',
        'email',
        'id_number',
        'date_of_birth',
        'id_document',
        'proof_of_address',
        'additional_document',
        'approved_at'
    ];
}
