<?php

namespace App\Models;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    public $incrementing = false;
    
    protected $fillable = ['id', 'title', 'content', 'price'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
                            ->where('item_id', $this->id)
                            ->first();
    }        
}
