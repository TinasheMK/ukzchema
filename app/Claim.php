<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Claim extends Model
{
    public $table = 'claims';
    protected $fillable = [
        "membership_number",
        "date"
    ];
}
