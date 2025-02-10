<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublisherOrder extends Model
{
    use HasFactory;

    protected $table = 'publisher_orders';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'ordered_by',
        'ordered_to',
        'site_id',
        'requested_url',
        'link_text',
        'price',
        'status',
        'notes',
        'approved_at',
        'rejected_at',
        'is_completed',
        'published_link',
        'payment_pending',
        'screenshot',
        'rejected_by_publisher_reason',
        'vendor_status',
        'rejected_by_vendor_reason',
        'rejected_by_vendor_time',
        'completed_by_publisher_at'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_completed' => 'boolean',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'payment_pending' => 'string',
        'vendor_status' => 'string',  // Enum stored as a string in Laravel
        'rejected_by_vendor_time' => 'datetime',
        'completed_by_publisher_at' => 'datetime',
    ];

    public function orderedBy()
    {
        return $this->belongsTo(User::class, 'ordered_by');
    }

    public function orderedTo()
    {
        return $this->belongsTo(User::class, 'ordered_to');
    }

    public function site()
    {
        return $this->belongsTo(Website::class, 'site_id');
    }
}
