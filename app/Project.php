<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'priority'];

    public function updates()
    {
    	return $this->hasMany(Update::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
