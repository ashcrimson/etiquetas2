<?php

namespace App\DataTables;

use App\Models\Preparacion;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PreparacionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', function(Preparacion $preparacion){
            $id = $preparacion->id;
            return view('preparacions.datatables_actions',compact('preparacion','id'));
        })->editColumn('volumen_suero',function (Preparacion $preparacion){
            return $preparacion->volumen_suero==0 ? 'sin dilusión' : $preparacion->volumen_suero;
        })->editColumn('fecha_admision',function (Preparacion $preparacion){
            return Carbon::parse($preparacion->fecha_admision)->format('d/m/Y');
        });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Preparacion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Preparacion $model)
    {
        return $model->newQuery()->with(['dilucion','droga','responsable','medico','paciente','estado','protocolo','user']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'     => 'Bfltrip',
                'order'   => [[0, 'desc']],
                'language' => ['url' => asset('js/SpanishDataTables.json')],
                //'scrollX' => false,
                'stateSave' => true,
                'responsive' => true,
                'buttons' => [
                    ['extend' => 'create', 'text' => '<i class="fa fa-plus"></i> <span class="d-none d-sm-inline">Crear</span>'],
                    ['extend' => 'print', 'text' => '<i class="fa fa-print"></i> <span class="d-none d-sm-inline">Imprimir</span>'],
                    ['extend' => 'reload', 'text' => '<i class="fa fa-sync-alt"></i> <span class="d-none d-sm-inline">Recargar</span>'],
                    ['extend' => 'reset', 'text' => '<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'],
                    ['extend' => 'export', 'text' => '<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>'],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'fecha_admision',
            'paciente' => ['data' => 'paciente.nombre_completo','name' => 'paciente.primer_nombre'],
            'rut' => ['data' => 'paciente.run','name' => 'paciente.run'],
            'Q.F' => ['data' => 'responsable.iniciales','name' => 'responsable.iniciales'],
            'droga' => ['data' => 'droga.nombre','name' => 'droga.nombre'],
            'dosis',
            'dilucion' => ['data' => 'dilucion.nombre','name' => 'dilucion.nombre'],
            'volumen_suero',
            'volumen_agregado',
            'volumen_final',
            'bajada',
            'medico' => ['data' => 'medico.apellidos','name' => 'medico.apellidos'],
            'servicio_solicitante',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'preparacionsdatatable_' . time();
    }
}
