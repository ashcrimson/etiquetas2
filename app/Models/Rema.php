<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Rema
 * @package App\Models
 * @version May 30, 2021, 1:34 pm CST
 *
 * @property \App\Models\Paciente $paciente
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $pacientesAtenciones
 * @property integer $paciente_id
 * @property string $numero_unidad
 * @property string $nombres_conductor
 * @property string $apellidos_conductor
 * @property time $hora_de_llamada
 * @property time $hora_de_salida
 * @property time $hora_de_llegada
 * @property integer $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Rema extends Model
{
    use SoftDeletes,HasFactory;

    public $table = 'remas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'paciente_id',
        'numero_unidad',
        'nombres_conductor',
        'apellidos_conductor',
        'hora_de_llamada',
        'hora_de_salida',
        'hora_de_llegada',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'paciente_id' => 'integer',
        'numero_unidad' => 'string',
        'nombres_conductor' => 'string',
        'apellidos_conductor' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'run' => 'required|string|max:255',
        'dv_run' => 'required|string|max:255',

        'apellido_paterno' => 'required|string|max:255',
        'apellido_materno' => 'nullable|string|max:255',
        'primer_nombre' => 'required|string|max:255',
        'segundo_nombre' => 'nullable|string|max:255',
        'fecha_nac' => 'required',
        'sexo' => 'required|string|max:255',
        'sigla_grado' => 'nullable',
        'unid_rep_dot' => 'nullable',
        'cond_alta_dot' => 'nullable',


        'hora_de_llamada' => 'required',
        'hora_de_salida' => 'required',
        'hora_de_llegada' => 'required',

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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pacientesAtenciones()
    {
        return $this->hasMany(\App\Models\PacientesAtencione::class, 'rema_id');
    }
}
