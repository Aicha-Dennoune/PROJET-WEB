<?php
require_once 'session.php';
require_once 'dbconnect.php';
$sql = 'Select i.id_intern `i.id_intern`,i.firstname `i.firstname`, i.lastname `i.lastname`, d.name `d.name`, d.id `d.id`, a.firstname  `a.firstname`, a.lastname `a.lastname`,startDate, endDate from internship it
inner join intern i on i.id_intern = it.idintern 
inner join departement d on it.iddep = d.id 
inner join admin a on a.id_admin = it.id_admi';

$statement = $conn->query($sql);
$interns = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="internship.css">
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
                                <a href="newinternship.php">New Internship</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </header>
        <div class="container">
            <h1>List of internships</h1>

            <table>
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Departement</th>
                        <th>Admin</th>
                        <th>Starts at</th>
                        <th>Ends at</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($interns as $i) {
                        echo '<tr>';
                        echo '<td>' . $i['i.firstname'] . '</td>';
                        echo '<td>' . $i['i.lastname'] .  '</td>';
                        echo '<td>' . $i['d.name'] .  '</td>';
                        echo '<td>' . $i['a.firstname'] . ' ' . $i['a.lastname'] . '</td>';
                        echo '<td>' . $i['startDate'] .  '</td>';
                        echo '<td>' . $i['endDate'] .  '</td>';
                        echo '<td>' . '<a href="deleteinternship.php?iddep=' . $i['d.id'] . '&idintern=' . $i['i.id_intern'] . '"  onclick="return confirm(\' you sure you want to delete this internship!\');"><i class="fa fa-trash" aria-hidden="true"></i></a>' . '</td>';
                        echo '<td>' . '<a href="updateinternships.php?iddep=' . $i['d.id'] . '&idintern=' . $i['i.id_intern'] . '"  ><i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>' . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>