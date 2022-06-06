<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnpaidMember extends Model
{
    protected $table = "members";

    //protected $appends = ['full_name'];

    public function scopeUnpaidMembers($query)
    {
        // if(request()->route()->getName() !== "voyager.unpaid-members.index") return $query;
        if (!isset(request()->obituary)) {
            return abort(403, "Obituary Not Selected");
        }
        $donated_members = Donation::whereObituaryId(request()->obituary)
            ->pluck('member_id');
        $unpaid_members = Member::all()
            ->diff(Member::whereIn('id', $donated_members)->get())
            ->pluck('id');
        return $query->whereIn('id', $unpaid_members);
    }
}
