<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>prodi SI</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" /> --}}
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet">
    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables CSS -->
{{-- <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
<!-- DataTables JS -->
{{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}

    <link rel="stylesheet" href="{{ asset('css/template.css') }}">

    <head>
        <!-- Tambahkan di bagian <head> -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15"></div>
                <div class="sidebar-brand-text mx-3">kurikulum prodi SI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
            @endauth -->

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- public panel -->
            <!-- Nav Items -->
     <!-- menu cpl-pl-bk -->
     @can('menu_cpl-bk-pl.view')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-project-diagram" aria-hidden="true"></i>
        <span>menu cpl-pl-bk </span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">list tabel master:</h6>
            <a class="collapse-item" href="{{ route('pl.index') }}">
                <i class="fa fa-graduation-cap"></i>
                <span>PL</span>
            </a>
            <a class="collapse-item" href="{{ route('cpl.index') }}">
                <i class="fa fa-user-circle"></i>
                <span>CPL</span>
            </a>
            <a class="collapse-item" href="{{ route('bk.index') }}">
                <i class="fa fa-users"></i>
                <span>BK</span>
            </a>
        </div>
    </div>
</li>
@endcan

@can('mk.menu')
<!-- menu Mata Kuliah -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBkMk" aria-expanded="true" aria-controls="collapseBkMk">
        <i class="fa fa-book" aria-hidden="true"></i>
        <span>menu Mata Kuliah</span>
    </a>
    <div id="collapseBkMk" class="collapse" aria-labelledby="headingBkMk" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">daftar tabel master:</h6>
            @can('mk.read')
            <a class="collapse-item" href="{{ route('mk.index') }}">
                <i class="fa fa-book"></i>
                <span>mk</span>
            </a>
            @endcan
            @can('omk.view')
            <a class="collapse-item" href="{{ route('organisasi.mk') }}">
                <i class="fa fa-users"></i>
                <span>organisasi mk</span>
            </a>
            @endcan
            @can('pemenuhan.view')
            <a class="collapse-item" href="{{ route('pemenuhan_cpl.index') }}">
                <i class="fa fa-check-circle"></i>
                <span>pemenuhan mk</span>
            </a>
            @endcan
        </div>
    </div>
</li>
@endcan

@can('pemetaan.menu')
<!-- menu Pemetaan -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePemetaan" aria-expanded="true" aria-controls="collapsePemetaan">
        <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
        <span>menu Pemetaan</span>
    </a>
    <div id="collapsePemetaan" class="collapse" aria-labelledby="headingPemetaan" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Daftar Tabel Pemetaan:</h6>
            <a class="collapse-item" href="{{ route('cplpl.index') }}">
                <i class="fa fa-users"></i>
                <span>Pemetaan CPL-PL</span>
            </a>
            <a class="collapse-item" href="{{ route('BkMk.index') }}">
                <i class="fa fa-users"></i>
                <span>Pemetaan BK-MK</span>
            </a>
            <a class="collapse-item" href="{{ route('cplbk.index') }}">
                <i class="fa fa-users"></i>
                <span>Pemetaan CPL-BK</span>
            </a>
            <a class="collapse-item" href="{{ route('cplmk.index') }}">
                <i class="fa fa-users"></i>
                <span>Pemetaan CPL-MK</span>
            </a>
            <a class="collapse-item" href="{{ route('cplbkmk.index') }}">
                <i class="fa fa-users"></i>
                <span>Pemetaan CPL-MK-BK</span>
            </a>
        </div>
    </div>
</li>
@endcan

@can('cpmk.menu')
<!-- menu CPMK -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCPMK" aria-expanded="true" aria-controls="collapseCPMK">
        <i class="fa fa-clipboard-list" aria-hidden="true"></i>
        <span>menu CPMK</span>
    </a>
    <div id="collapseCPMK" class="collapse" aria-labelledby="headingCPMK" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">tabel CPMK:</h6>
            <a class="collapse-item" href="{{ route('cpmk.index') }}">
                <i class="fa fa-user-circle"></i>
                <span>CPMK</span>
            </a>
            <a class="collapse-item" href="{{ route('cpl_cpmk.index') }}">
                <i class="fa fa-user-circle"></i>
                <span>CPL CPMK</span>
            </a>
            <a class="collapse-item" href="{{ route('sub_cpmk.index') }}">
                <i class="fa fa-graduation-cap"></i>
                <span>Sub-CPMK</span>
            </a>
        </div>
    </div>
</li>

@endcan

@can('Rubrik.menu')
<!-- Menu Rubrik -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRubrik" aria-expanded="true" aria-controls="collapseRubrik">
        <i class="fa fa-cogs" aria-hidden="true"></i>
        <span>Menu Rubrik</span>
    </a>
    <div id="collapseRubrik" class="collapse" aria-labelledby="headingRubrik" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tabel Rubrik:</h6>

            <!-- Existing Rubrik Skala Persepsi -->
            <a class="collapse-item" href="{{ route('rubrik_presepsi.index') }}">
                <i class="fa fa-user-circle"></i>
                <span>Rubrik Skala Persepsi</span>
            </a>

            <!-- Rubrik Analitik -->
            <a class="collapse-item" href="{{ route('rubrik_analitik.index') }}">
                <i class="fa fa-chart-line"></i>
                <span>Rubrik Analitik</span>
            </a>

            <!-- New Rubrik Holistik -->
            <a class="collapse-item" href="{{ route('rubrik_holistik.index') }}">
                <i class="fa fa-project-diagram"></i>
                <span>Rubrik Holistik</span>
            </a>
        </div>
    </div>
</li>
@endcan
@can('penilaian.menu')
<!-- Penilaian -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePenilaian" aria-expanded="true" aria-controls="collapsePenilaian">
        <i class="fa fa-poll" aria-hidden="true"></i>
        <span>Penilaian</span>
    </a>
    <div id="collapsePenilaian" class="collapse" aria-labelledby="headingPenilaian" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tabel Penilaian:</h6>

            <a class="collapse-item" href="{{ route('bobot_penilaian.index') }}">
                <i class="fa fa-balance-scale"></i>
                <span>Bobot Penilaian</span>
            </a>
            <a class="collapse-item" href="{{ route('penilaian.index') }}">
                <i class="fa fa-tasks"></i>
                <span>Penilaian</span>
            </a>

            {{-- @can('rps.index')
                <a class="collapse-item" href="{{ route('rps.index') }}">
                    <i class="fa fa-book"></i>
                    <span>RPS</span>
                </a>
            @endcan --}}

        </div>
    </div>
</li>

@endcan
@can('rps.index')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('rps.index') }}">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>RPS</span>
        </a>
    </li>
@endcan



            <ul class="navbar-nav me-auto">


            </ul>


            <!-- Nav Item - cpl_cpmk -->




            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Heading -->
             @can('admin.panel')
            <div class="sidebar-heading">Admin panel</div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dosen.index') }}">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span>Dosen</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span> menu User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/role">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Role</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/permission">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <span>Permission</span>
                </a>
            </li>
            @endcan


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Label with logo -->
                    <div class="d-flex align-items-center">

                        <h1 class="h4 mb-0 text-gray-800 ml-2"> Sistem Informasi Kurikulum Berbasis OBE
                        </h1>
                    </div>

                    {!! display_bootstrap_alerts() !!}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a href="/" class="dropdown-item"><i class="fa fa-menu"></i>Menu</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>

                                @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>


    {{-- <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js">
        $(document).ready(function(){
            $('#dataTable').DataTable({});
        });

    </script> --}}


    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@10.0.0/dist/dts/export/"></script> --}}
    <script src="{{ asset('js/datatable.js') }}"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>

    @stack('js')
</body>

</html>
