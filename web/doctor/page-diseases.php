<?php
session_start();

if (isset($_SESSION['roleId'])) {
    if ($_SESSION['roleId'] != '4002') {
        header("location: ../login.php");
    }
} else {
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

    <title>Symptoms Data</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index-doctor.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-Cat diagnose</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index-doctor.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <!-- <i class="fa-sharp fa-light fa-house-window"></i> -->
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Sistem Pakar
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Advance Tools</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">choose :</h6>
                        <a class="collapse-item" href="page-symptoms.php">Gejala</a>
                        <a class="collapse-item" href="page-diseases.php">Penyakit</a>
                        <a class="collapse-item" href="page-rules.php">Rules</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="page-diagnoses.php">
                    <i class="fas fa-fw fa-light fa-users"></i>
                    <i class="fa-light fa-clock-rotate-left"></i>


                    <span>Riwayat Diagnosa</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['name'] ?></span>
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
                    <h1 class="h3 mb-2 text-gray-800">Data tables Diseases</h1>
                    <p class="mb-4">Pada halaman ini memuat tabel data manajemen informasi mengenai penyakit pada kucing.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Diseases</h6>
                            <div>
                                <button type="button" class="btn btn-success btn-sm inline" data-toggle="modal" data-target="#myModal">Tambah Penyakit</button>
                            </div>
                        </div>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header ms-auto ms-md-0 me-3 me-lg-4">
                                        <h4 class="modal-title">Tambah Penyakit</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <form method="POST" action="../function.php" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="text" name="diseasesCode" placeholder="kode Penyakit" class="form-control" required>
                                            <br>
                                            <input type="text" name="diseasesName" placeholder="Nama Penyakit" class="form-control" required>
                                            <br>
                                            <input type="text" name="diseasesLatin" placeholder="Nama Latin" class="form-control mb-3" required>
                                            <label class="form-label ml-2" for="uploadPict">Gambar</label>
                                            <div class="form-group">
                                                <input type="file" name="picture" class="form-control-file" id="uploadPict" />
                                            </div>
                                            <textarea class="form-control" id="" name="Desc" placeholder="Deskripsi" required></textarea>
                                            <br>
                                            <textarea class="form-control" id="" name="Precation" placeholder="Pencegahan" required></textarea>
                                            <br>
                                            <textarea class="form-control" id="" name="Solution" placeholder="Solusi" required></textarea>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" name="addNewDisease" class="btn btn-primary">Submit</button>
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
                                            <th>Kode Penyakit</th>
                                            <th>Nama Penyakit</th>
                                            <th>Nama Latin</th>
                                            <th>Gambar</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            $takeAllDiseasesData = mysqli_query($link, "SELECT * FROM diseases");
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($takeAllDiseasesData)) {
                                                $diseaseId = $data['idDisease'];
                                                $codeDisease = $data['codeOfDisease'];
                                                $nameDisease = $data['nameOfDisease'];
                                                $latinDisease = $data['latinNameOfDisease'];
                                                $pictureDisease = $data['picture'];
                                                $descDisease = $data['description'];
                                                $precautionDisease = $data['precaution'];
                                                $solutionDisease = $data['solution'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $i++ ?></td>
                                                <td><?= $codeDisease ?></td>
                                                <td><?= $nameDisease ?></td>
                                                <td><?= $latinDisease ?></td>
                                                <?php
                                                    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
                                                    $host = $_SERVER['HTTP_HOST'] . '/' . 'cat-care/' . 'cat-care-img/';
                                                    $rootUrl = $protocol . $host;
                                                ?>
                                                <td><img src="<?= $rootUrl . $pictureDisease ?>" alt="Picture <?= $nameDisease ?> " width="250"></td>
                                                <td class="text-center">
                                                    <div>
                                                        <form action="" method="POST">
                                                            <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#edit<?= $diseaseId; ?>">
                                                                Edit
                                                            </button>
                                                            <span class="mx-1"></span>
                                                            <input type="hidden" name="itemToDeleted" value="<?= $diseaseId; ?>">
                                                            <button type="button" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#delete<?= $diseaseId; ?>">
                                                                Delete
                                                            </button>
                                                            <span class="mx-1"></span>
                                                            <button type="button" class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#detail<?= $diseaseId; ?>">
                                                                Detail
                                                            </button>
                                                        </form>
                                                    </div>
                                                    
                                        <!-- The Edit Modal -->
                                        <div class="modal fade" id="edit<?= $diseaseId; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header ms-auto ms-md-0 me-3 me-lg-4">
                                                        <h4 class="modal-title">Edit Diseases</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="POST" action="../function.php" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <div class="from-group">
                                                                <label for="diseasesCode" class="col-form-label">Kode Penyakit</label>
                                                                <input type="text" id="diseasesCode" name="diseasesCode" value="<?= $codeDisease; ?>" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="diseasesName" class="col-form-label">Nama Penyakit</label>
                                                                <input type="text" id="diseasesName" name="diseasesName" value="<?= $nameDisease; ?>" class="form-control" required>
                                                            </div>
                                                            <div class="from-group">
                                                                <label for="diseasesLatin" class="">Nama Latin</label>
                                                                <input type="text" id="diseasesLatin" name="diseasesLatin" value="<?= $latinDisease; ?>" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="picture" class="col-form-label">Gambar</label>
                                                                <input type="file" name="picture" id="picture" class="form-control-file" id="uploadPict" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="diseasesDesc" class="">Deskripsi Penyakit</label>
                                                                <textarea class="form-control" name="diseasesDesc" id="diseasesDesc" required><?= $descDisease; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="diseasesPre" class="">Pencegahan Penyakit</label>
                                                                <textarea class="form-control" name="diseasesPre" id="diseasesPre" required><?= $precautionDisease; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="diseasesSol" class="">Solusi Penyakit</label>
                                                                <textarea class="form-control" name="diseasesSol" id="diseasesSol" required><?= $solutionDisease; ?></textarea>
                                                            </div>
                                                            <input type="hidden" name="diseasesId" value="<?= $diseaseId; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" name="updateDisease" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- The Delete Modal -->
                                        <div class="modal fade" id="delete<?= $diseaseId; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header ms-auto ms-md-0 me-3 me-lg-4">
                                                        <h4 class="modal-title">Hapus data Penyakit</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="POST" action="../function.php">
                                                        <div class="modal-body">
                                                            Apakah anda yakin menghapus <b><?= $nameDisease; ?></b> ?
                                                            <br>
                                                            <input type="hidden" name="idDiseases" value="<?= $diseaseId; ?>">
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" name="deleteDisease" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- The detail Modal -->
                                        <div class="modal fade" id="detail<?= $diseaseId; ?>">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header ms-auto ms-md-0 me-3 me-lg-4">
                                                        <h4 class="modal-title">Detail Penyakit</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Deskripsi</th>
                                                                        <th>Pencegahan</th>
                                                                        <th>Solusi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?= $descDisease ?></td>
                                                                        <td><?= $precautionDisease ?></td>
                                                                        <td><?= $solutionDisease ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                </td>
                                            </tr>
                                    <?php
                                         };
                                    ?>
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

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>