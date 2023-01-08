<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Claim extends Model
{
    public $table = 'claims';
    protected $fillable = [
        'date',
        'date_death',
        'claimant_fullname',
        'relationship',
        'country_death',
        'claimant_phone',
        'proof_id',
        'air_tickets',
        'proof_address',
        'death_certificate',
        'passport_date',
        'membership',
        'amount',
        'claim_verified',
        'member_fullname',
        'member_number',
        'deceased_name',

    ];
}
