<?php
require_once 'dbconnect.php';
session_start();

if (isset($_POST['saveinternship'])) {
    $sql = 'INSERT INTO internship VALUES(:d,:i,:ad,:s,:e)';

    $statement = $conn->prepare($sql);

    $statement->execute([
        ':d' => $_POST['departement'],
        ':i' => $_POST['intern'],
        ':ad' => $_SESSION['iduser'],
        ':s' => $_POST['startDate'],
        ':e' => $_POST['endDate']
    ]);
}


if (isset($_POST['updateinternship'])) {

    $sql = 'update internship set startDate=:s, endDate=:e where iddep=:d  and idintern=:i';

    $statement = $conn->prepare($sql);
    $statement->execute([
        ':d' => $_GET['iddep'],
        ':i' => $_GET['idintern'],
        ':s' => $_POST['startDate'],
        ':e' => $_POST['endDate']
    ]);
}


header('Location: internships.php');