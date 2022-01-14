<?php

namespace App\Modules\Accounts\Models;

use App\Modules\Locations\Models\City;
use App\Modules\Users\Models\User;
use App\Traits\ModelsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;
    use ModelsTrait;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function state(): Relationship {
        return $this->city->country;
    }
}
