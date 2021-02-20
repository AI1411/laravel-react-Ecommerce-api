<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
