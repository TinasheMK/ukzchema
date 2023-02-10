<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "id",
        "user_id",
        "member_id",
        "status",
        "invoice_date",
        "due_date",
        "subtotal",
        "total",
        "type",
        "reminder",
        "created_at",
        "updated_at",
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function invoice_items(){
        return $this->hasMany(InvoiceItem::class);
    }
}
