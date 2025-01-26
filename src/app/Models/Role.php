<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(MemberProfile::class)
            ->withPivot('active')
            ;
    }

    public function getDefaultRole()
    {
        return config('ipsc.default_member_profile_role');
    }

    public function scopeDefaultRole(Builder $query): void
    {
        $query->where('name', $this->getDefaultRole());
    }
}
