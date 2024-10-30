<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'category_name',
        'users_count',
        'image',
    ];

    /*public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'category_users');
    }*/

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
