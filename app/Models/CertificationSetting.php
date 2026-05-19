<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificationSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_image',
        'intro_text',
    ];
}
