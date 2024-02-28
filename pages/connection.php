<?php
//Set up the database access credentials
$hostname = 'localhost'; //host name
$username = 'root'; //default Xampp username
$password = ''; //default Xampp password
$databaseName = 'TeamProject'; //the name of the db you are using on phpMyAdmin

try {
    $connection = mysqli_connect($hostname, $username, $password, $databaseName);
} catch (mysqli_sql_exception $e) {
    $connection = exit("unable to connect to database!");
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}