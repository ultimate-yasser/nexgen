<?php

include "../includes/session.php";
include "../includes/connect_database.php";
include '../includes/validation.php';
$result = $connect->query("SELECT * FROM employees");
$data = $result->fetchAll(PDO::FETCH_ASSOC);

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
                        <h4 class="page-title">Insert Employee</h4>
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
                                            class="col-sm-3 text-end control-label col-form-label">Code</label>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="ssn"
                                                placeholder="SSN Here"
                                                name="code" />
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
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="lname"
                                                placeholder="First Name Here"
                                                name="lname" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="fname"
                                                placeholder="First Name Here"
                                                name="email" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">age</label>
                                        <div class="col-sm-9">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="fname"
                                                placeholder="First Name Here"
                                                name="age" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="image"
                                            class="col-sm-3 text-end control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input
                                                type="file"
                                                class="form-control"
                                                id="image"
                                                placeholder="First Name Here"
                                                name="image" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Department</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="dno">
                                                <?php foreach ($dept_data as $dept) { ?>
                                                    <option value="<?php echo $dept['dept_num'] ?>"><?php echo $dept['name'] ?></option>
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