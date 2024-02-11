<?php
include ("server.php");
if(isset($_POST['submit']))
{
       $username = $_POST['user'];
       $password = $_POST['pass'];

       
       $sql = "select * from signup where username ='$username' and password ='$password'";
       $result = mysqli_query($conn,$sql);
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
       $count = mysqli_num_rows($result);
       if($count==1)
       {
              header("location:index.php");
       }
       else
       {
              echo 
              '<script>
              window.location.href = "login.php";
              alert("Login failed. Invalid username or Password!!!");
              </script>';
              

       }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Login</title>
       <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
 include('navbar.php');
 ?> 
       <section>
     <div class="login-box">
       <form action="login.php" method="POST">
              <h2>Login</h2>
              <div class="input-box">
                     <span class="icon"><ion-icon name="mail"></ion-icon>
              </span>
              <input type="text" id="user" name="user" required>
                     <label >Username</label>
              </div>
              <div class="input-box">
                     <span class="icon"><ion-icon name="lock-closed"></ion-icon>
              </span>
              <input type="password" id="pass" name="pass" required>
                     <label >password</label>
              </div>
              <div class="remember-forgot">
                     <label><input type="checkbox"> Remember me</label>
                     <a href="#">Forgot password?</a>
              </div>
              <button type="submit" id="submit" name="submit">Login</button>
              <div class="regiter-link">
                    <p>Don't have an account? <a href="signup.php">Register</a><p/>
              </div>
       </form>
     </div>
     </section>
     
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>


