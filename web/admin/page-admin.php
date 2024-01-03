<?php
session_start();


if(isset($_SESSION['roleId'])) {
    if($_SESSION['roleId'] != '4001') {
        header("location: ../login.php");
    }
}else{
    header("location: ../login.php");
}
require '../function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Toggle Password Visibility  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index-admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-Cat diagnose</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index-admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <!-- <i class="fa-sharp fa-light fa-house-window"></i> -->
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Website
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Advance User</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">choose :</h6>
                        <a class="collapse-item" href="../admin/page-admin.php">Admins</a>
                        <a class="collapse-item" href="../admin/page-doctor.php">Doctors</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Mobile
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../admin/page-users.php">
                    <i class="fas fa-fw fa-light fa-users"></i>
                    <span>Users</span></a>
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
                    <h2 class="ml-auto">
                        Aplikasi Sistem Pakar Diagnosa Penyakit Pada Kucing
                    </h2>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['name']?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                    <h1 class="h3 mb-2 text-gray-800">Tables Data Admin</h1>
                    <p class="mb-4">Pada halaman ini memuat data-data informasi mengenai data users Admin.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                            <div>
                                <button type="button" class="btn btn-success btn-sm inline" data-toggle="modal" data-target="#myModal">Tambah Admin</button>
                            </div>
                        </div>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header ms-auto ms-md-0 me-3 me-lg-4">
                                        <h4 class="modal-title">Tambah Admin</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <form method="POST" action="../function.php">
                                        <div class="modal-body">
                                            <input type="text" name="nameAdmin" placeholder="Nama Admin" class="form-control" required>
                                            <br>
                                            <input type="text" name="usernameAdmin" placeholder="Username" class="form-control" required>
                                            <br>
                                            <input type="text" name="email" placeholder="E-mail" class="form-control" required>
                                            <br>
                                            <div class="d-flex align-items-center">
                                                <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                                                <i onclick="setPasswordVisibility()" class="bi bi-eye-slash ml-2" id="togglePassword"></i>
                                            </div>

                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" name="addNewAdmin" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>username</th>
                                            <th>E-mail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>username</th>
                                            <th>E-mail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $takeAllAdminData = mysqli_query($link, "SELECT * FROM users WHERE roleId = '4001' ORDER BY userId DESC ");
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($takeAllAdminData)) {
                                                $userId = $data['userId'];
                                                $nameAdmin = $data['name'];
                                                $usernameAdmin = $data['username'];
                                                $email = $data['email'];
                                                $password = $data['password'];
                                            ?>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td><?= $nameAdmin ?></td>
                                                <td><?= $usernameAdmin ?></td>
                                                <td><?= $email ?></td>
                                                <td class="text-center">
                                                    <div>
                                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $userId; ?>">
                                                            Edit
                                                        </button>
                                                        <span class="mx-1"></span>
                                                        <input type="hidden" name="itemToDeleted" value="<?= $userId; ?>">
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $userId; ?>">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </td>
                                        </tr>
                                        <!-- The Edit Modal -->
                                        <div class="modal fade" id="edit<?= $userId; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header ms-auto ms-md-0 me-3 me-lg-4">
                                                        <h4 class="modal-title">Edit Admin</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="POST" action="../function.php">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nameAdmin" class="">Nama Admin</label>
                                                                <input type="text" id="nameAdmin" name="nameAdmin" value="<?= $nameAdmin; ?>" placeholder="Nama Admin" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="usernameAdmin" class="">Username Admin</label>
                                                                <input type="text" id="usernameAdmin" name="usernameAdmin" value="<?= $usernameAdmin; ?>" placeholder="usernameAdmin" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email" class="">E-mail</label>
                                                                <input type="text" id="email" name="email" value="<?= $email; ?>" placeholder="email" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password" class="">Password</label>
                                                                <div class="d-flex align-items-center">
                                                                    <input type="password" id="password<?= $i ?>" name="password" placeholder="Password" class="form-control" value="<?= $password; ?>" required>
                                                                    <i onclick="setPasswordVisibility(<?= $i ?>)" class="bi bi-eye-slash ml-2" id="togglePassword<?= $i ?>"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="userId" value="<?= $userId; ?>">
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" name="updateAdmin" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                            </div>

                            <!-- The Delete Modal -->
                            <div class="modal fade" id="delete<?= $userId; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header ms-auto ms-md-0 me-3 me-lg-4">
                                            <h4 class="modal-title">Hapus Admin</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form method="POST" action="../function.php">
                                            <div class="modal-body">
                                                Apakah anda yakin menghapus <?= $nameAdmin; ?> ?
                                                <br>
                                                <input type="hidden" name="userId" value="<?= $userId; ?>">
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" name="deleteAdmin" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php
                                            };
                        ?>
                        </tr>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Theo Fahrizal Syam 2023</span>
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
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/script.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>