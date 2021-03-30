<?php

namespace App\DataTables;

use App\Models\Convenio;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ConvenioDataTable extends DataTable
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

        return $dataTable->addColumn('action', function($Convenio){
            $id = $Convenio->id;
            return view('convenios.datatables_actions',compact('Convenio','id'));
        })
        ->editColumn('atencion_urgencia',function ($item){
            return $item->atencion_urgencia ? 'Sí' : 'No';
        })
        ->editColumn('consulta_especialidad',function ($item){
            return $item->consulta_especialidad ? 'Sí' : 'No';
        })
        ->editColumn('laboratorio',function ($item){
            return $item->laboratorio ? 'Sí' : 'No';
        })
        ->editColumn('rayos_x_e_imagenologia',function ($item){
            return $item->rayos_x_e_imagenologia ? 'Sí' : 'No';
        })
        ->editColumn('procedimiento',function ($item){
            return $item->procedimiento ? 'Sí' : 'No';
        })
        ->editColumn('endoscopia_urologica',function ($item){
            return $item->endoscopia_urologica ? 'Sí' : 'No';
        })
        ->editColumn('servicio_de_esterilizacion',function ($item){
            return $item->servicio_de_esterilizacion ? 'Sí' : 'No';
        })
        ->editColumn('hospitalizacion',function ($item){
            return $item->hospitalizacion ? 'Sí' : 'No';
        })
        ->editColumn('urologia',function ($item){
            return $item->urologia ? 'Sí' : 'No';
        })
        ->editColumn('cirugia_mediana_complejidad',function ($item){
            return $item->cirugia_mediana_complejidad ? 'Sí' : 'No';
        })
        ->editColumn('otorrinolaringologia',function ($item){
            return $item->otorrinolaringologia ? 'Sí' : 'No';
        })
        ->editColumn('medicina_nuclear',function ($item){
            return $item->medicina_nuclear ? 'Sí' : 'No';
        })
        ->editColumn('hemodinamia',function ($item){
            return $item->hemodinamia ? 'Sí' : 'No';
        })
        ->editColumn('medicina_complementaria',function ($item){
            return $item->medicina_complementaria ? 'Sí' : 'No';
        })
        ->editColumn('esterilizacion',function ($item){
            return $item->esterilizacion ? 'Sí' : 'No';
        })
        ->editColumn('formalizado',function ($item){
            return $item->formalizado ? 'Sí' : 'No';
        })
        ->editColumn('acuerdo_comercial',function ($item){
            return $item->acuerdo_comercial ? 'Sí' : 'No';
        })
        ->editColumn('tramite',function ($item){
            return $item->tramite ? 'Sí' : 'No';
        })
        ->editColumn('historico',function ($item){
            return $item->historico ? 'Sí' : 'No';
        })
        ;

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Convenio $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Convenio $model)
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
            'entidad',
            'atencion_urgencia',
            'consulta_especialidad',
            'laboratorio',
            'rayos_x_e_imagenologia',
            'procedimiento',
            'endoscopia_urologica',
            'servicio_de_esterilizacion',
            'hospitalizacion',
            'urologia',
            'cirugia_mediana_complejidad',
            'otorrinolaringologia',
            'medicina_nuclear',
            'hemodinamia',
            'medicina_complementaria',
            'esterilizacion',
            'formalizado',
            'acuerdo_comercial',
            'tramite',
            'historico',
            'inicio_vigencia',
            'termino_vigencia',
            'observaciones'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'conveniosdatatable_' . time();
    }
}
