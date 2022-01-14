<?php

namespace App\Modules\Locations\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /**
     * The attributes searchable
     *
     * @var array
     */
    protected $searchable = ['name', 'slug'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    public $timestamps = false;

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }
}
