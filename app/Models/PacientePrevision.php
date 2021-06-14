<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class PacientePrevision
 * @package App\Models
 * @version June 14, 2021, 3:40 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $pacientes
 * @property string $nombre
 * @property boolean $activo
 */
class PacientePrevision extends Model
{
    use SoftDeletes;

    public $table = 'pacientes_previsiones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'activo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'activo' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pacientes()
    {
        return $this->hasMany(\App\Models\Paciente::class, 'prevision_id');
    }
}
