<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'features',
        'age_range',
        'lesson_count',
        'duration_minutes',
        'image',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'duration_minutes' => 'decimal:1',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function pricingPlans()
    {
        return $this->hasMany(PricingPlan::class);
    }
}
