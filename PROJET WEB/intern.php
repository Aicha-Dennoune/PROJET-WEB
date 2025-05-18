<?php
require_once 'session.php';
require_once 'dbconnect.php';

$sql = 'SELECT i.*, i.firstname AS intern_firstname, i.lastname AS intern_lastname, i.birthday, ad.firstname AS admin_firstname, ad.lastname AS admin_lastname
        FROM intern AS i 
        INNER JOIN admin AS ad ON ad.id_admin = i.admin_id';

$statement = $conn->query($sql);
$inter = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="interns.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>List of interns</title>
</head>

<body>
    <div class="menu">
        <div class="menu-buttons">
            <a href="departements.php">Departments</a>
            <a href="intern.php">Interns</a>
            <a href="internships.php">Internships</a>
        </div>
        <div class="logged">
            <span><?php echo $_SESSION['firstname'] . ' ' .  $_SESSION['lastname']; ?></span>
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
                                <a href="newintern.php">New Intern</a>
                            </li>
                          </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="container">
        <h2> List Of Interns</h2>

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>birthday</th>
                        <th>admin</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($inter as $i) {
                        echo '<tr>';
                        echo '<td>' . $i['id_intern'] . '</td>';
                        echo '<td>' . $i['intern_firstname'] . '</td>';
                        echo '<td>' . $i['intern_lastname'] . '</td>';
                        echo '<td>' . $i['birthday'] . '</td>';
                        echo '<td>' . $i['admin_firstname'] . ' ' . $i['admin_lastname'] .  '</td>';
                        echo '<td>' . '<a href="deleteintern.php?id_intern=' . $i['id_intern'] . '"  onclick="return confirm(\'you sure you want to delete intern!\');"><i class="fa fa-trash" aria-hidden="true"></i></a>' . '</td>';     
                         echo '<td>' . '<a href="updateintern.php?id_intern=' . $i['id_intern'] . '"  ><i class="fa fa-pencil" aria-hidden="true"></i></a>' . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
