<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="new.css">
  <title>New intern </title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <form action="saveintern.php" method="post">
        <div class="input-group">
        <label for="intern_firstname">Firstname</label>
<input type="text" name="firstname" id="intern_firstname" class="name">

<label for="intern_lastname">Lastname</label>
<input type="text" name="lastname" id="intern_lastname" class="name">

<label for="intern_birthday">Birthday</label>
<input type="date" name="birthday" id="intern_birthday" class="name">


<div class="button-group">
          <button type="button" class="btn back-btn" onclick="window.location.href='intern.php'">Back</button>
          <button type="submit" class="btn save-btn" name="saveintern">Save</button>

        </div>

      </form>
    </div>
  </main>
</body>

</html>