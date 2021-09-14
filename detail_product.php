<?php
require_once('config.php');
session_start();
// var_dump($_GET['id']);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo 'loi';
    exit;
}

$sql = "SELECT * FROM product where id=$id";
$result = mysqli_query($db, $sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
foreach ($row as $key => $value) {
    $name = $value['name'];
    $price = $value['price'];
    $images = $value['image'];
}

// echo $name, $price, $images ;



$sql_cart = "SELECT * FROM cart where id_product = $id";
$result_cart = mysqli_query($db, $sql_cart);
$row_cart = $result_cart->fetch_all(MYSQLI_ASSOC);
foreach ($row_cart as $key => $value) {
    $id_product = $value['id_product'];
    $amount_cart = $value['amount'];
}
// $user_id = '2';

if (isset($_POST['add'])) {
    if (isset($_SESSION['userid'])) {
        $user_id = $_SESSION['userid'];
        if (isset($id_product)) {
            $amount_new = addslashes($_POST['quantity']);
            $amount_update = (int) $amount_cart + (int) $amount_new;

            $sql = "UPDATE cart SET amount = $amount_update where id_product = $id";
            if (mysqli_query($db, $sql)) {
                //    echo '<script language="javascript">alert("update thành công"); window.location="detail_product.php?id=',$id,'";</script>';
                echo '<script language="javascript"> alert("added your shopping cart. go to cart");window.location="./cart/index.php";</script>';
            } else {
                echo '<script language="javascript">alert("lỗi"); window.location="index.php";</script>';
            }
        } else {
            $amount = addslashes($_POST['quantity']);
            $sql = "insert into cart (name ,price, amount, id_user, images, id_product) values ('$name', '$price', '$amount', '$user_id', '$images', '$id' )";
            // var_dump($amount); die();
            if (mysqli_query($db, $sql)) {
                echo '<script language="javascript">alert("added your shopping cart. go to cart"); window.location="./cart/index.php";</script>';
            } else {
                echo '<script language="javascript">alert("lỗi"); window.location="index.php";</script>';
                //    echo $name, $price, $amount, $images , $user_id;
            }
        }
    } else {
        echo '<script language="javascript">alert("please login"); window.location="./login/index.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once('./include/head.php'); ?>
    <link href="css/slideshow-item.css" rel="stylesheet">
    <link href="css/detail.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./test.php'); ?>
    <main>
        <div class="container">
            <form method="POST">
                <?php
                foreach ($row as $key => $value) {
                    ?>
                    <div class="row">
                        <div class="col-sm-5 col-12">
                            <img src="<?php echo ($value['image']) ?>" alt="..." />
                        </div>
                        <div class="col-sm-7 col-12">
                            <h3 class="title_detail" name="txtname"><?php echo ($value['name']) ?></h3>
                            <p class="price"> <span name="txtprice"><?php echo ($value['price']) ?></span></p>
                            <p>
                                <button type="button" id="sub" class="btn btn-number"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                <input type="text" value="1" class="quantity" name="quantity" onchange="quantityChange(this)" />
                                <button type="button" id="add" class="btn btn-number"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </p>
                            <div class="click add-to-cart">
                                <input type="submit" class="form-control submit-form" value="add to cart" style="color:#fff;background:#bb0876; width: 100px;" name="add">
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
    </main>
    <?php require_once('./include/item_slideshow.php'); ?>
    <?php require_once('./include/footer.php'); ?>
</body>
<?php require_once('./include/footer-js.php'); ?>
<script src="/js/slideshow-item.js"></script>
<script>
    $('#sub').click(function() {
        var target = $('.quantity', this.parentNode)[0];
        if (target.value > 1) {
            target.value = +target.value - 1;
        }
        target.onchange();
    });
    $('#add').click(function() {
        var target = $('.quantity', this.parentNode)[0];
        target.value = +target.value + 1;
        target.onchange();
    });

    function quantityChange(sender) {
        var quantity = $(sender).val();

        if (quantity == 1) {
            $('#sub').attr('disabled', 'disabled');
        } else {
            $('#sub').removeAttr('disabled');
        }
    };
</script>
<!-- <script src="./js/cart.js"></script> -->

</html>
<?php
// if (isset()){
//     $username = $_GET['username'];
// }else {
//     echo 'chua dang nhap';
//     exit;
// }


?>