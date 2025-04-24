<?php
session_start();

include("db-connection.php");
include("functions.php");
$wrong_credentials = false; // used to display the message in the form instead outside of it

if(isset($_SESSION['user_id'])) // Logs a user out of the session 
{
	unset($_SESSION['user_id']);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']); //this will be the email
    $password = trim($_POST['password']);
    
    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM users_tab WHERE email = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            if (password_verify($password, $user_data['password'])) { // Secure password verification
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: MainPage.php");
                die;    
            }
        }    
        $wrong_credentials = true;
    } else {
        echo "Please enter a valid email and password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/signup.css">

     <!-- 
        - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">

    <title>Sign Up</title>
</head>
<body>

<header class="header" data-header>
    <div class="container">

      <a href="index.php" class="logo">
        Think Bigger<span class="span">.</span>
      </a>

      <nav class="navbar" data-navbar>

        <button class="nav-toggle-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="#about" class="navbar-link" data-nav-link>About Us</a>
          </li>

          <li class="navbar-item">
            <a href="#course" class="navbar-link" data-nav-link>All Course</a>
          </li>

          <li class="navbar-item">
            <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Contact</a>
          </li>

        </ul>

      </nav>

      <a href="signup.php" class="btn btn-primary">Sign Up</a>

      <button class="nav-toggle-btn" aria-label="open manu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>



    <div class="signup-container">
        <form method="post">
          <h2>Login</h2>
          <div class="input-field">

            <label>Enter your email</label>
            <input type="text" name="username" required>
          
          </div>
        
        <div class="input-field">

          <label>Enter your password</label>
          <input type="password" name="password" required>
          
        </div>

        <?php
          if ($wrong_credentials) {
            echo"<p style=color:#fff;>Wrong Email or Password!</p>";
          }
        ?>
        
        <div class="login">

          <button type="submit" class="login-btn">Log In</button>

        </div>
        
        <div class="register">
          <p>Don't have an account? <a id="register" href="signup.php">Register</a></p>
        </div>
        <div class="forget">
          <a href="forgotpassword.php">Forgot password?</a> 
        </div>
        </form>
    </div>
 
</body>
</html>