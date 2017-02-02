<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    protected $fillable = ['name', 'user_name', 'password', 'category_id'];
    
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    
    public function Links()
    {
    	return $this->hasMany(Link::class);
    }
}
