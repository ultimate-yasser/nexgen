<?php
include "../includes/connect_database.php";
if (!isset($_GET["ssn"])){
    echo "<h1>Wrong Page</h1>";
    exit;
}
$ssn = $_GET["ssn"];

$query = "select e.employeeNumber as ssn, concat(e.firstName, ' ', e.lastName) as name 
, offices.city, e.jobTitle, e.isAdmin, e.email as email, e.officecode as officeCode,
offices.phone as officePhone, offices.addressLine1 as officeAdress
from employees as e left join offices on 
e.officeCode = offices.officeCode
where e.employeeNumber= $ssn";
$result = $connect->query($query);
$data = $result->fetch(PDO::FETCH_ASSOC);
if (!$data) {
    echo "<h1>Wrong Page</h1>";
    die();
}
$documnet_title = "Show | {$data['name']}";
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
                    <h4 class="page-title">Employee | <?= $data['name'] ?></h4>
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
                                    <tr>
                                        <td>SSN</td>
                                        <td><?= $data["ssn"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><?= $data["name"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td><?= $data["jobTitle"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?= $data["email"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Office Code</td>
                                        <td><?= $data["officeCode"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Office City</td>
                                        <td><?= $data["city"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Office Address</td>
                                        <td><?= $data["officeAdress"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Office Phone</td>
                                        <td><?= $data["officePhone"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><?= $data["name"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Admin Statue</td>
                                        <td>
                                            <?php if ($data['isAdmin']){?>
                                                <span>Admin</span>
                                                <a href="remove_admin.php?ssn=<?= $data['ssn'] ?>">Remove Admin Access</a>
                                            <?php }else{ ?>
                                                <span>Not Admin</span>
                                                <a href="make_admin.php?ssn=<?= $data['ssn'] ?>">Give Admin Access</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    </tbody>
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