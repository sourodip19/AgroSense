<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropProgress extends Model
{
    protected $table = 'crop_progresses';
    protected $fillable = [
        'field_id',
        'growth_stage',
        'health_percentage',
        'progress_percentage',
        'predicted_yield',
        'notes',
        'crop_age',
        'crop_image'
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}