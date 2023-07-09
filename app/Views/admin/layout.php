<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>
    <!-- Custom fonts for this template-->
    <?= link_tag('public/assets/vendor/fontawesome-free/css/all.min.css') ?>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= link_tag('public/assets/css/sb-admin-2.min.css') ?>
    <?= link_tag('public/assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img class="img-account-profile rounded-circle"
                        src="<?= base_url('public/admin/') . session()->get('ss_image')?>" alt="syspic" width="40"
                        height="40" />
                </div>
                <div class="sidebar-brand-text mx-3"><?= session()->get('ss_name')?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($active == 'dashboard') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="/Admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if ($active == 'product') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Products</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Product Management:</h6>
                        <a class="collapse-item" href="/Admin/showProducts">View Products</a>
                        <a class="collapse-item" href="/Admin/createProduct">Add New Product</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?php if ($active == 'messages') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="/Admin/chat/">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Messages</span></a>
            </li>
            <li class="nav-item <?php if ($active == 'client') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="/Admin/showClient">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Client</span></a>
            </li>
            <li class="nav-item <?php if ($active == 'profile') {
                                    echo 'active';
                                } ?>">
                <a class="nav-link" href="/Admin/updateProfile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>
            <?php if(session()->get('admin_type') == 'super_admin'):?>
            <li class="nav-item <?php if ($active == 'settings') {
                                        echo 'active';
                                    } ?>">
                <a class="nav-link" href="/Admin/settings">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span></a>
            </li>
            <?php endif;?>
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

                    <!-- Topbar Search -->
                    <h1 class="h3 mb-4 text-gray-800 d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100"><?= $title ?></h1>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('admin_username') ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('public/admin/') . session()->get('admin_profile_pic') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/Admin/updateProfile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="/Admin/settings">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
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

                    <!-- Page Heading -->
                   
                    <?php if (session()->get('error')) : ?>
                    <div class="alert alert-danger" role="alert"><?= session()->get('error') ?></div>
                    <?php endif; ?>
                    <?php if (session()->get('success')) : ?>
                    <div class="alert alert-danger" role="alert"><?= session()->get('error') ?></div>
                    <?php endif; ?>
                    <?= $this->renderSection('content') ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?= session()->get('ss_name')?></span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="/Auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <?= script_tag('public/assets/vendor/jquery/jquery.min.js') ?>
    <?= script_tag('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>

    <!-- Core plugin JavaScript-->
    <?= script_tag('public/assets/vendor/jquery-easing/jquery.easing.min.js') ?>

    <!-- Custom scripts for all pages-->
    <?= script_tag('public/assets/js/sb-admin-2.min.js') ?>

    <?= script_tag('public/assets/vendor/datatables/jquery.dataTables.min.js') ?>
    <?= script_tag('public/assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>
    <?= script_tag('public/assets/js/demo/datatables-demo.js') ?>

    <script>
    $(function() {
        var ChatDiv = $('.chat_container');
        var height = ChatDiv[0].scrollHeight;
        ChatDiv.scrollTop(height);
    });
    </script>
</body>

</html>