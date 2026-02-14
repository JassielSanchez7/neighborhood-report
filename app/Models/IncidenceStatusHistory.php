<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncidenceStatusHistory extends Model
{
    //
    protected $fillable = [
        'incidence_id',
        'old_status',
        'new_status'
    ];

    public function incidence():BelongsTo
    {
        return $this->belongsTo(Incidence::class);
    }


}
