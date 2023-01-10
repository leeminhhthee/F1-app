<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'ra_user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ra_product_id');
    }
}
