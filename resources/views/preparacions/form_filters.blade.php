<form id="form-filter">

    <div class="form-row">


        <!-- Responsable Id Field -->
        <div class="form-group col-sm-4">
            <select-empleado :items="responsables"
                             v-model="responsable"
                             label="Profesional a cargo (Q.F)"
                             :cargo="cargo_quimico"
                             name="responsable_id"
                             id="modalSelectQuimico"

            >

            </select-empleado>
        </div>
        <!-- Medico Id Field -->
        <div class="form-group col-sm-4">
            <select-empleado :items="medicos"
                             v-model="medico"
                             label="Medico"
                             name="medico_id"
                             :cargo="cargo_medico"
                             id="modalSelectMedico"
            >

            </select-empleado>
        </div>

        <!-- Empeado ten -->
        <div class="form-group col-sm-4">
            <select-empleado :items="tens"
                             v-model="ten"
                             label="TENS"
                             name="ten_id"
                             :cargo="cargo_ten"
                             id="modalSelectTens"
            >
            </select-empleado>
        </div>

        <!-- Estado Field -->
        <div class="form-group col-sm-4">
            <label for="estado_id">Estado:</label>
            <multiselect v-model="estado" :options="estados" label="nombre" placeholder="Seleccione uno...">
            </multiselect>
            <input type="hidden" name="estado_id" :value="estado ? estado.id : null">
        </div>

        <div class="form-group col-sm-4">
            {!! Form::label('del', 'Desde:') !!}
            {!! Form::date('del', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-4">
            {!! Form::label('al', 'Hasta:') !!}
            {!! Form::date('al', null, ['class' => 'form-control']) !!}
        </div>



        <div class="form-group col-sm-2">
            {!! Form::label('boton','&nbsp;') !!}
            <div>
                <button type="submit" id="btnSubmitFormFilters" class="btn btn-info">
                    <i class="fa fa-search"></i> Aplicar Filtros
                </button>
            </div>
        </div>

        <div class="form-group col-sm-2">
            {!! Form::label('boton','&nbsp;') !!}
            <div>
                <a  href="{{route('preparacions.index')}}" type="submit" id="boton" class="btn btn-info btn-block">
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

        new Vue({
            el: '#form-filter',
            name: 'formFilterPreparaciones',
            mounted() {
            },
            created() {
            },
            data: {
                loading : false,

                responsables: @json(\App\Models\Empleado::quimico()->get() ?? []),
                responsable: @json($preparacion->responsable ?? \App\Models\Empleado::find(old('responsable_id')) ?? null),

                medicos: @json(\App\Models\Empleado::medico()->get() ?? []),
                medico: @json($preparacion->medico ?? \App\Models\Empleado::find(old('medico_id')) ?? null),

                tens: @json(\App\Models\Empleado::ten()->get() ?? []),
                ten: @json($preparacion->ten ?? \App\Models\Empleado::find(old('ten_id')) ?? null),

                cargo_quimico: @json(\App\Models\Cargo::find(\App\Models\Cargo::QUIMICO_FARMACEUTICO)),
                cargo_medico: @json(\App\Models\Cargo::find(\App\Models\Cargo::MEDICO)),
                cargo_ten: @json(\App\Models\Cargo::find(\App\Models\Cargo::TEN)),

                estados: @json(\App\Models\PreparacionEstado::all() ?? []),
                estado: @json($preparacion->estado ?? \App\Models\PreparacionEstado::find(old('estado_id')) ?? null),

            },
            methods: {
                getDatos(){
                    console.log('Metodo Get Datos');
                }
            }
        });
    </script>
@endpush

