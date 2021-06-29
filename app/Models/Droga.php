<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Droga
 * @package App\Models
 * @version June 29, 2021, 8:54 am CST
 *
 * @property string $nombre
 * @property number $dosis
 * @property string $suero_dilusion
 * @property number $vol_agregado
 * @property number $vol_final
 * @property string $bajada
 */
class Droga extends Model
{
    use SoftDeletes;

    public $table = 'drogas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'dosis',
        'suero_dilusion',
        'vol_agregado',
        'vol_final',
        'bajada'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'dosis' => 'decimal:2',
        'suero_dilusion' => 'string',
        'vol_agregado' => 'decimal:2',
        'vol_final' => 'decimal:2',
        'bajada' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'dosis' => 'required|numeric',
        'suero_dilusion' => 'required|string|max:255',
        'vol_agregado' => 'required|numeric',
        'vol_final' => 'required|numeric',
        'bajada' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
