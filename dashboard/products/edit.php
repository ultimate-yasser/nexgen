<?php
include "../includes/connect_database.php";
if (!isset($_GET["code"])){
    echo "<h1>Wrong Page</h1>";
    exit;
}
$code = $_GET["code"];

$query = "
select * from products where productCode = \"$code\"
";
$result = $connect->query($query);
$data = $result->fetch(PDO::FETCH_ASSOC);
if (!$data) {
    echo "<h1>Wrong Page</h1>";
    die();
}
$documnet_title = "Show | {$data['productName']}";
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
                    <h4 class="page-title">Product | <?= $data['productName'] ?></h4>
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
                                        <td>Product Code</td>
                                        <td><?= $data["productCode"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><?= $data["productName"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Line</td>
                                        <td><?= $data["productLine"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Scale</td>
                                        <td><?= $data["productScale"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Vendor</td>
                                        <td><?= $data["productVendor"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><?= $data["productDescription"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Quantity</td>
                                        <td><?= $data["quantityInStock"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td><?= $data["buyPrice"] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><?= (($data["buyPrice"] * $data["quantityInStock"])/1000)." K" ?></td>
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