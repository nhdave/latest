<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['url', 'label', 'credential_id'];
    
    public function credential()
    {
    	return $this->belongsTo(Credential::class);
    }
}
