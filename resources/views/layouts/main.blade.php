<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Aplikasi Kas Kematian Cireungit</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/startbootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/startbootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- DataTable -->
    <link href="/assets/startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/assets/startbootstrap/vendor/datatables/buttons.bootstrap4.min.css" rel="stylesheet">

    <!-- jQueryUI -->
    <link href="/assets/jqueryUI/jquery-ui.min.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="/assets/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/assets/sweetalert2/sweetalert2.min.css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KAS KEMATIAN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Transaksi -->
            <li class="nav-item {{ Request::is('transaction') ? 'active' : '' }}">
                <a class="nav-link" href="/transaction">
                    <i class="fas fa-fw fa-desktop"></i>
                    <span>Transaksi</span></a>
            </li>

            <li class="nav-item {{ Request::is('stock') ? 'active' : '' }}">
                <a class="nav-link" href="/stock">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Stok</span></a>
            </li>

            <!-- Nav Item - User -->
            <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
                <a class="nav-link" href="/user">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <li class="nav-item {{ Request::is('transactionreportview') ? 'active' : '' }}">
                <a class="nav-link" href="/transactionreportview">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Laporan Transaksi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle" src="/assets/startbootstrap/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile/{{ auth()->user()->id }}/edit">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aplikasi Kas Kematian <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah ini jika anda ingin keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/startbootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/startbootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/assets/jqueryUI/jquery-ui.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/startbootstrap/js/sb-admin-2.min.js"></script>

    <!-- DataTables -->
    <script src="/assets/startbootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/startbootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/startbootstrap/vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="/assets/startbootstrap/vendor/datatables/buttons.bootstrap4.min.js"></script>
    <script src="/assets/startbootstrap/vendor/datatables/jszip.min.js"></script>
    <script src="/assets/startbootstrap/vendor/datatables/pdfmake.min.js"></script>
    <script src="/assets/startbootstrap/vendor/datatables/vfs_fonts.js"></script>
    <script src="/assets/startbootstrap/vendor/datatables/buttons.html5.min.js"></script>
    <script src="/assets/startbootstrap/vendor/datatables/buttons.print.min.js"></script>


    <!-- jQueryUI -->
    <script src="/assets/jqueryUI/jquery-ui.min.js"></script>

    <!-- jQueryValidation -->
    <script src="/assets/jqueryvalidation/jquery.validate.min.js"></script>
    <script src="/assets/jqueryvalidation/additional-methods.min.js"></script>

    @yield('script')

</body>

</html>