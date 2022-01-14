<?php

namespace App\Modules\Locations\Models;

use App\Modules\Representatives\Models\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['state'];

    /**
     * The attributes searchable
     *
     * @var array
     */
    protected $searchable = ['name', 'state.name', 'state.slug'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state_id',
        'name',
        'slug',
        'lat',
        'lng',
        'code'
    ];

    public $timestamps = false;

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }
}
