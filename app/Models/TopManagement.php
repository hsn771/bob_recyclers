<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopManagement extends Model
{
    protected $fillable = ['name', 'designation', 'image'];

    // public function management()
    // {
    //     return $this->belongsTo(Management::class);
    // }
}
