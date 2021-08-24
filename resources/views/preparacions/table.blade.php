

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        $(function () {
            var dt = window.LaravelDataTables["dataTableBuilder"];

            //Cuando dibuja la tabla
            dt.on( 'draw.dt', function () {
                $(this).addClass('table-sm table-striped table-bordered table-hover');
                $(this).find('tbody').addClass('text-sm');
                $(this).find('thead').addClass('text-sm');
                $('[data-toggle="tooltip"]').tooltip();
            }).on( 'processing.dt', function ( e, settings, processing ) {
                if(processing){

                    $('#btnSubmitFormFilters').html( '<i class="fa fa-sync fa-spin"></i> Filtrando...' );
                }else{
                    $('#btnSubmitFormFilters').html( '<i class="fa fa-search"></i> Aplicar Filtros' );
                }
            } );



        })
    </script>
@endpush
