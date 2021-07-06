<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Protocolo
 * @package App\Models
 * @version July 6, 2021, 1:05 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $preparaciones
 * @property string $nombre
 */
class Protocolo extends Model
{
    use SoftDeletes;

    public $table = 'protocolos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


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
    public function preparaciones()
    {
        return $this->hasMany(\App\Models\Preparacione::class, 'protocolo_id');
    }
}
