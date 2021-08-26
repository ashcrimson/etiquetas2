<?php

namespace App\DataTables\Scopes;

use Carbon\Carbon;
use Yajra\DataTables\Contracts\DataTableScope;

class ScopePreparacionDataTable implements DataTableScope
{

    public $del;

    public $al;

    public $tens;

    public $medicos;

    public $quimicos;

    public $estados;


    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if ($this->tens){
            if (is_array($this->tens)){
                $query->whereIn('ten_id',$this->tens);
            }else{
                $query->where('ten_id',$this->tens);
            }
        }

        if ($this->medicos){
            if (is_array($this->medicos)){
                $query->whereIn('medico_id',$this->medicos);
            }else{
                $query->where('medico_id',$this->medicos);
            }
        }

        if ($this->quimicos){
            if (is_array($this->quimicos)){
                $query->whereIn('responsable_id',$this->quimicos);
            }else{
                $query->where('responsable_id',$this->quimicos);
            }
        }

        if ($this->estados){
            if (is_array($this->estados)){
                $query->whereIn('estado_id',$this->estados);
            }else{
                $query->where('estado_id',$this->estados);
            }
        }

        if ($this->del && $this->al){
            $del = Carbon::parse($this->del);
            $al = Carbon::parse($this->al)->addDay();

            $query->whereBetween('fecha_elaboracion',[$del,$al]);
        }
    }
}
