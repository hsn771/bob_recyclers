<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackSectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'track_section_id',
        'title',
        'photo',
        'short_description',
        'sort_order',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(TrackSection::class, 'track_section_id');
    }
}
