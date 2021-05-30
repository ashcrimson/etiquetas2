<?php

namespace App\DataTables;

use App\Models\Rema;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RemaDataTable extends DataTable
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

        return $dataTable->addColumn('action', function($Rema){
            $id = $Rema->id;
            return view('remas.datatables_actions',compact('Rema','id'));
        });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Rema $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Rema $model)
    {
        return $model->newQuery()->with(['paciente','user']);
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
            'paciente' => ['name' => 'paciente.primer_nombre','data' => 'paciente.primer_nombre'],
            'hora_de_llamada',
            'hora_de_salida',
            'hora_de_llegada',
            'user'=> ['name' => 'user.name','data' => 'user.name'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'remasdatatable_' . time();
    }
}
