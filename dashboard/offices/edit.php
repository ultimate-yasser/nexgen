<?php
include "../includes/connect_database.php";
if (!isset($_GET["officeCode"])){
    echo "<h1>Wrong Page</h1>";
    exit;
}
$officeCode = $_GET["officeCode"];

$query = "SELECT 
    o.officeCode, 
    o.city, 
    o.addressLine1 AS address1, 
    o.addressLine2 AS address2, 
    o.country, 
    o.state, 
    o.postalCode, 
    COUNT(e.employeeNumber) AS employeeCount
FROM 
    offices AS o
LEFT JOIN 
    employees AS e 
ON 
    o.officeCode = e.officeCode
where o.officeCode = $officeCode;
";
$result = $connect->query($query);
$data = $result->fetch(PDO::FETCH_ASSOC);
if (!$data) {
    echo "<h1>Wrong Page</h1>";
    die();
}
$documnet_title = "Office | {$data['officeCode']}";
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
                    <h4 class="page-title">Office | <?= $data['officeCode'] ?></h4>
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
                                        <td>Office Code</td>
                                        <td><?= $data["officeCode"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?= $data["city"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Primarly Address</td>
                                        <td><?= $data["address1"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Secondary Address</td>
                                        <td><?= $data["address2"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td><?= $data["country"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td><?= $data["state"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Postal Code</td>
                                        <td><?= $data["postalCode"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Number of Employees</td>
                                        <td><?= $data["employeeCount"] ?></td>
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