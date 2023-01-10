<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOT = 1;
    protected $table = 'articles';
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
            'class' => 'badge-secondary'
        ]
    ];
    public function getStatus() 
    {
        return array_get($this->status, $this->a_active, '[N\A]');
    }
    public function getHot() 
    {
        return array_get($this->hot, $this->a_hot, '[N\A]');
    }
}
