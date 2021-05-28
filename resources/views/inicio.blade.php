
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Practicante">

	<!-- CSRF Token -->
	<!--    <meta name="csrf-token" content="{{ csrf_token() }}"> -->

	<!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

	<!-- Scripts -->
	<script src="/newcyc/assets/js/app.js" defer></script>

	<!-- Plantilla -->
	<!-- Bootstrap core CSS-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<!-- Custom fonts for this template-->
	<link href="/newcyc/assets/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
<!--	<link href="--><?//=base();?><!--/assets/assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">-->

	<!-- Custom styles for this template-->
	<link href="/newcyc/assets/assets/frontend/css/sb-admin.css" rel="stylesheet">

	<!-- Css selectize selectpicker-->
	<link rel="stylesheet" href="/newcyc/assets/assets/frontend/css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="/newcyc/assets/assets/frontend/css/selectize.default.css" rel="stylesheet">

    <link rel="stylesheet" href="/newcyc/assets/assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/newcyc/assets/assets/vendor/vue-multiselect.min.css" rel="stylesheet">

	<style>
		.navbar-dark .navbar-nav .nav-link {
			color: white;
		}

		.sidebar .nav-item .nav-link span{
			color: white;
			
		}
		.skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a, .skin-blue .sidebar-menu>li.menu-open>a {
			color: #fff;
			background: #1e282c;
		}

		.sidebar-menu, .main-sidebar .user-panel, .sidebar-menu>li.header {
			white-space: nowrap;
			overflow: hidden;
		}

		.elmenu {
			color: rgba(255, 255, 255, 0.5);
			text-decoration: none;
		}

		.elmenu:hover {
			color: #fff;
			text-decoration: none;
		}

		.treeview {
			text-align: left;
		}

		::marker {
			unicode-bidi: isolate;
			font-variant-numeric: tabular-nums;
			text-transform: none;
			text-indent: 0px !important;
			text-align: start !important;
			text-align-last: start !important;
		}

		.sidebar-menu, .main-sidebar .user-panel, .sidebar-menu>li.header {
			white-space: nowrap;
			overflow: hidden;
		}

		.user-panel {
			position: relative;
			width: 100%;
			padding: 10px;
			overflow: hidden;
			height: 110px;
			color: rgba(255, 255, 255, 0.5);
		}

		.user-panel:before, .user-panel:after {
			content: " ";
			display: table;
		}

		.sidebar-menu, .main-sidebar .user-panel, .sidebar-menu>li.header {
			white-space: nowrap;
			overflow: hidden;
		}

		.pull-left {
			float: left!important;
		}

		.user-panel>.image>img {
			width: 100%;
			max-width: 45px;
			height: auto;
		}

		.skin-blue .user-panel>.info, .skin-blue .user-panel>.info>a {
			color: #fff;
		}

		.user-panel>.info {
			padding: 5px 5px 5px 15px;
			line-height: 1;
			position: absolute;
			left: 55px;
			color: #fff;
		}

		.user-panel>.info>p {
			font-weight: 600;
			margin-bottom: 9px;
			font-size:14px;
		}

		.user-panel>.info>a {
			text-decoration: none;
			padding-right: 5px;
			margin-top: 3px;
			font-size: 11px;
			color: #fff;
		}

		.encabezado {
			font-size: 24px;
			color: #333;
			
		}

		.encabezado:hover {
			text-decoration: none;
			color: #000;
		}

		.breadcrumb-item.active {
			margin-top: 10px;
			
			
		}

		
	</style>

</head>

<body id="page-top">
	

    <div id="wrapper">
        <!-- Sidebar -->
    

        <div id="content-wrapper">
                <div class="container-fluid">
                    



    <script lang="javascript" src="/newcyc/assets/assets/frontend/js/xlsx.full.min.js"></script>
    <script lang="javascript" src="/newcyc/assets/assets/frontend/js/FileSaver.js"></script>
    <script lang="javascript" src="/newcyc/assets/assets/frontend/js/xlsx.core.min.js"></script>
    
    <style>
    .card-body {
        overflow: scroll;
        
    }


    </style>
 
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/newcyc/contratos" class="encabezado">Sistema Rema</a>
        </li>
        
    </ol>

        
        <!-- DataTables Example -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="get" class="form-horizontal" action="/newcyc/contratos/">

                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <label>Rut Paciente</label>
                            <div>
                               <input type="text">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <label>Fecha Desde</label>
                            <div>
                               <input type="text">
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <label>Fecha Hasta</label>
                            <div>
                               <input type="text">
                            </div>
                        </div>

                    

                      
                    </div>

                    <hr>
                    <div class="btn-group float-right ml-3">
                                                    <a href="/newcyc/contratos/new/" class="btn btn-primary rounded"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Nuevo</a>
                                                </div>
                    <div class="btn-group float-right">
                                                <button type="submit" class="btn btn-primary rounded"><i class="fa fa-search"></i> Buscar</button>
                    </div>


                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <span>
                    <i class="fas fa-table"> Fichas</i>
                </span>
                <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover nowrap" id="tablaContratos">
                    <thead>
                    <tr >
                        <!-- <th data-priority="1">ID Contrato</th> -->
                        <th >Rut</th>
                        <th >Nombres</th>
                        <th >Apellidos</th>
                        <th >Fecha Ingreso</th>
                        <th >Estado</th>
                        

        
                    </tr>
                    </thead>
                    <tr class="text-sm">

            
                        <td >96981250-9</td>
                        <td>FRANCISCO JAVIER </td>
                        <td >MORAGA LATAPIAT</td>
                        <td>25/5/2021</td>
                               
                        <td>Creada</td>
                            
                            

                        </tr>
                                                
                                             
                </table>
<!--        <nav class="d-flex justify-content-center wow fadeIn mt-3">-->
<!--            --><!--        </nav>-->

    </div>

    

    <script src="/newcyc/assets/assets/frontend/js/jquery-3.3.1.js"></script>
    <script src="/newcyc/assets/assets/frontend/js/selectize.js"></script>
    <script src="/newcyc/assets/assets/vendor/datatables/datatables.min.js"></script>
    <script>
        $('.selectField').selectize({
            create: false,
            sortField: {
                field: 'text',
                direction: 'asc'
            },
            dropdownParent: 'body'
        });
	</script>

    <!-- {{-- Script para mostrar nombre archivo en el select --}} -->
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>


        <script>
            $('#tablaContratos').DataTable( {
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal( {
                            header: function ( row ) {
                                var data = row.data();
                                return 'Detalles de contrato: '+data[0];
                            }
                        } ),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                            tableClass: 'table'
                        } )
                    }
                },
                columnDefs: [
                    { responsivePriority: 2, targets: -1 }
                ],
                // dom: 'Br',
                dom: 'Bltrip',
                buttons: [
                    'excel'
                ],
                pageLength: 0,
                lengthMenu: [10, 20, 50, 100, 200, 500]
                } );

            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })

        </script>

    



		                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Sistema Rema 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- /.content-wrapper -->
        </div>
	    <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <a class="btn btn-primary" href="/newcyc/logout"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Salir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Bootstrap core JavaScript -->
    <script src="/newcyc/assets/assets/frontend/js/popper.js"></script>
    <script src="/newcyc/assets/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/newcyc/assets/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/newcyc/assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="/newcyc/assets/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!--   Custom scripts for all pages -->
    <script src="/newcyc/assets/assets/frontend/js/sb-admin.min.js"></script>

    <!-- Slimscroll -->
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="https://adminlte.io/themes/AdminLTE/dist/js/demo.js"></script>


</body>
</html>
		