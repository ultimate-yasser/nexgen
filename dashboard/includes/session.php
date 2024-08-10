<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Not logged in, redirect to login page
    header('Location: ../../login.php');
    exit();
}

// If the user is logged in, the rest of the page will be displayed

