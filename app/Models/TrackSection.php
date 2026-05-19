<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrackSection extends Model
{
    use HasFactory;

    protected $fillable = ['position', 'title'];

    public function items(): HasMany
    {
        return $this->hasMany(TrackSectionItem::class)->orderBy('sort_order')->orderBy('id');
    }
}
