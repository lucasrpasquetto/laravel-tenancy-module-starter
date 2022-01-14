<?php

namespace App\Modules\Locations\Models;

use App\Modules\Accounts\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'code',
        'region_id'
    ];

    public $timestamps = false;

    /**
     * Relacionamento com a tabela coutry
     */
    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Relacionamento com a tabela region
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function accounts(): HasManyThrough
    {
        return $this->hasManyThrough(Account::class, City::class);
    }
}
