<?php
session_start();
try {
    require_once('config.php');
    $sql = "SELECT * FROM product ";
    $result = mysqli_query($db, $sql);
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $row = $result->fetch_all(MYSQLI_ASSOC);
} catch (Exception $e) {
    die("Could not connect to the database:" . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once('./include/head.php') ?>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/slideshow-item.css" rel="stylesheet">
    <link href="css/wrapper.css" rel="stylesheet">
</head>

<body>

    <?php require_once('test.php') ?>
    <main class="main">
        <div class="background-img"></div>
        <div class="container mg-top top-spint">
            <div class="row">
                <div class="col-sm-3">
                    <div class="col">

                        <?php
                        if (isset($_SESSION['login_user'])) {
                            ?>
                            <a href="/login/logout.php">
                                <i class="fa fa-user fa-fw"></i>
                                <span>Logout</span>
                            </a>
                        <?php } else { ?>
                            <a href="/login/">
                                <i class="fa fa-user fa-fw"></i>
                                <span>Login</span>
                            </a>
                        <?php } ?>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col">
                        <a href="#" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span>Shopping cart</span>&ensp;(<span class="total-count"></span>&ensp;)
                        </a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col">
                        <a href="#">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Bill</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="col">
                        <a href="#">
                            <i class="fa fa-mobile-phone" aria-hidden="true"></i>
                            <span>0908909080</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product mg-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="m-product">
                            <img src="./images/shoe.jpg" alt="..." />
                            <p class="title">SHOES</p>
                            <!-- <p class="text">High fashion shoes made by famous designers may be made of expensive materials,
                                 use complex construction and sell for hundreds or even thousands...
                            </p> -->
                            <button class="watch-now">
                                <a href="#">
                                    WATCH NOW
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="m-product">
                            <img src="./images/hand_bag.png" alt="..." />
                            <p class="title">HANDBAG</p>
                            <!-- <p class="text"> A "handbag" is a larger accessory that holds objects beyond currency, such as personal items.</p> -->
                            <button class="watch-now">
                                <a href="#">
                                    WATCH NOW
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="m-product">
                            <img src="./images/high_heels.jpg" alt="..." />
                            <p class="title">HIGH HELLS</p>
                            <!-- <p class="text"> There are many types of high heels, which come in different styles, colors and materials, and can be found all over the world.</p> -->
                            <button class="watch-now">
                                <a href="#">
                                    WATCH NOW
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hot-product mg-top">
            <div class="container">
                <h2>
                    <span class="title-hot">HOT PRODUCT</span>
                </h2>
                <div class="row">
                    <?php
                    foreach ($row as $key => $value) {
                        ?>
                        <div class="col-sm-3 col-12">
                            <a href="/detail_product.php?id=<?php echo $value['id'] ?>">
                                <div class="m-hot-product">
                                    <img src="<?php echo $value['image'] ?>" alt="..." />
                                    <p><?php echo ($value['name']) ?> </p>
                                    <p>
                                        <span class="price"><?php echo ($value['price']) ?>$</span>
                                    </p>
                                    <!-- <button class="click ">
                                        <a href="#" data-name="<?php echo ($value['name']) ?>" data-price="<?php echo ($value['price']) ?>" class="add-to-cart ">
                                            add to cart
                                        </a>
                                    </button> -->
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="contact  mg-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <h3>order online</h3>
                        <p><span>01.</span>&ensp;Visit the website "https://tuixach.storehouse.com/"</p>
                        <p><span>02.</span>&ensp;Register an account at the "register" button</p>
                        <p><span>03.</span>&ensp;Choose the item you want to buy. Click "order now" button, then go to "cart" to confirm order.</p>
                    </div>
                    <div class="col-sm-4 col-12">
                        <img src="./images/pink_house.jpg" alt="..." />
                    </div>
                    <div class="col-sm-4 col-12">
                        <h3>delivery everywhere</h3>
                        <p><span>01.</span>&ensp;Confirm order within 24 hours</p>
                        <p><span>02.</span>&ensp;Picking up and packaging products</p>
                        <p><span>03.</span>&ensp;Proceed to delivery</p>
                        <p><span>04.</span>&ensp;Receive the product. (Pay)</p>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('./include/item_slideshow.php'); ?>
        <div id="mobnav-btn">
            <div class="mobnav-icon">
                <i class="fa fa-commenting-o" aria-hidden="true"></i>
            </div>
        </div>
        <div id="message">
            <form>
                <p class="title">Chat with us <span id="dismiss"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></span></p>
                <input type="text" class="control" placeholder="name" id="name">
                <div class="content-chat">
                    <span id="admin">Confirm order within 24 hours Confirm order within 24 hours Confirm order within 24 hours</span>
                    <span id="user_chat">Confirm order within 24 hours Confirm order within 24 hours Confirm order within 24 hours</span>
                </div>
                <div class="form-group row">
                        <div class="col-sm-10 chat">
                            <input type="text" class="control" placeholder="message" required id="msg">
                        </div>
                        <label class="col-sm-2 col-form-label chat" ><a href="#"><i class="fa fa-paper-plane" aria-hidden="true" id="send"></i></a></label>
                    </div>
            </form>
        </div>
    </main>

    <?php require_once('./include/footer.php') ?>

</body>
<?php require_once('./include/footer-js.php') ?>
<script src="./js/cart.js"></script>
<script src="./js/chat.js"></script>
<script src="/js/slideshow-item.js"></script>
<script>
    for (var i = 1; i < 32; i++) {
        $('#select-day').append(new Option(i, i));
    }
    for (var j = 1; j < 13; j++) {
        $('#select-month').append(new Option(j, j));
    }
    for (var u = 1960; u < 2019; u++) {
        $('#select-year').append(new Option(u, u));
    }
    $('#dismiss').click(function(){
        $('#message').hide();
        $('#mobnav-btn').show();
    });
    $('#mobnav-btn').click(function(){
        $('#message').show();
        $(this).hide();
    });
</script>

</html>