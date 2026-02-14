<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeIncidence extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function incidences():HasMany
    {
        return $this->hasMany(Incidence::class);
    }

}
