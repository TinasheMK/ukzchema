<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    use Notifiable;

    protected $fillable = [
        "email",
        "first_name",
        "middle_names",
        "last_name",
        "dob",
        "city",
        "country",
        "street",
        "apartment",
        "zip",
        "gender",
        "phone",
        "status",
        "token",
        "nok_city",
        "nok_country",
        "nok_dob",
        "nok_email",
        "nok_full_name",
        "nok_phone",
        "nok_street",
        "nok_zip",
        "nok_apartment",
        "nominees",
        "read_constitution",
        "certify_details",
        "uk_resident",
        "welcome_send",
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $casts = [
        'nominees' => 'array',
        'dob' => 'datetime:d M Y',
        'nok_dob' => 'datetime:d M Y',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_names} {$this->last_name}";
    }

    public function getReadConstitutionReadAttribute()
    {
        return $this->read_constitution ? "Yes": "No";
    }

    public function getCertifyDetailsReadAttribute()
    {
        return $this->certify_details ? "Yes" : "No";
    }

    public function getUkResidentReadAttribute()
    {
        return $this->uk_resident ? "Yes" : "No";
    }


    public function getNomineesBrowseAttribute(){
        return json_encode($this->nominees);
    }

    public function getNomineesReadAttribute()
    {
        return json_encode($this->nominees);
    }

    protected function gender()
    {
        return $this->gender === "m" ? "Male" : "Female";
    }

    public function getGenderBrowseAttribute()
    {
        return $this->gender();
    }

    public function getGenderReadAttribute()
    {
        return $this->gender();
    }
}
