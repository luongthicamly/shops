
<?php
require_once('config.php');
$sql_hot = "SELECT * FROM hot_product ";
$result_hot = mysqli_query($db, $sql_hot);
$row_hot = $result_hot->fetch_all(MYSQLI_ASSOC);

?>
<div class="container">
    <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
            <div class="MultiCarousel-inner">
                <?php
                foreach ($row_hot as $key => $value) {
                    ?>
                    <div class="item">
                        <div class="pad15">
                            <a href="#"><img class="img-item " src="<?php echo $value['url'] ?>" alt="slide 1"></a>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
            <button class="btn btn-color leftLst">
                <i class="fa fa-angle-left" aria-hidden="true"></i></button> <button class="btn btn-color rightLst"><i class="fa fa-angle-right" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>