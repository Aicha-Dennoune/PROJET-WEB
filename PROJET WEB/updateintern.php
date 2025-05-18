<?php
require_once('dbconnect.php');
$stmt = $conn->prepare("Select * from intern where id_intern=:i");

$stmt->execute(
  ['i' => $_GET['id_intern']]
);

$inter = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="update.css">
  <title>New intern</title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <form action="saveintern.php?id_intern=<?php echo $_GET['id_intern'] ?>" method="post">
        <div class="input-group">
        <label for="intern_firstname">Firstname</label>
        <input type="text" name="firstname" id="intern_firstname" class="name" value="<?php echo $inter['firstname'] ?>">

        <label for="intern_lastname">Lastname</label>
<input type="text" name="lastname" id="intern_lastname" class="name" value="<?php echo $inter['lastname'] ?>" >

<label for="intern_birthday">Birthday</label>
<input type="date" name="birthday" id="intern_birthday" class="name" value="<?php echo $inter['birthday'] ?>" >

        </div>

        <div class="input-group">
          <button name="updateintern">update</button>
          <button type="button" class="btn back-btn" onclick="window.location.href='intern.php'">Back</button>

        </div>


        
      </form>
    </div>
  </main>
</body>

</html>