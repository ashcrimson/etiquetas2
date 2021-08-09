<form id="form-filter"  method="post">

    <div class=-"form-row">

        <div class="form-group col-sm-4">
            {!! Form::label('del', 'Del:') !!}
            {!! Form::date('del', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-4">
            {!! Form::label('al', 'Al:') !!}
            {!! Form::date('al', null, ['class' => 'form-control']) !!}
        </div>



        <div class="form-group col-sm-2">
            {!! Form::label('boton','&nbsp;') !!}
            <div>
                <button type="submit" id="boton" class="btn btn-info btn-block">
                    <i class="fa fa-sync"></i> Aplicar Filtros
                </button>
            </div>
        </div>

        <div class="form-group col-sm-2">
            {!! Form::label('boton','&nbsp;') !!}
            <div>
                <a  href="{{route('preparacionEstados.index')}}" type="submit" id="boton" class="btn btn-info btn-block">
                    <i class="fa fa-times"></i> Limpiar Filtros
                </a>
            </div>
        </div>


    </div>
</form>


@push('scripts')
    <script >
        $(function () {
            $('#form-filter').submit(function(e){

                e.preventDefault();
                console.log('filtrar');
                table = window.LaravelDataTables["dataTableBuilder"];

                table.draw();
            });
        })

    </script>
@endpush

