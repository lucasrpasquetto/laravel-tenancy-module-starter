<?php

namespace App\Traits;

trait ModelsTrait
{
    public function scopeActive($query, $active = true)
    {
        return $query->where('is_active', $active);
    }
}
