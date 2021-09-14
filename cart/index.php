<?php
require_once('../config.php');
session_start();
//get infomation acount 
if (isset($_SESSION['userid'])) {
  $user_id = $_SESSION['userid'];
  $sql_user = "SELECT * FROM user where id = $user_id";
  $result_user = mysqli_query($db, $sql_user);
  $row_user = $result_user->fetch_all(MYSQLI_ASSOC);
  foreach ($row_user as $key => $value) {
    $name = $value['name'];
    $email = $value['username'];
    $phone = $value['phone'];
    $address = $value['address'];
  }
  $sql = "SELECT * FROM cart where id_user=$user_id";
  $result = mysqli_query($db, $sql);
  $row = $result->fetch_all(MYSQLI_ASSOC);
  foreach ($row as $key => $value) {
    $id_product = $value['id_product'];
  }
  if (isset($_POST['delete'])) {

    $sql_delete = "DELETE FROM cart where id_user =$user_id AND id_product= $id_product";
    if (mysqli_query($db, $sql_delete)) {
      //    echo '<script language="javascript">alert("update thành công"); window.location="detail_product.php?id=',$id,'";</script>';
      echo '<script language="javascript"> alert("deleted product in cart");window.location="./index.php";</script>';
    } else {
      echo '<script language="javascript">alert("lỗi"); window.location="./index.php";</script>';
    }
  }
} else {
  echo '<script language="javascript">alert("please login"); window.location="../login/index.php";</script>';
}


//get shopping cart where id





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>shpopping cart</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php require_once('../include/head.php') ?>
  <link href="./css/shopping_cart.css" rel="stylesheet">
</head>

<body>
  <?php require_once('../test.php') ?>
  <main>
    <div class="container ">
      <div class="row">
        <div class="col-8">
          <?php foreach ($row as $key => $value) { ?>
            <form method="POST">
              <div class="item-cart  cart">
                <div class="custom-control custom-checkbox title">
                  <input type="checkbox" class="custom-control-input" id="itemCheckbox_24" name="itemCheckbox_24" value="0">
                  <label class="custom-control-label" for="itemCheckbox_24">title</label>
                </div>
                <div class="row">
                  <div class="col-3">
                    <img src="<?php echo ($value['images']) ?>" alt="...">
                  </div>
                  <div class="col-6">
                    <p><?php echo ($value['name']) ?></p>
                    <p><?php echo ($value['price']) ?>$</p>
                  </div>
                  <div class="col-3">
                    <p class="center">
                      <button class="btn btn-number sub"><i class="fa fa-minus" aria-hidden="true"></i></button>
                      <input type="text" value="<?php echo ($value['amount']) ?>" class="quantity" name="quantity" onchange="quantityChange(this)" />
                      <button class="btn btn-number add"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </p>
                    <input type="submit" class="form-control " value="delete" style="border: none" name="delete">
                  </div>
                </div>
              </div>
            </form>
          <?php  } ?>
        </div>

        <div class="col-4 ">
          <div class="cart payment">
            <p class="title-payment">payment</p>
            <p><i class="fa fa-user" aria-hidden="true"></i><span><?php echo ($name) ?></span></p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo ($address) ?></span></p>
            <p><i class="fa fa-phone" aria-hidden="true"></i><span><?php echo ($phone) ?></span></p>
            <p><i class="fa fa-envelope-o" aria-hidden="true"></i><span><?php echo ($email) ?></span></p>
            <p class="title-order">Order Summary</p>
            <p>Subtotal: <span class="money">1000$</span></p>
            <p>Shipping Fee: <span class="money">500$</span></p>
            <p class="total">Tolal: <span class="money">1500$</span></p>
            <p><span class="vat">VAT included, where applicable</span></p>
            <button class="btn btn-order">place order</button>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
<?php require_once('../include/footer-js.php') ?>

</html>

<script>
  $('.sub').click(function() {
    var target = $('.quantity', this.parentNode)[0];
    if (target.value > 1) {
      target.value = +target.value - 1;
    }
    target.onchange();
  });
  $('.add').click(function() {
    var target = $('.quantity', this.parentNode)[0];
    target.value = +target.value + 1;
    target.onchange();
  });

  function quantityChange(sender) {
    var quantity = $(sender).val();

    if (quantity == 1) {
      $('.sub').attr('disabled', 'disabled');
    } else {
      $('.sub').removeAttr('disabled');
    }
  };
</script>

<!-- 
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h1 class="modal-title">Shopping cart</h1>
          <button type="button" class="close" data-dismiss="modal"><span class="close">
            <i class="fa fa-close"></i>
        </span></button>
        </div>
        
        <div class="modal-body">
        <table class="show-cart table">
          
          </table>
          <div>Total price: <span class="total-cart"></span>đ</div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Order now</button>
        </div>
        
      </div>
    </div>
  </div> -->