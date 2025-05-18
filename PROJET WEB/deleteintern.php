<?php
require_once 'dbconnect.php';

$sql = 'Delete From intern where id_intern=:b';

$statement = $conn->prepare($sql);

$statement->execute([
	':b' => $_GET['id_intern'],
]);


header('Location: intern.php');

?>