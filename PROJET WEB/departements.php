<?php
require_once 'session.php';
require_once 'dbconnect.php';
$sql = 'Select d.*, firstname, lastname from departement as d inner join admin as a on a.id_admin = d.idadmin';
$statement = $conn->query($sql);
$deps = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="departements.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>List of departments</title>
</head>

<body>
    <div class="menu">
        <div class="menu-buttons">
            <a href="departements.php">Departments</a>
            <a href="intern.php">Interns</a>
            <a href="internships.php">Internships</a>
        </div>
        <div class="login-button">
        <span class="admin-name"><?php echo $_SESSION['firstname'] . ' ' .  $_SESSION['lastname']; ?></span>
            <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>

    <main>
        <header>
            <div class="container">
             
                <div class="header-content">
                    <nav>
                        <ul>
                            <li>
                                <a href="home.php">Home</a>
                            </li>
                            <li>
                                <a href="newDepartement.php">New Departement</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </header>
        <div class="container">
        <h2> List Of Departements</h2>

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Admin</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($deps as $d) {
                        echo '<tr>';
                        echo '<td>' . $d['id'] . '</td>';
                        echo '<td>' . $d['name'] . '</td>';
                        echo '<td>' . $d['firstname'] . ' ' . $d['lastname'] .  '</td>';
                        echo '<td>' . '<a href="deleteDepartement.php?id=' . $d['id'] . '"  onclick="return confirm(\'you sure you want to delete intern!\');"><i class="fa fa-trash" aria-hidden="true"></i></a>' . '</td>';     
                        echo '<td><a href="updateDepartement.php?id=' . $d['id'] . '"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
