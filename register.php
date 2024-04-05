<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
          $con = mysqli_connect("fdb32.awardspace.net","4109367_cs","Lebo@12345","4109367_cs") or die("Couldn't connect");
        
         if(isset($_POST['submit'])){
            $username = $_POST['name'];
            $usename = $_POST['lastname'];
            $email = $_POST['email'];
            $age = $_POST['Id_no'];
            $password = password_hash($_POST['user_password'], PASSWORD_DEFAULT, array('cost' => 12));

         //verifying the unique email

         $dbc = mysqli_query($con,"SELECT email_address FROM login_user WHERE email_address='$email'");
         

         if(!$dbc || mysqli_num_rows($dbc) >0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO login_user(name,email_address,lastname,Id_no,user_password) VALUES('$username','$email','$usename','$age','$password')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='login.html'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Id_no">ID number</label> 
                    <input type="number" name="Id_no" id="Id_no" autocomplete="off"  maxlength="13" size="13" required>
                </div>
                <div class="field input">
                    <label for="user_password">Password</label>
                    <input type="user_password" name="user_password" id="user_password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.html">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>