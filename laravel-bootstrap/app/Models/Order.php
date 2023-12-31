<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;


    function user()
    {
        return $this->hasMany(User::class);
    }
    public function products()
{
    return $this->belongsToMany(Product::class);
}
}
