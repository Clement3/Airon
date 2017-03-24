<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'lft', 'rgt', 'depth', 'name', 'slug'];
}
