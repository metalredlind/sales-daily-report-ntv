<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetSales extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_sales_id');
    }
}
