<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'farm_id',
        'field_name',
        'crop_type',
        'soil_type',
        'sowing_date',
        'irrigation_status',
        'field_status',
        'field_size',

    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function cropProgresses()
{
    return $this->hasMany(CropProgress::class);
}
}