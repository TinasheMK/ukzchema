<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nominee extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "member_id",
        "full_name",
        "date_stamp",
        "email",
        "dob",
        "zimbabwean_by",
    ];

    // protected $casts = [
    //     'dob' => 'datetime:d M Y',
    // ];

    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function getFullNameAttribute(){
        if(isset(request()->type) && request()->type == 'obituary_belongsto_nominee_relationship'){
            if(!isset($this->member)) return "not_found";
            return "({$this->member->id}) {$this->attributes['full_name']}";
        }

        if(!$this->exists) return "";

        if (!isset($this->member)) return "{$this->attributes['full_name']} (Member Deceased)";

        return "({$this->member->id}) ".$this->attributes['full_name'];
    }

    public function getDobBrowseAttribute(){
        return date("d-m-Y", strtotime($this->dob));
    }

    public function toDeceased(){
        DeceasedNominee::create([
            'name' => $this->full_name,
            'email' =>  $this->email,
            'member_id'=> $this->member_id,
            'full_name'=> $this->full_name,
            'dob'=> $this->dob,
            'dod'=>$this->dod,
            'zimbabwean_by'=> $this->zimbabwean_by,

        ]);
        $this->delete();
    }
}
