<?php
include "../includes/connect_database.php";
$query = '
select o.officeCode, o.country, o.city, o.phone
from offices as o;';
$result = $connect->query($query);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
$documnet_title = "Offices"
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include "../includes/head.php"; ?>

<body>

    <?php include "../includes/header.php"; ?>
    <?php include "../includes/aside.php"; ?>



    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Offices</h4>
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
                                            <th>Office Code</th>
                                            <th>Office Country</th>
                                            <th>Office City</th>
                                            <th>Office Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows as $row) { ?>
                                            <tr>
                                                <td><?= $row['officeCode'] ?></td>
                                                <td><?= $row['country'] ?></td>
                                                <td><?= $row['city'] ?></td>
                                                <td><?= $row['phone'] ?></td>
                                                <td>
                                                    <a href="edit.php?officeCode=<?= $row['officeCode'] ?>"><img width="20px" src="../../assets/images/edit.png" alt="edit"></a>
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
        <?php include '../includes/footer.php';?>
</body>

</html>