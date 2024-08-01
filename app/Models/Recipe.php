<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class);
}

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'time_to_cook',
        'ingredients',
        'image',
        'how_to_cook',
    ];
}
