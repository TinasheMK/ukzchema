<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeceasedNominee extends Model
{
    public $incrementing = false;

    protected $fillable = [
        "id",
        "member_id",
        "full_name",
        "email",
        "dob",
        'zimbabwean_by',
    ];
}
