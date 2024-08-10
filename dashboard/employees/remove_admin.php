<?php
if (!isset($_GET["ssn"])){
    echo "<h1>Wrong Page</h1>";
    exit;
}else{$ssn= $_GET["ssn"];}
include"../includes/connect_database.php";
$query = "
UPDATE employees
SET isAdmin =false
where employees.employeeNumber = $ssn
";
$result = $connect->query($query);
header("location: edit.php?ssn=$ssn");