<?php

namespace App\DataTables;

use App\Models\PacienteAtencion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PacienteAtencionDataTable extends DataTable
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

        return $dataTable->addColumn('action', function($Paciente Atencion){
            $id = $Paciente Atencion->id;
            return view('paciente_atencions.datatables_actions',compact('Paciente Atencion','id'));
        });

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PacienteAtencion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PacienteAtencion $model)
    {
        return $model->newQuery();
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
            'medicamentos_habituales',
            'entrega_conforme_enfermeria'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'paciente_atencionsdatatable_' . time();
    }
}
