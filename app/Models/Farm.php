<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = [
        'user_id',
        'farm_name',
        'location',
        'total_area',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fields()
{
    return $this->hasMany(Field::class);
}
}