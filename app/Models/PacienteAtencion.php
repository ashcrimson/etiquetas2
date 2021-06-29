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
        'fecha_admision',
        'paciente_id',
        'rema_id',
        'qf',
        'droga',
        'dosis',
        'suero_dilusion',
        'vol_suero',
        'vol_agregado',
        'vol_final',
        'bajada',
        'medico',
        'servicio_solicitante',
        'control_producto_terminado',
        'entrega_conforme_enfermeria'
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
        'qf' => 'string',
        'droga' => 'string',
        'dosis' => 'integer',
        'suero_dilusion' => 'string',
        'vol_suero' => 'string',
        'vol_agregado' => 'decimal',
        'vol_final' => 'decimal',
        'bajada' => 'string',
        'medico' => 'string',
        'servicio_solicitante' => 'string',
        'control_producto_terminado' => 'string',
        'entrega_conforme_enfermeria' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'paciente_id' => 'required',
        'rema_id' => 'required',
        'qf' => 'nullable',
        'droga' => 'nullable',
        'dosis' => 'nullable',
        'suero_dilusion' => 'nullable',
        'vol_suero' => 'nullable',
        'vol_agregado' => 'nullable',
        'vol_final' => 'nullable',
        'bajada' => 'nullable',
        'medico' => 'nullable',
        'servicio_solicitante' => 'nullable',
        'medicamentos_habituales' => 'nullable',
        'entrega_conforme_enfermeria' => 'nullable'
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
