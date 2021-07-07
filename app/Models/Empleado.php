<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Empleado
 * @package App\Models
 * @version July 6, 2021, 12:56 pm CST
 *
 * @property \App\Models\Cargo $cargo
 * @property \Illuminate\Database\Eloquent\Collection $preparaciones
 * @property \Illuminate\Database\Eloquent\Collection $preparacione1s
 * @property string $rut
 * @property string $nombres
 * @property string $apellidos
 * @property string $iniciales
 * @property integer $cargo_id
 */
class Empleado extends Model
{
    use SoftDeletes;

    public $table = 'empleados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = ['iniciales','nombre_completo','text'];

    public $fillable = [
        'rut',
        'nombres',
        'apellidos',
        'cargo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rut' => 'string',
        'nombres' => 'string',
        'apellidos' => 'string',
        'cargo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rut' => 'nullable|string|max:45',
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'cargo_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cargo()
    {
        return $this->belongsTo(\App\Models\Cargo::class, 'cargo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preparaciones()
    {
        return $this->hasMany(\App\Models\Preparacione::class, 'responsable_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function preparacione1s()
    {
        return $this->hasMany(\App\Models\Preparacione::class, 'medico_id');
    }

    public function scopeQuimico(Builder $q)
    {
        $q->where('cargo_id',Cargo::QUIMICO_FARMACEUTICO);
    }


    public function scopeMedico(Builder $q)
    {
        $q->where('cargo_id',Cargo::MEDICO);
    }

    public function getInicialesAttribute()
    {
        return $this->getIniciales($this->nombres." ".$this->apellidos);
    }

    function getIniciales($nombre){
        $name = '';
        $explode = explode(' ',$nombre);
        foreach($explode as $x){
            $name .=  $x[0];
        }
        return $name;
    }

    public function getNombreCompletoAttribute()
    {
        return $this->nombres." ".$this->apellidos;
    }

    public function getTextAttribute()
    {
        return $this->nombre_completo." (".$this->cargo->nombre.")";
    }

}
