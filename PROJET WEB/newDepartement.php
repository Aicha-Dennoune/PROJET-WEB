<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="new.css">
  <title>New Departement </title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <form action="saveDepartement.php" method="post">
        <div class="input-group">
          <label for="name">name</label>
          <input type="text" name="name" id="name" class="name">
        </div>

        <div class="button-group">
          <button type="button" class="btn back-btn" onclick="window.location.href='departements.php'">Back</button>
          <button type="submit" class="btn save-btn" name="saveDepartement">Save</button>

        </div>

      </form>
    </div>
  </main>
</body>

</html>