<?php
header('Content-Type: text/html; charset=utf-8');
$err = "";
$err1 = "";
if (isset($_POST['register'])) {
    include('../config.php');
    // $username = isset($_POST['username']) ? mysql_real_escape_string($_POST['username']) : '';
    // $password = isset($_POST['password']) ? md5($_POST['password']) : '';
    $username = addslashes($_POST['txtusername']);
    $password = addslashes($_POST['txtpassword']);
    $active =addslashes($_POST['txtactive']);
    $name = addslashes($_POST['txtname']);
    $phone = addslashes($_POST['txtphone']);
    $address = addslashes($_POST['txtaddress']);
    $sql = "select * from user where username='$username'  ";
    // echo $sql;

    $con = mysqli_connect("localhost", "root", "", "store");

    $result = mysqli_query($con, $sql);

    if (!$username) {
        echo '
            <script language="javascript">
                var username = document.getElementById("username").style.display = "block";
                 
            </script>';
    } else if (!$password) {
        echo '
            <script language="javascript">
                var password = document.getElementById("p").style.display = "block";
                 
            </script>';
    } else {
        $err = "";
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // var_dump($row);
        // die();
        if ($row) {
            echo '<script language="javascript">alert("Tai Khoan nay2 da ton tai"); window.location="index.php";</script>';
            die();
        } else {
            $sql = "insert into user (username ,password, active, name, phone, address) values ('$username', '$password', '$active', '$name', '$phone', '$address')";
            if (mysqli_query($db, $sql)) {
                echo '<script language="javascript">alert("Đăng ký thành công"); window.location="index.php";</script>';
                // header("location: ../login/login_index.php");
                // echo 'dang ky thanh cong';
            } else {
                echo '<script language="javascript">alert("lỗi"); window.location="index.php";</script>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once('../include/head.php');?>
    
    <link href="../css/register.css" rel="stylesheet">

</head>

<body class="body-rs">
   
    <div class="container">
        <form class="needs-validation" novalidate action="" method="POST">
                    <h1 class="title-register">Register</h1>
                    
                        <input type="text" class="form-control" placeholder="Name" name="txtname"required>
                        
                        <p class="invalid-feedback">
                            Please enter your name
                        </p>
                    
                    <div class="row-form register-form">
                        <label class="form-check-label name">Birthday</label>
                        <select id="day">

                        </select>
                        <select id="month">

                        </select>
                        <select id="year">

                        </select>
                    </div>
                    <input type="text" class="control" placeholder="0361782935" name="txtphone" required>
                    
                    <p class="invalid-feedback">
                        Please enter your phone number
                    </p>
                    <input type="email" class="form-control" placeholder="exanple@gmail.com" name="txtusername" required>
                    
                    <p class="invalid-feedback">
                        Please enter your email
                    </p>
                    <input type="password" class="form-control" placeholder="Enter your password" name="txtpassword"required>
                    
                    <p class="invalid-feedback">
                        Please enter your password
                    </p>
                    <input type="text" class="form-control" placeholder="Enter your address" name="txtaddress"required>
                    
                    <p class="invalid-feedback">
                        Please enter your address
                    </p>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <input type="submit" class="form-control submit-form" value="REGISTER" style="color:#fff;background:#bb0876;" name="register">
                </form>
    </div>
    <script>
    for (var n = 1; n < 32; n++) {
        document.getElementById('day').append(new Option(n, n));
    }
    for (var a = 1; a < 13; a++) {
        document.getElementById('month').append(new Option(a, a));
    }
    for (var z = 1960; z < 2019; z++) {
        document.getElementById('year').append(new Option(z, z));
    }
</script>
    <script src="../../../js/validate.form.js"></script>

    <?php require_once('../include/footer-js.php');?>
</body>


</html>