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

        return $dataTable->addColumn('action', function(Rema $rema){
            $id = $rema->id;
            return view('remas.datatables_actions',compact('rema','id'));
        })->editColumn('nombre',function (Rema $rema){
            return $rema->paciente->nombre_completo;
        })->editColumn('fecha_ingreso',function (Rema $rema){
            return $rema->created_at->format('d/m/Y');
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
        return $model->newQuery()->with(['paciente','user','estado','atencion']);
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

                    ['excel'],
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
            'rut' => ['name' => 'paciente.run','data' => 'paciente.run'],
            'nombre' => ['data' => 'nombre', 'name' => 'nombre', 'searchable' => 'false', 'orderable' => false],

            'primer_nombre' => ['data' => 'paciente.primer_nombre', "name" => "paciente.primer_nombre",'visible' => false,'printable' => false, 'exportable' => false],
            'segundo_nombre' => ['data' => 'paciente.segundo_nombre', "name" => "paciente.segundo_nombre",'visible' => false,'printable' => false, 'exportable' => false],
            'apellido_paterno' => ['data' => 'paciente.apellido_paterno', "name" => "paciente.apellido_paterno",'visible' => false,'printable' => false, 'exportable' => false],
            'apellido_materno' => ['data' => 'paciente.apellido_materno', "name" => "paciente.apellido_materno",'visible' => false,'printable' => false, 'exportable' => false],

            'clasificacion_triaje' => ['name' => 'atencion.clasificacion_triaje','data' => 'atencion.clasificacion_triaje'],
            'fecha_ingreso',
            'estado' => ['name' => 'estado.nombre','data' => 'estado.nombre'],
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
