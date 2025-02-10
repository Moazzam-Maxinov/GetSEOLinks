<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class WebsiteCategory extends Pivot
{
    use HasFactory;

    protected $table = 'website_categories';
}
