<?php
if (!isset($_GET["ssn"])){
    echo "<h1>Wrong Page</h1>";
}else{$ssn= $_GET["ssn"];}
include"../includes/connect_database.php";
$query = "
UPDATE employees
SET isAdmin =true
where employees.employeeNumber = $ssn
";
$result = $connect->query($query);
header("location: edit.php?ssn=$ssn");