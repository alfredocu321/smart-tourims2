<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Traits extends Model
{
    use HasFactory;
    
}

trait HasRoles
{
    public function hasRole($role): bool
    {
        if (is_array($role)) {
            return collect($this->roles)->intersect($role)->isNotEmpty();
        }

        return Str::lower($this->roles[0]) === Str::lower($role);
    }

    public function assignRole($role)
    {
        if (is_array($role)) {
            $this->roles = $role;
        } else {
            $this->roles = [$role];
        }
    }

    public function removeRole($role)
    {
        $this->roles = collect($this->roles)->reject(fn ($r) => $r === $role)->values()->all();
    }
}