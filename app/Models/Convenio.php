<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Convenio
 * @package App\Models
 * @version March 30, 2021, 8:16 am CST
 *
 * @property string $entidad
 * @property boolean $atencion_urgencia
 * @property boolean $consulta_especialidad
 * @property boolean $laboratorio
 * @property boolean $rayos_x_e_imagenologia
 * @property boolean $procedimiento
 * @property boolean $hospitalizacion
 * @property boolean $urologia
 * @property boolean $cirugia_mediana_complejidad
 * @property boolean $otorrinolaringologia
 * @property boolean $medicina_nuclear
 * @property boolean $hemodinamia
 * @property boolean $medicina_complementaria
 * @property boolean $esterilizacion
 * @property boolean $formalizado
 * @property boolean $acuerdo_comercial
 * @property boolean $tramite
 * @property boolean $historico
 * @property string $inicio_vigencia
 * @property string $termino_vigencia
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
        'entidad',
        'atencion_urgencia',
        'consulta_especialidad',
        'laboratorio',
        'rayos_x_e_imagenologia',
        'procedimiento',
        'hospitalizacion',
        'urologia',
        'cirugia_mediana_complejidad',
        'otorrinolaringologia',
        'medicina_nuclear',
        'hemodinamia',
        'medicina_complementaria',
        'esterilizacion',
        'formalizado',
        'acuerdo_comercial',
        'tramite',
        'historico',
        'inicio_vigencia',
        'termino_vigencia',
        'observaciones'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'entidad' => 'string',
        'atencion_urgencia' => 'boolean',
        'consulta_especialidad' => 'boolean',
        'laboratorio' => 'boolean',
        'rayos_x_e_imagenologia' => 'boolean',
        'procedimiento' => 'boolean',
        'hospitalizacion' => 'boolean',
        'urologia' => 'boolean',
        'cirugia_mediana_complejidad' => 'boolean',
        'otorrinolaringologia' => 'boolean',
        'medicina_nuclear' => 'boolean',
        'hemodinamia' => 'boolean',
        'medicina_complementaria' => 'boolean',
        'esterilizacion' => 'boolean',
        'formalizado' => 'boolean',
        'acuerdo_comercial' => 'boolean',
        'tramite' => 'boolean',
        'historico' => 'boolean',
        'inicio_vigencia' => 'date',
        'termino_vigencia' => 'date',
        'observaciones' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'entidad' => 'required|string|max:255',
        'atencion_urgencia' => 'required|boolean',
        'consulta_especialidad' => 'required|boolean',
        'laboratorio' => 'required|boolean',
        'rayos_x_e_imagenologia' => 'required|boolean',
        'procedimiento' => 'required|boolean',
        'hospitalizacion' => 'required|boolean',
        'urologia' => 'required|boolean',
        'cirugia_mediana_complejidad' => 'required|boolean',
        'otorrinolaringologia' => 'required|boolean',
        'medicina_nuclear' => 'required|boolean',
        'hemodinamia' => 'required|boolean',
        'medicina_complementaria' => 'required|boolean',
        'esterilizacion' => 'required|boolean',
        'formalizado' => 'required|boolean',
        'acuerdo_comercial' => 'required|boolean',
        'tramite' => 'required|boolean',
        'historico' => 'required|boolean',
        'inicio_vigencia' => 'required',
        'termino_vigencia' => 'required',
        'observaciones' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
