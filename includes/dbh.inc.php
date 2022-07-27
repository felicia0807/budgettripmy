<?php

$serverName ="localhost";
$dBUsername="root";
$dbPassword="";
$dbName="travel_db";

$conn =mysqli_connect($serverName,$dBUsername,$dbPassword,$dbName);

if(!$conn) {
    die("Connection failed".mysqli_connect_error());
}

$create_db_sql    = "CREATE DATABASE IF NOT EXISTS $dbName";
$create_table_sql = "CREATE TABLE IF NOT EXISTS bookings (
    loc_id int UNSIGNED PRIMARY KEY,
    date varchar(100) NOT NULL,
    qty int NOT NULL,
    amount decimal(10,2) NOT NULL
)";

mysqli_query($conn, $create_db_sql); // run query to create database
$conn = new mysqli($serverName,$dBUsername,$dbPassword,$dbName); // create new connection and connect to the ewly created database

if(!$conn){
    die(mysqli_error($conn));
}

mysqli_query($conn, $create_table_sql); // run query to create tale
?> 



