<?php
   include("../config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      
    //   var_dump($result);die();
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
    
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $user_id = $row['id'];
         $_SESSION['login_user'] = $myusername;
         $_SESSION['userid']= $user_id;
         header("location: ../index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
   else{
    $error="";
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      <?php require_once('../include/head.php');?>
      
      <link href="../css/register.css" rel="stylesheet"/>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         .login-form{
            padding: 3%;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
   </head>
   
   <body class="body-rs">
	
      <!-- <div style="text-align:center;">
         <div style = "width:300px; border: solid 1px #333333; " >
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div> -->
      <form class="login-form needs-validation" novalidate action = "" method = "post">
      <h1 class="title-register">Login</h1>
            <input type="email" class="form-control" placeholder="exanple@gmail.com" name="username" required>
            <p class="invalid-feedback">
                            Please enter your email
                        </p>
            <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            <p class="invalid-feedback">
                            Please enter your password
                        </p>
            <div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="customCheck" name="checkbox1">
					<label class="custom-control-label" for="customCheck" style="color:#000; ">Remember is password</label>
				</div>
            <input type="submit" class="form-control submit-form" value="LOGIN" style="color:#fff;background:#bb0876;">
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        </form>
        
   </body>
   <script src="../js/validate.form.js"></script>

    <?php require_once('../include/footer-js.php');?>
</html>