<?php 
session_start();

if (!isset($_SESSION["loging"])) {
	header("Location:index.php");
	exit;
}


include_once "connect/config.php";

$id=$_GET['id'];

$result=mysqli_query($mysqli, "DELETE FROM inventory_barang WHERE id=$id");

header("Location:dashboard-read-listing.php");





?>