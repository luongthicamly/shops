<?php
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
</head>

<body>
    <?php require_once('test.php') ?>
    <main class="main">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/bg-desktop.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/bg-1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/bg-2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./images/bg-3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container mg-top top-spint">
            <div class="row">
                <div class="col-sm-3">
                    <div class="col">
                        <a href="#" data-toggle="modal" data-target="#myModal-login">
                            <i class="fa fa-user fa-fw"></i>
                            <span>Login</span>
                        </a>
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
                            <div class="m-hot-product">
                                <img src="<?php echo $value['image'] ?>" alt="..." />
                                <p><?php echo ($value['name']) ?> </p>
                                <p>
                                    <span class="price"><?php echo ($value['price']) ?>$</span>
                                </p>
                                <button class="click ">
                                    <a href="#" data-name="<?php echo ($value['name']) ?>" data-price="<?php echo ($value['price']) ?>" class="add-to-cart ">
                                        add to cart
                                    </a>
                                </button>
                            </div>
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
        <div class="slide-show-item">
            <div class="container">
                <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
                    <div class="carousel-inner carousel-inner-item row w-100 mx-auto" role="listbox">
                        <div class="carousel-item col-md-3 active">
                            <img class="img-fluid mx-auto d-block" src="./images/slide_show_item/slide1.jpg" alt="slide 1">
                        </div>
                        <div class="carousel-item col-md-3">
                            <img class="img-fluid mx-auto d-block" src="./images/slide_show_item/slide2.jpg" alt="slide 2">
                        </div>
                        <div class="carousel-item col-md-3">
                            <img class="img-fluid mx-auto d-block" src="./images/slide_show_item/slide3.jpg" alt="slide 3">
                        </div>
                        <div class="carousel-item col-md-3">
                            <img class="img-fluid mx-auto d-block" src="./images/slide_show_item/slide4.jpg" alt="slide 4">
                        </div>
                        <div class="carousel-item col-md-3">
                            <img class="img-fluid mx-auto d-block" src="./images/slide_show_item/slide5.jpg" alt="slide 5">
                        </div>
                        <div class="carousel-item col-md-3">
                            <img class="img-fluid mx-auto d-block" src="./images/slide_show_item/slide6.jpg" alt="slide 6">
                        </div>
                        <div class="carousel-item col-md-3">
                            <img class="img-fluid mx-auto d-block" src="./images/slide_show_item/slide7.jpg" alt="slide 7">
                        </div>
                        <div class="carousel-item col-md-3">
                            <img class="img-fluid mx-auto d-block" src="./images/slide_show_item/slide8.jpg" alt="slide 7">
                        </div>
                    </div>
                    <a class="carousel-control-prev a-new" href="#carouselExample" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left fa-lg text-muted"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next text-faded a-new" href="#carouselExample" role="button" data-slide="next">
                        <i class="fa fa-chevron-right fa-lg text-muted"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-12">
                    <h4>INTRODUCE</h4>
                    <p>General policies & regulations</p>
                    <p>Privacy Policy</p>
                    <p>Sitemap</p>
                    <p>Contact</p>
                </div>
                <div class="col-sm-3 col-12">
                    <h4>HELP</h4>
                    <p>Shopping guide</p>
                    <p>Payment Guide</p>
                    <p>Instructions for change and return</p>
                    <p>Complaint handling process</p>
                </div>
                <div class="col-sm-3 col-12">
                    <h4>CATEGORY</h4>
                    <p>Men's bags</p>
                    <p>Women's handbags</p>
                </div>
                <div class="col-sm-3 col-12">
                    <h4>CONNECT WITH US</h4>
                    <p>
                        <img src="./images/zalo.png" alt="..." />
                        <img src="./images/fb.png" alt="..." />
                        <img src="./images/instagram.png" alt="..." />
                        <img src="./images/youtobe.png" alt="..." />
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <?php require_once('./include/footer.php') ?>

</body>
<?php require_once('./include/footer-js.php') ?>
<script src="./js/cart.js"></script>
<!-- <script>
    $('#carouselExample').on('slide.bs.carousel', function(e) {

                var $e = $(e.relatedTarget);
                var idx = $e.index();
                var itemsPerSlide = 4;
                var totalItems = $('.carousel-item').length;

                if (idx >= totalItems - (itemsPerSlide - 1)) {
                    var it = itemsPerSlide - (totalItems - idx);
                    for (var i = 0; i
</script> -->
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
</script>

</html>