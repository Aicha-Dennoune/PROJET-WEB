<?php
require_once 'dbconnect.php';
session_start();

if (isset($_POST['saveintern'])) {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $admin_id = $_SESSION['iduser']; 

    
    $sql = 'INSERT INTO intern (firstname, lastname, birthday, admin_id) VALUES (:firstname, :lastname, :birthday, :admin_id)';
    $statement = $conn->prepare($sql);
    
   
    $statement->execute([
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':birthday' => $birthday,
        ':admin_id' => $admin_id
    ]); 
}

if(isset($_POST['updateintern']) && isset($_GET['id_intern'])) {
    $id_intern = $_GET['id_intern'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];

    $sql = "UPDATE intern SET firstname = :firstname, lastname = :lastname, birthday = :birthday WHERE id_intern = :id_intern";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute([
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':birthday' => $birthday,
        ':id_intern' => $id_intern
    ]);
}
header('Location: intern.php'); 

?>