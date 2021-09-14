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
    $name = addslashes($_POST['txtname']);
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
            $sql = "insert into user (username , password,name) values ('$username', '$password', '$name')";
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
    <link href="../../../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../../css/common.css" rel="stylesheet">
    <link href="../../../css/register.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <form action="index.php" method="POST" class="needs-validation" novalidate>
            <input type="text" class="form-control" placeholder="user name" style="margin-bottom:15px;" name="txtusername" required>
            <p class="valid-feedback">
                Looks good!
            </p>
            <p class="invalid-feedback">
                Please username
            </p>

            <input type="text" class="form-control" placeholder="Enter your password" style="margin-bottom:15px;" name="txtpassword" required>
            </p>
            <p class="valid-feedback">
                Looks good!
            </p>
            <p class="invalid-feedback">
                Please password
            </p>
            <input type="text" class="form-control" placeholder="Name" required>
                        
                        <p class="invalid-feedback">
                            Please enter your name
                        </p>
            <input type="submit" class="form-control submit-form" value="REGISTER" style="color:#fff;background:#bb0876;" name="register">

        </form>
       
    </div>
    
    <script src="../../../js/validate.form.js"></script>

</body>


</html>