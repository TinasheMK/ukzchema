<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Constitution extends Model
{
    use SoftDeletes;

    protected $table = "constitution";

    // protected $fillable = [
    //     "constitution"
    // ];
}
