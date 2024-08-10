<?php
include "../includes/connect_database.php";
$query = 'select e.employeeNumber as ssn, concat(e.firstName, " ", e.lastName) as name 
, offices.city, e.jobTitle, e.isAdmin
from employees as e left join offices on 
e.officeCode = offices.officeCode;';
$result = $connect->query($query);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
$documnet_title="Employees"
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include"../includes/head.php";?>

<body>

    <?php include "../includes/header.php";?>

        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Home</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Employees </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> All Employees </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add Employee </span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Employees</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="#">Add New</a>
                                    </li>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb -->

            <!-- Container fluid -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Basic Datatable</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SSN</th>
                                                <th>Name</th>
                                                <th>Office</th>
                                                <th>Title</th>
                                                <th>Admin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rows as $row){ ?>
                                                <tr>
                                                    <td><?= $row['ssn'] ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['city'] ?></td>
                                                    <td><?= $row['jobTitle'] ?></td>
                                                    <td><?php 
                                                    if ($row['isAdmin']){
                                                        echo 'Yes';
                                                    }else{echo 'No';}
                                                    ?></td>
                                                    <td>
                                                        <a href="#"><img width="20px" src="../../assets/images/show.png" alt=""></a>
                                                        <a href="#"><img width="20px" src="../../assets/images/edit.png" alt=""></a>
                                                        <a href="#"><img width="20px" src="../../assets/images/delete.png" alt=""></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->

            </div>
            <!-- End Container fluid -->

            <!-- footer -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by
                <a href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- End footer -->

        </div>
        <!-- End Page wrapper -->
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/js/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../assets/js/custom.min.js"></script>

    <!-- this page js -->
    <script src="../../assets/js/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
    </script>
</body>

</html>