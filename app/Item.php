<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $fillable = [
        'user_id', 'price', 'name', 'category', 'description', 'image'
    ];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
