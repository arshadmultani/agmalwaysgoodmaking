<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'category',
        'starting_price',
        'price_unit',
        'description',
        'features',
        'image_path',
        'is_featured',
        'sort_order',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'features' => 'array',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getFormattedPriceAttribute(): string
    {
        if (! $this->starting_price) {
            return 'Custom Quote';
        }

        return '₹ '.number_format((float) str_replace([',', ' '], '', $this->starting_price)).$this->price_unit;
    }
}
