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
        'crop_image',
        'ai_health_score',
'ai_disease',
'ai_recommendation',
'ai_risk_level',
'crop_condition',
'visible_issue',
'crop_image',
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}