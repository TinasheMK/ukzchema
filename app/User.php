<?php

namespace App;

use App\Models\Member;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function memberDetails() {
        return $this->hasOne(Member::class);
    }


    public function getMemberIdAttribute(){
        if(!isset($this->memberDetails)) return 0;
        return $this->memberDetails->id;
    }

    public function avatar(){
        return Storage::url($this->avatar);
    }
}
