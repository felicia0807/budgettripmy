<?php
//localhost
//$serverName ="localhost";
//$dBUsername="root";
//$dbPassword="";
//$dbName="travel_db";

//remote db
//$serverName ="remotemysql.com";
//$dBUsername="sG1fqUOwsd";
//$dbPassword="veRzq22HZT";
//$dbName="sG1fqUOwsd";

//heroku db
$serverName ="us-cdbr-east-06.cleardb.net";
$dBUsername="b8c38ee8cdeebe";
$dbPassword="84458ac0";
$dbName="heroku_295107ec2eabab3";

$conn =mysqli_connect($serverName,$dBUsername,$dbPassword,$dbName);

if(!$conn) {
    die("Connection failed".mysqli_connect_error());
}
    
?> 



