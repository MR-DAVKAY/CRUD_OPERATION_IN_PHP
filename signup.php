<?php
include("server.php");
if(isset($_POST['submit']))
{
       $name = $_POST['name'];
       $username = $_POST['user'];
       $phone = $_POST['phone'];
       $password =$_POST['pass'];
       $cpassword =$password;

       $sql = "select *from signup where username='$username'";
       $result = mysqli_query($conn, $sql);
       $count_user = mysqli_num_rows($result);

      

       $sql = "select *from signup where phone='$phone'";
       $result = mysqli_query($conn, $sql);
       $count_phone = mysqli_num_rows($result);

       if($count_user==0 & $count_email==0 & $count_phone==0)
       {
         if($password==$cpassword)
         {
              $hash = password_hash($password,PASSWORD_DEFAULT);
              $sql = "INSERT INTO signup(name, username,phone,password)VALUES('$name','$username','$phone','$password')";
              $result = mysqli_query($conn, $sql);
              if($result)
              {
                     header("location: login.php");
              }
         }
         else{
              echo'<script>
              alert("Passwords mismatch!!");
              window.location.href ="signup.php"
              </script>';
         }
       }
       else{
              if($count_user>0)
              {
                     echo '<script>
                     window.location.href="signup.php";
                     alert("Username already exists!!!");
                     </script>';
              }
       
              if($count_phone>0)
              {
                     echo '<script>
                     window.location.href="signup.php";
                     alert("Phone number already exists!!!");
                     </script>';
              }
       }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Get started</title>
       <link rel="stylesheet" href="style.css">
</head>
<body>
       <?php
       include('navbar.php');
       ?>
       <section>
     <div class="signup-box">
       <form action="signup.php" method="POST">
              <h2>Signup</h2>
              <div class="input-box">
                     <span class="icon"><ion-icon name="people"></ion-icon>
              </span>
                     <input type="text" id="name" name="name" required>
                     <label >Name</label>
              </div>
              <div class="input-box">
                     <span class="icon"><ion-icon name="person"></ion-icon>
              </span>
                     <input type="text" id="user" name="user" required>
                     <label >Username</label>
              </div>
       
              <div class="input-box">
                     <span class="icon"><ion-icon name="call"></ion-icon>
              </span>
                     <input type="phone" id="phone" name="phone" required>
                     <label >Phone</label>
              </div>
              <div class="input-box">
                     <span class="icon"><ion-icon name="lock-closed"></ion-icon>
              </span>
                     <input type="password" id="pass" name="pass" required>
                     <label >password</label>
              </div>
             
              <div class="remember-forgot">
                     <label><input type="checkbox"> Accept terms and conditions</label>
                     
              </div>
              <button type="submit" id="submit" name="submit">Create my account</button>
              <div class="regiter-link">
                    <p>Already a member? <a href="login.php">Sign in</a><p/>
              </div>
       </form>
     </div>
     </section>
     
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

