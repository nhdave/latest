<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function children()
    {
    	return Category::where('parent_id', $this->id)->get();
    }

    public static function roots()
    {
    	return Category::orderBy('name', 'asc')->where('parent_id', null)->get();
    }
    
    public function credentials()
    {
    	return $this->hasMany('App\Credential');
    }

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function parent()
    {
        return Category::findOrFail($this->parent_id);
    }
}
