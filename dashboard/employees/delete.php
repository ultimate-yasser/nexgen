<?php
include("../includes/session.php");
if (!isset($_GET["ssn"])){
    echo "<h1>Wrong Page</h1>";
    exit;
}else{$ssn= $_GET["ssn"];}
include"../includes/connect_database.php";
$query = "
update employees
set employees.reportsTo = NULL
where employees.reportsTo = $ssn;

Delete from employees where employeeNumber = $ssn;
";
$result = $connect->query($query);
header("location: index.php");