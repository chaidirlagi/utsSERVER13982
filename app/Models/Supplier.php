<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'contact_info', 'created_by', 'created_at', 'updated_at'
    ];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
