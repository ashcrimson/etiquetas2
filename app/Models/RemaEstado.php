<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class RemaEstado
 * @package App\Models
 * @version May 30, 2021, 9:18 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $remas
 * @property string $nombre
 */
class RemaEstado extends Model
{
    use SoftDeletes,HasFactory;

    public $table = 'remas_estados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const CREADA = 1;


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function remas()
    {
        return $this->hasMany(\App\Models\Rema::class, 'estado_id');
    }
}
