<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncidenceImage extends Model
{
    //
    protected $fillable = [
        'incidence_id',
        'image_path'
    ];


    public function incidence():BelongsTo
    {
        return $this->belongsTo(Incidence::class);
    }


}
