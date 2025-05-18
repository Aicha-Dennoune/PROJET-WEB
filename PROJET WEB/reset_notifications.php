<?php
session_start();
include 'config/db.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Mettre à jour l'état des notifications pour les marquer comme lues
$stmt = $pdo->prepare("
    UPDATE avis 
    SET read_status = 1 
    WHERE event_id IN (SELECT id FROM events WHERE created_by = ?)
");
$stmt->execute([$_SESSION['id']]);

echo 'success';
?>
