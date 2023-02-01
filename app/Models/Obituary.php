<?php

namespace App\Models;

use App\Events\ObituaryAdded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Obituary extends Model
{
    protected $fillable = [
        "member_id",
        "full_name",
        "biography",
        "dob",
        "dod",
        "death_place",
        "created_at",
        "phone",
        "photo",
        "goal_amount",
        "donated_amount",
        "member_type", //nominees or member
        "nominee_id"
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:d M Y',
    ];

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($model) {
            event(new ObituaryAdded($model));
        });
    }

    public function getDobBrowseAttribute() {
        return format_date($this->dob, "d-m-Y");
    }

    public function getDodBrowseAttribute()
    {
        return format_date($this->dod, "d-m-Y");
    }

    public function getUserTypeAttribute(){
        return $this->full_name === Member::find($this->member_id)->full_name ? 'Member' : 'Nominee';
    }

    public function minAmount(){
        $members = Member::all()->count();
        if(!isset($this->goal_amount) || $this->goal_amount === 0){
            return setting('donations.min') ?? 10;
        }
        if($members == 0) return 0;
        return ceil($this->goal_amount / $members);
    }

    public function hasPaid(){
        $has_donated = Donation::whereMemberIdAndObituaryId(Auth::user()->member_id, $this->id)
            ->first();
        // dd($has_donated);
        return isset($has_donated);
    }

    // public function getFullNameBrowseAttribute(){
    //     if($this->member_type === "nominee") {
    //         $nominee = Nominee::find($this->nominee_id);
    //         return $nominee->full_name ?? "Nominee Not Set";
    //     }
    //     if($this->member_type === "member"){
    //         return $this->full_name;
    //     }
    //     if ($this->member_type === "nok") {
    //         $member = Member::find($this->member_id);
    //         if(!isset($member)) return "NoK not Set";
    //         return $member->getNextOfKin()->full_name ?? "NoK not Set";
    //     }
    //     return "Not Set";
    // }
}
