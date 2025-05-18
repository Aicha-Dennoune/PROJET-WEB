<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Login</title>
</head>

<body>
  <main class="login-main">
    <div class="form-container">
      <ion-icon name="person-circle-outline" class="icon-center"></ion-icon>
      <form action="au.php" method="post">
        <div class="input-group">
          <label for="username">username</label>
          <div class="input-wrapper">
            <input type="text" placeholder="enter your username" name="username" id="username" class="username" value="<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>">
            <ion-icon name="person-outline"></ion-icon>          </div>
        </div>
        
        <div class="input-group">
          <label for="password">Password</label>
          <div class="input-wrapper">
            <input type="password" placeholder="enter your password" name="password" id="password" class="password" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
            <ion-icon name="lock-closed-outline"></ion-icon>
          </div>
        </div>

        <div class="erreur">
          <?php
          if (isset($_GET['err'])) {
            if ($_GET['err'] == 1) {
              echo "Veuillez saisir un login correct.";
            } else {
              echo "Le mot de passe ne correspond pas au login saisi.";
            }
          }
          ?>
        </div>
        
        <div class="input-group">
          <label for="rememberMe">Remember Me</label>
          <input type="checkbox" name="rememberMe" id="rememberMe" value="1" checked>
        </div>
        
        <div class="input-group">
          <button>Login</button>
        </div>
        
        <div class="input-group">
          <a href=""><button>Sign Up</button></a>
        </div>
      </form>
    </div>
  </main>
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
