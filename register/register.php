 <?php
    header('Content-Type: text/html; charset=utf-8');
    if (isset($_POST['register'])) {
        include('../config.php');
        // $username = isset($_POST['username']) ? mysql_real_escape_string($_POST['username']) : '';
        // $password = isset($_POST['password']) ? md5($_POST['password']) : '';
        $username = addslashes($_POST['txtusername']);
        $password = addslashes($_POST['txtpassword']);
        $sql = "select * from user where username='$username'  ";
        // echo $sql;
        $con=mysqli_connect("localhost","root","","store");
      
        $result = mysqli_query($con, $sql);
      
        if (!$username || !$password) {
            echo 'eeee';
            return;
        }
        else{
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            // var_dump($row);
            // die();
            if ($row) {
                echo '<script language="javascript">alert("Tai Khoan nay2 da ton tai"); window.location="index.php";</script>';
                die();
            } 
            else {
                $sql = "insert into user (username , password) values ('$username', '$password')";
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
