<?php

namespace App\Models;

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
        'paciente_id' => 'required',
        'numero_unidad' => 'required|string|max:255',
        'nombres_conductor' => 'required|string|max:255',
        'apellidos_conductor' => 'required|string|max:255',
        'hora_de_llamada' => 'required',
        'hora_de_salida' => 'required',
        'hora_de_llegada' => 'required',
        'user_id' => 'required',
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
