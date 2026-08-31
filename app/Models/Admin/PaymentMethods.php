<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    protected $table = "payment_methods";
    protected $fillable = [
        "id",
        "bank_code",
        "short_name",
        "fullname",
        "account_id",
        "account_name",
        "qr_code",
        "created_at",
        "updated_at"
    ];
}
