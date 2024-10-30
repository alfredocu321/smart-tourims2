<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class);
    }

    public function productPictures(): BelongsToMany
    {
        return $this
            ->belongsToMany(Media::class, 'media_post', 'post_id', 'media_id')
            ->withPivot('order')
            ->orderBy('order');
    }

    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class,'image','id');
    }
}
