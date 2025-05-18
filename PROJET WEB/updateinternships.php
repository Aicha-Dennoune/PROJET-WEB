<?php
require_once 'session.php';
require_once 'dbconnect.php';

$sql = 'Select * from departement';
$statement = $conn->query($sql);
$deps = $statement->fetchAll(PDO::FETCH_ASSOC);

$sql = 'Select * from intern';
$statement = $conn->query($sql);
$interns = $statement->fetchAll(PDO::FETCH_ASSOC);


$stmt = $conn->prepare("Select * from internship where iddep=:d and idintern=:i");

$stmt->execute(
  [
    'd' => $_GET['iddep'],
    'i' => $_GET['idintern']
  ]
);

$internship = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="update.css">
  <title>New Departement </title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <form action="saveinternships.php?iddep=<?php echo $_GET['iddep'] ?>&idintern=<?php echo $_GET['idintern'] ?>" method="post">


        <div class="input-group">
          <label for="departement">Departement</label>
          <select name="departement" id="departement">
            <option value="">--Choose a departement--</option>
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
            <option value="">--Choose an intern--</option>
            <?php
            foreach ($interns as $i) {
              echo '<option value="' . $i['id_intern'] . '">' . $i['firstname'] . ' ' . $i['lastname'] . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="input-group">
          <label for="startsat ">Starts at</label>
          <input type="date" name="startDate" id="startDate" class="name" value="<?php echo $internship['startDate']; ?>">
        </div>

        <div class="input-group">
          <label for="endsat">Ends at</label>
          <input type="date" name="endDate" id="endDate" class="name" value="<?php echo $internship['endDate']; ?>">
        </div>

        <div class="input-group">
          <button name="updateinternship">save</button>
        </div>

      </form>
    </div>
  </main>
</body>

</html>