@extends('layouts.app')

@section('title_page',__('Dashboard'))

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Ingresos Por Dia
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div id="chartDia" style="height: 300px;"></div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Ingresos Por Mes
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div id="chartMes" style="height: 300px;"></div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Ingresos Por Categoria
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div id="chartCategoria" style="height: 300px;"></div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script src="{{asset("js/dashboard.js")}}"></script>
    <script src="{{asset("js/demo.js")}}"></script>

    <script src="{{asset('js/echarts.min.js')}}"></script>
    <script src="{{asset('js/chartisan_echarts.js')}}"></script>
    <script>
        const chartIngresoDia = new Chartisan({
            el: '#chartDia',
            url: "@chart('chart_ingresos_dia')",
        });

        const chartIngresosMes = new Chartisan({
            el: '#chartMes',
            url: "@chart('chart_ingresos_mes')",
        });

        const chartIngresoCategoria = new Chartisan({
            el: '#chartCategoria',
            url: "@chart('chart_ingresos_por_categoria')",
        });
    </script>
@endpush
