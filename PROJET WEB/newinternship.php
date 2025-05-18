<?php
require_once 'session.php';
require_once 'dbconnect.php';
$sql = 'Select * from departement';
$statement = $conn->query($sql);
$deps = $statement->fetchAll(PDO::FETCH_ASSOC);

$sql = 'Select * from intern';
$statement = $conn->query($sql);
$interns = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="new.css">
  <title>New internship </title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <form action="saveinternships.php" method="post">


        <div class="input-group">
          <label for="departement">Departement</label>
          <select name="departement" id="departement">
            <option value="">-choose a departement-</option>
            <?php
            foreach ($deps as $d) {
              echo '<option value="' . $d['id'] . '">' . $d['name'] . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="input-group">
          <label for="intern">Intern</label>
          <select name="intern" id="intern">
            <option value="">-choose an intern-</option>
            <?php
            foreach ($interns as $i) {
              echo '<option value="' . $i['id_intern'] . '">' . $i['firstname'] . ' ' . $i['lastname'] . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="input-group">
          <label for="startDate">Starts at</label>
          <input type="date" name="startDate" id="startDate" class="name">
        </div>

        <div class="input-group">
          <label for="endDate">Ends at</label>
          <input type="date" name="endDate" id="endDate" class="name">
        </div>

        <div class="button-group">
          <button type="button" class="btn back-btn" onclick="window.location.href='internships.php'">Back</button>
          <button type="submit" class="btn save-btn" name="saveinternship">Save</button>

        </div>

      </form>
    </div>
  </main>
</body>

</html>