<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AxisName extends Model
{
    /**
     * @return HasMany|Spectra
     */
    public function spectra(): HasMany
    {
        return $this->hasMany(Spectra::class);
    }
}
