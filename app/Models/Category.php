<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description', 'created_by', 'created_at', 'updated_at'
    ];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
