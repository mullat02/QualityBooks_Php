<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 22:35
 */

define('HTTP_DIR', 'http://dochyper.unitec.ac.nz/mullat02/QualityBooks_Php/');
?>


<!--Banners-->
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

 <style>
        .carousel-inner > .item > img {
            width: 100%;
            height: 350px;
        }
    </style>

        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo HTTP_DIR.'images/banner_01.jpg';?>" alt="Quality Books" class="img-responsive" />
                <div class="carousel-caption" role="option">
                    <p>
                        Enjoy our bags<br />
                        <a class="btn btn-default" href="http://dochyper.unitec.ac.nz/mullat02/QualityBooks_Php/product/Product.php">READY FOR SHOPPING</a>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo HTTP_DIR.'images/banner_02.jpg';?>" alt="Quality Books" class="img-responsive" />
                <div class="carousel-caption" role="option">
                    <p>
                        Enjoy our bags<br />
                        <a class="btn btn-default" href="http://dochyper.unitec.ac.nz/mullat02/QualityBooks_Php/product/Product.php">READY FOR SHOPPING</a>
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo HTTP_DIR.'images/banner_03.jpg';?>" alt="Quality Books" class="img-responsive" />
                <div class="carousel-caption" role="option">
                    <p>
                        Enjoy our bags<br />
                        <a class="btn btn-default" href="http://dochyper.unitec.ac.nz/mullat02/QualityBooks_Php/product/Product.php">READY FOR SHOPPING</a>
                    </p>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div> <!--//Banners-->

<br />
<div class="container">
    <!--Featured Item-->
    <div class="spec">
        <h3>NEW BOOKS</h3>
        <div class="ser-t">
            <b></b>
            <span><i></i></span>
            <b class="line"></b>
        </div>
    </div> <!-- //Featured Item-->

    
</div>
