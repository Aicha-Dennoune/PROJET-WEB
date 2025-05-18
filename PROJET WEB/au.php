
<?php
require_once('dbconnect.php');

if ($_POST['rememberMe'] == "1") {
    setcookie('username', $_POST['username'], time() + 30);
    setcookie('password', $_POST['password'], time() + 30);
}

if (isset($_POST['username']) &&  isset($_POST['password'])) {

    $stmt = $conn->prepare("Select * from admin where username=:u");

    $stmt->execute(
        ['u' => $_POST['username']]
    );

    $user = $stmt->fetch();


    if ($user['username'] != "") {
        if ($user['password'] != $_POST['password']) {
            header('location:login.php?err=2');
        } else {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['iduser'] = $user['id_admin'];
            header('location:home.php');
        }
    } else {
        header('location:login.php?err=1');
    }



    $conn = null;
}
?>