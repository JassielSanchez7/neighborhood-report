<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Neighbor extends Authenticatable
{

    use SoftDeletes;

    protected $fillable = [
        'full_name',
        'email',
        'dni',
        'email_verified_at',
        'password',
        'phone',
        'is_active'
    ];

    protected $hidden = [
        'password',
    ];


    #[Scope()]
    protected function active(Builder $builder): void
    {
        $builder->where('is_active', true);
    }



    //Relaciones
    public function incidences():HasMany
    {
        return $this->hasMany(Incidence::class);
    }

    public function ratings():HasMany
    {
        return $this->hasMany(Rating::class);
    }


}
