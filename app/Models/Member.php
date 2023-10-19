<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Member extends Model
{
    public $incrementing = false;

    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
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
        "created_at",
        "orderID",
        "bio"
    ];

    protected $casts = [
        'dob' => 'datetime:d M Y',
        'nok_dob' => 'datetime:d M Y',
    ];

    public function toDeceased(){
        $decea = $this->toArray();
        DeceasedMember::create($decea);
        $this->delete();
    }
    //Creating Membership ID

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($member){
            $term = $member->toArray();
            $is_deceased = DeceasedMember::find($member->id);
            $is_terminated = TerminatedMember::find($member->id);
            if(!isset($is_deceased) && !isset($is_terminated)){
                TerminatedMember::create($term);
                $member->nominees()->delete();
            }
            $member->deleted_at= date("Y-m-d H:i:s");
            // $member->user->delete();
            logger("Member was deleted", [$member]);
        });
        static::creating(function ($model) {
            $f_name = $model->first_name[0] ?? '';
            $l_name = $model->last_name[0] ?? '';

            $prefix = strtoupper($l_name . $f_name);
            $prefix2 = "CM";

            $counter = Member::count();
            $padded = 0;
            $member_id = null;

            do {
                $counter++;
                $padded = str_pad($counter, 6, '0', STR_PAD_LEFT);
                $member_id = $prefix2 . $padded;
            } while (Member::find($member_id) != null);

            // dd(Member::find($member_id));

            $mem = Member::find($member_id);
            for ($x = 0; $x < 10; $x++) {
                if ($mem == null) {
                  break;
                }

                $counter++;
                $padded = str_pad($counter, 6, '0', STR_PAD_LEFT);
                $member_id = $prefix2 . $padded;
                $mem = Member::find($member_id);

            }



            // dd($member_id);
            logger("Creating Member ID: {$member_id}");
            $model->id = $member_id;
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function nominees(){
        return $this->hasMany(Nominee::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function deposits(){
        return $this->hasMany(Deposit::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function boardMember(){
        return $this->hasOne(BoardMember::class);
    }


    public function getNextOfKin(){
        return (object) [
            "city" => $this->nok_city,
            "country" => $this->nok_country,
            "dob" => $this->nok_dob,
            "email" => $this->nok_email,
            "full_name" => $this->nok_full_name,
            "phone" => $this->nok_phone,
            "street" => $this->nok_street,
            "zip" => $this->nok_zip
        ];
    }



    public function getDonatedAmountAttribute(){
        $donations = Donation::whereMemberId($this->id)->get();
        return $donations->sum('amount');
    }

    public function getDonatedCountAttribute(){
        return Donation::whereMemberId($this->id)->count();
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_names} {$this->last_name}";
    }

    protected function _gender(){
        if(isset($this->gender)){
            return $this->gender === "m" ? "Male" : "Female";
        };
    }

    public function getGenderBrowseAttribute()
    {
        return $this->_gender();
    }

    public function getGenderReadAttribute()
    {
        return $this->_gender();
    }

    public function getNomineesBrowseAttribute()
    {
        return json_encode($this->nominees);
    }

    public function getNomineesReadAttribute()
    {
        return json_encode($this->nominees);
    }

    public function getNomineesEditAttribute()
    {
        return json_encode($this->nominees);
    }

}
