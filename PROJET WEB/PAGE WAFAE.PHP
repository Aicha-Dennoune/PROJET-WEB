<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Management</title>
    <link rel="stylesheet" href="wafae.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <img id="background-image" src="images/WhatsApp Image 2024-05-18 à 22.10.01_a31dfe93.jpg" alt="Background Image">

    <div class="login-container">
        <div class="title-background">
            <h1 class="title">Intern</h1>
            <h1 class="title">Management</h1>
        </div>
    </div>

    <div class="login-button-container">
        <form action="login.php" method="post">
            <button type="submit" class="login-button" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>
    </div>

    <?php
    if(isset($_POST['login'])) {
        header("Location: login.php");
        exit;
    }
    ?>
</body>
</html>