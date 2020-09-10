<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = [
		'title',
		'content',
	];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
	
}
