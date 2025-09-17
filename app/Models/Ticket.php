<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'subject',
        'body',
        'status',
        'category',
        'manual_category',
        'note',
        'explanation',
        'confidence'
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->id) $model->id = (string) Str::ulid();
        });
    }

    protected $casts = [
        'confidence' => 'float',
        'manual_category' => 'boolean',
    ];
}
