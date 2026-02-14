<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incidence extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'neighbor_id',
        'type_incidence_id',
        'description',
        'location',
        'status'
    ];

    public function neighbor():BelongsTo
    {
        return $this->belongsTo(Neighbor::class);
    }

    public function typeIncidence():BelongsTo
    {
        return $this->belongsTo(TypeIncidence::class);
    }

    public function images():HasMany
    {
        return $this->hasMany(IncidenceImage::class);
    }

    public function incidenceStatusHistories():HasMany
    {
        return $this->hasMany(IncidenceStatusHistory::class);
        
    }

    public function rating():HasOne
    {
        return $this->hasOne(Rating::class);
    }

    public function primaryImage():HasOne
    {
        return $this->hasOne(IncidenceImage::class)->limit(1);
    }


}
