<?php
require_once('dbconnect.php');
$stmt = $conn->prepare("Select * from departement where id=:i");

$stmt->execute(
  ['i' => $_GET['id']]
);

$dep = $stmt->fetch();
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
      <form action="saveDepartement.php?id=<?php echo $_GET['id'] ?>" method="post">
        <div class="input-group">
          <label for="name">name</label>
          <input type="text" name="name" id="name" class="name" value="<?php echo $dep['name'] ?>">
        </div>

        <div class="input-group">
          <button name="updateDepartement">update</button>
        </div>

      </form>
    </div>
  </main>
</body>

</html>