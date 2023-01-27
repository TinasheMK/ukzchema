<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "id",
        "type",
        "description",
        "title",
        "amount",
        "units",
        "unit_price",
        "discount_percent",
        "invoice_ref",
        "created_at",
        "updated_at",
    ];

    public function member(){
        return $this->belongsTo(Invoice::class);
    }
}
