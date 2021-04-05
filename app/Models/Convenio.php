<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Convenio
 * @package App\Models
 * @version April 1, 2021, 7:08 am CST
 *
 * @property string $rut
 * @property string $razon_social
 * @property string $direccion
 * @property boolean $formalizado
 * @property boolean $acuerdo_comercial
 * @property boolean $tramite
 * @property boolean $historico
 * @property string $inicio_vigencia
 * @property string $termino_vigencia
 * @property string $observacion_termino
 * @property string $observaciones
 */
class Convenio extends Model
{
    // use SoftDeletes;

    public $table = 'convenios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'rut',
        'razon_social',
        'direccion',
        'formalizado',
        'acuerdo_comercial',
        'tramite',
        'historico',
        'inicio_vigencia',
        'termino_vigencia',
        'observacion_termino',
        'observaciones'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rut' => 'string',
        'razon_social' => 'string',
        'direccion' => 'string',
        'formalizado' => 'boolean',
        'acuerdo_comercial' => 'boolean',
        'tramite' => 'boolean',
        'historico' => 'boolean',
        'observacion_termino' => 'string',
        'observaciones' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rut' => 'required|string|max:255',
        'razon_social' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'formalizado' => 'required|boolean',
        'acuerdo_comercial' => 'required|boolean',
        'tramite' => 'required|boolean',
        'historico' => 'required|boolean',
        'inicio_vigencia' => 'required',
        'termino_vigencia' => 'required',
        'observacion_termino' => 'required|string|max:255',
        'observaciones' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function detalle_convenio()
    {
        return $this->hasMany(Detalle_Convenio::class);
    }

    
}
