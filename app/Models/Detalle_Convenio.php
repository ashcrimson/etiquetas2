<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Convenio extends Model
{
    use HasFactory;

    public function convenio ()
    {
        return $this->belongsTo(Convenio::class);
    }
}
