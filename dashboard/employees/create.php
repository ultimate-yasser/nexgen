<?php

include "../includes/session.php";
include "../includes/connect_database.php";
include '../includes/validation.php';
$documnet_title = "Add Employee";

$offices_result = $connect->query("SELECT * FROM offices");
$offices_data = $offices_result->fetchAll(PDO::FETCH_ASSOC);

$title_result = $connect->query("select * from employees group by employees.jobTitle");
$title_data = $title_result->fetchAll(PDO::FETCH_ASSOC);

$employees_result = $connect->query("select employees.employeeNumber, concat(employees.firstName, ' ', employees.lastName) as name from employees");
$employees_data = $employees_result->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $ssn = $_POST['ssn'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $office = $_POST['office'];
    $title = $_POST['title'];
    if (checkDuplicate("employeeNumber", "employees", $ssn)){
        $errors['ssn'] = "Duplicate SSN, Try another Number";
    }
    if (checkDuplicate("email", "employees", $email)){
        $errors['email'] = "Duplicate Email, Try another Email";
    }
    if (empty($errors)){
        $insert_result=$connect->query("INSERT INTO `employees` (`employeeNumber`, `lastName`, `firstName`, `email`, `officeCode`, `jobTitle`) VALUES ('$ssn', '$lname', '$fname', '$email', '$office', '$title');");
        if (!$insert_result){
            $errors['insert'] = 'Error inserting data into Database';
        }
    }
}

?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include "../includes/head.php" ?>

<body>

<?php include "../includes/header.php"; ?>
<?php include "../includes/aside.php"; ?>

        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Employee</h4>
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
                    <div class="col-md-12">
                        <div class="card">
                            <?php if (isset($insert_result) && $insert_result) { ?>
                                <div class="alert alert-success">Added Successfully..</div>
                            <?php } else if (isset($errors)) { ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php foreach ($errors as $error) { ?>
                                            <li><?php echo $error ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <form class="form-horizontal" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label
                                            for="ssn"
                                            class="col-sm-3 text-end control-label col-form-label">SSN</label>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="ssn"
                                                placeholder="SSN Here"
                                                name="ssn" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="fname"
                                                placeholder="First Name Here"
                                                name="fname" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="lname"
                                            class="col-sm-3 text-end control-label col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="lname"
                                                placeholder="Last Name Here"
                                                name="lname" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="email"
                                            class="col-sm-3 text-end control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                placeholder="email"
                                                name="email" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="office"
                                            class="col-sm-3 text-end control-label col-form-label">Office</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="office">
                                                <?php foreach ($offices_data as $office) { ?>
                                                    <option value="<?= $office['officeCode'] ?>"><?= $office['city'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="title"
                                            class="col-sm-3 text-end control-label col-form-label">Job Title</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="title">
                                                <?php foreach ($title_data as $title) { ?>
                                                    <option value="<?= $title['jobTitle'] ?>"><?= $title['jobTitle'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </form>
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
    <?php include "../includes/scripts.php" ?>
</body>

</html>