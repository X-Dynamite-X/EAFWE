<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_ar',
        'slug',
        'message_en',
        'message_ar',
        'type',
        'published_date',
        'is_active',
        'is_pinned',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_pinned' => 'boolean',
        'published_date' => 'date',
        'order' => 'integer',
    ];

    public function getTitleAttribute()
    {
        return $this->{'title_' . app()->getLocale()};
    }

    public function getMessageAttribute()
    {
        return $this->{'message_' . app()->getLocale()};
    }
}
