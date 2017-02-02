<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $fillable = ['name', 'description'];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
