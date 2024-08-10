<?php
include "../includes/connect_database.php";
$query = 'select e.employeeNumber as ssn, concat(e.firstName, " ", e.lastName) as name 
, offices.city, e.jobTitle, e.isAdmin
from employees as e left join offices on 
e.officeCode = offices.officeCode;';
$result = $connect->query($query);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
$documnet_title = "Employees"
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
                    <h4 class="page-title">Employees</h4>
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
                                        <?php foreach ($rows as $row) { ?>
                                            <tr>
                                                <td><?= $row['ssn'] ?></td>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['city'] ?></td>
                                                <td><?= $row['jobTitle'] ?></td>
                                                <td><?php
                                                    if ($row['isAdmin']) {
                                                        echo 'Yes';
                                                    } else {
                                                        echo 'No';
                                                    }
                                                    ?></td>
                                                <td>
                                                    <a href="edit.php?ssn=<?= $row['ssn'] ?>"><img width="20px" src="../../assets/images/edit.png" alt="edit"></a>
                                                    <a href="delete.php?ssn=<?= $row['ssn'] ?>"><img width="20px" src="../../assets/images/delete.png" alt="delete"></a>
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