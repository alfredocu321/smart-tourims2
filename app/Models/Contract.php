<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'contract_name',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
