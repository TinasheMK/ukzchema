<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    protected $fillable = [
        "target_group", #all_users, members, board_members, negative_balance_accounts
        // "channels", #'mail database nexmo ...'
        "title",
        "message",
        "by", #admin name
        "target_total",
        //"read_by", #create pivotal table admin_notifications_members
        "total_reads"
    ];

    // {
    //     "default": "all",
    //     "options": {
    //         "all": "All Members",
    //         "board_members": "Board Members",
    //         "none_board_members":"None board members",
    //         "negative_balance_accounts": "Accounts with negative balance"
    //     }
    // }


    /**
     * The members that belong to the AdminNotification
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(Member::class);
    }

    // public function members() {
    //     return $this->belongsToMany(User::class);
    // }
}
