<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    //
    protected $fillable = [
        'incidence_id',
        'neighbor_id',
        'rating',
        'comment'
    ];

    public function incidence():BelongsTo
    {
        return $this->belongsTo(Incidence::class);
    }

    public function neighbor():BelongsTo
    {
        return $this->belongsTo(Neighbor::class);
    }

}
