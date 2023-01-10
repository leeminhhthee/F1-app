<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;

    protected $guarded = [];
    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'badge-success'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'badge-secondary'
        ]
    ];
    protected $hot = [
        1 => [
            'name' => 'Hot',
            'class' => 'badge-danger'
        ],
        0 => [
            'name' => 'None',
            'class' => 'badge-light'
        ]
    ];
    public function getStatus() 
    {
        return array_get($this->status, $this->pro_active, '[N\A]');
    }
    public function getHot() 
    {
        return array_get($this->hot, $this->pro_hot, '[N\A]');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_cate_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
