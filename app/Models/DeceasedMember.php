<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeceasedMember extends Model
{
    public $incrementing = false;

    protected $fillable = [
        "id",
        "user_id",
        "balance",
        "email",
        "first_name",
        "middle_names",
        "last_name",
        "dob",
        "city",
        "country",
        "street",
        "zip",
        "gender",
        "phone",
        "nok_city",
        "nok_country",
        "nok_dob",
        "nok_email",
        "nok_full_name",
        "nok_phone",
        "nok_street",
        "nok_zip",
        "orderID",
        "bio",
        'zimbabwean_by',
        'member_type'
    ];
}
