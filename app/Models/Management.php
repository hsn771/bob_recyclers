<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable = [
        'top_management_title', 'top_description',
        'mid_management_title', 'mid_description',
        'yard_management_title', 'yard_description'
    ];

    // public function topManagement()
    // {
    //     return $this->hasMany(TopManagement::class);
    // }

    // public function midManagement()
    // {
    //     return $this->hasMany(MidManagement::class);
    // }

    // public function yardManagement()
    // {
    //     return $this->hasMany(YardManagement::class);
    // }
}
