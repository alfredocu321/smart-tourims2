<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image():HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function media():BelongsTo
    {
        return $this->belongsTo(Media::class,'image','id');
    }

}
