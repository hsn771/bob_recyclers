<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontMenu extends Model
{
    use HasFactory;
    
     public function children()
    {
        return $this->hasMany(FrontMenu::class, 'parent_id', 'id');
    }

    public function hasChildren()
    {
        return $this->children()->count() > 0;
    }
}
