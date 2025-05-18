<?php
require_once 'dbconnect.php';

$sql = 'Delete From internship where iddep=:idd and idintern=:idi';
$statement = $conn->prepare($sql);

$statement->execute([
	':idd' => $_GET['iddep'],
	':idi' => $_GET['idintern']
]);


header('Location: internships.php');