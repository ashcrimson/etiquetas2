<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class PacienteAtencion
 * @package App\Models
 * @version May 30, 2021, 1:44 pm CST
 *
 * @property \App\Models\Paciente $paciente
 * @property \App\Models\Rema $rema
 * @property integer $paciente_id
 * @property integer $rema_id
 * @property string $motivo_consulta
 * @property string $clasificacion_triaje
 * @property string $presion_arterial
 * @property string $frecuencia_cardiaca
 * @property string $frecuencia_respiratoria
 * @property integer $temperatura
 * @property integer $saturacion_oxigeno
 * @property string $atencion_enfermeria
 * @property string $antecedentes_morbidos
 * @property string $alergias
 * @property string $medicamentos_habituales
 */
class PacienteAtencion extends Model
{
    use SoftDeletes;

    public $table = 'pacientes_atenciones';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'paciente_id',
        'rema_id',
        'motivo_consulta',
        'clasificacion_triaje',
        'presion_arterial',
        'frecuencia_cardiaca',
        'frecuencia_respiratoria',
        'temperatura',
        'saturacion_oxigeno',
        'atencion_enfermeria',
        'antecedentes_morbidos',
        'alergias',
        'medicamentos_habituales'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'paciente_id' => 'integer',
        'rema_id' => 'integer',
        'motivo_consulta' => 'string',
        'clasificacion_triaje' => 'string',
        'presion_arterial' => 'string',
        'frecuencia_cardiaca' => 'string',
        'frecuencia_respiratoria' => 'string',
        'saturacion_oxigeno' => 'integer',
        'atencion_enfermeria' => 'string',
        'antecedentes_morbidos' => 'string',
        'alergias' => 'string',
        'medicamentos_habituales' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'paciente_id' => 'required',
        'rema_id' => 'required',
        'motivo_consulta' => 'required|string',
        'clasificacion_triaje' => 'required|string|max:255',
        'presion_arterial' => 'required|string|max:255',
        'frecuencia_cardiaca' => 'required|string|max:255',
        'frecuencia_respiratoria' => 'required|string|max:255',
        'temperatura' => 'required|integer',
        'saturacion_oxigeno' => 'required|integer',
        'atencion_enfermeria' => 'required|string',
        'antecedentes_morbidos' => 'required|string',
        'alergias' => 'required|string',
        'medicamentos_habituales' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class, 'paciente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rema()
    {
        return $this->belongsTo(\App\Models\Rema::class, 'rema_id');
    }
}
