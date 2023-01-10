<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = [''];
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOME = 1;
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
    protected $home = [
        1 => [
            'name' => 'Home',
            'class' => 'badge-primary'
        ],
        0 => [
            'name' => 'None',
            'class' => 'badge-secondary'
        ]
    ];
    public function getStatus() 
    {
        return array_get($this->status, $this->c_active, '[N\A]');
    }
    public function getHome() 
    {
        return array_get($this->home, $this->c_home, '[N\A]');
    }
    public function products() 
    {
        return $this->hasMany(Product::class, 'pro_cate_id');
    }
}
