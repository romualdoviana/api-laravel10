<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "value",
        "paid",
        "payment_date",
        "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
