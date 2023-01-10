<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $guarded = ['*'];
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;


    protected $status = [
        1 => [
            'name' => 'Processed',
            'class' => 'badge-success'
        ],
        0 => [
            'name' => 'Processing',
            'class' => 'badge-secondary'
        ]
    ];
    public function getStatus() 
    {
        return array_get($this->status, $this->c_status, '[N\A]');
    }
}
