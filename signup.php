<!DOCTYPE html>
<html>
<head>

<head>
      <style>
         body {
            background-image: url("/videotutorials/images/tutor_connect_home.jpg");
         }
      </style>
   </head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>First Name</label>
          <?php if (isset($_GET['firstname'])) { ?>
               <input type="text" 
                      name="firstname" 
                      placeholder="First Name"
                      value="<?php echo $_GET['firstname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="firstname" 
                      placeholder="First Name"><br>
          <?php }?>
          
          <label>Last Name</label>
          <?php if (isset($_GET['lastname'])) { ?>
               <input type="text" 
                      name="lastname" 
                      placeholder="Last Name"
                      value="<?php echo $_GET['lastname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="lastname" 
                      placeholder="Last Name"><br>
          <?php }?>
          
          <label>Id Number</label>
          <?php if (isset($_GET['Id_no'])) { ?>
               <input type="text" 
                      name="Id_no" 
                      placeholder="Id Number"
                      value="<?php echo $_GET['Id_no']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="Id_no" 
                      placeholder="Id Number"><br>
          <?php }?>
          

          <label>Username</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
                      name="email" 
                      placeholder="Username"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="email" 
                      placeholder="Username"><br>
          <?php }?>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="login.html" class="ca">Already have an account?</a>
     </form>
</body>
</html>