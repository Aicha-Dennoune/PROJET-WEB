<?php
require_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome page</title>
</head>
<body>
    <main>
        <div class="input-group"> 
            <a href="PAGE WAFAE.PHP" class="button">Logout</a>
        </div>
        <div class="container">
            <h1 class="welcome-text">Welcome <?php echo $_SESSION['firstname'] ?></h1>
        </div>
        <section class="nav-items-container">
            <a href="departements.php" class="nav-item">
                <section>
                    <img src="images/departement.jpeg" alt="">
                    <h3>departements</h3>
                </section>
            </a>

            <a href="intern.php" class="nav-item">
                <section>
                    <img src="images/intern.jpeg" alt="">
                    <h3>interns</h3>
                </section>
            </a>

            <a href="internships.php" class="nav-item">
                <section>
                    <img src="images/internship.jpeg" alt="">
                    <h3>internships</h3>
                </section>
            </a>

            <a href="more.php" class="nav-item">
                <section>
                    <img src="images/more.png" alt="">
                    <h3>more</h3>
                </section>
            </a>            
        </section>
    </main>
</body>
</html>
