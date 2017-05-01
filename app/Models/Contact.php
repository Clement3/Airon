<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $incrementing = false;
    
    protected $fillable = ['id', 'fullname', 'email', 'reason', 'message', 'ip'];

    protected $casts = [
        'resolved' => 'boolean',
    ];
}
