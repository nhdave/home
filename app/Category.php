<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];
  
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
  
    public function parent()
    {
        return Category::findOrFail($this->parent_id);
    }
}
