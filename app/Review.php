<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [
        'id', 'user_id', 'created_at', 'updated_at'
    ];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
