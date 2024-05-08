<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class PerikananOffering extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'qty',
        'price',
        'is_visible',
    ];
    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
