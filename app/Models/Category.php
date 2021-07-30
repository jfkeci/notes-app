<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
