<?php 
include_once "../models/userSession.php";

$userSession = new UserSession();
$userSession->closeSession();

header("location: ../../frontend/index.php");
?>