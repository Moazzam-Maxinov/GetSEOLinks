<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'url',
        'masked_url',
        'monthly_traffic',
        'domain_rating',
        'domain_authority',
        'spam_score',
        'turnaround_time',
        'price',
        'language',
        'quality_score',
        'max_dofollow_links',
        'content_guidelines',
        'minimum_word_count',
        'allowed_link_types',
        'payment_methods',
        'status',
        'is_pending_approval', // Add this field
    ];

    protected $casts = [
        'allowed_link_types' => 'array',
        'payment_methods' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'website_categories');
    }
}
