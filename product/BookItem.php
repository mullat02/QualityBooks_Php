<?php
/**
 * Created by PhpStorm.
 * User: Mulla tasnim
 * Date: 19/10/2019
 * Time: 21:12
 */
?>

<div class="col-md-2 col-m put_center">
    <!-- Item -->
	<div style="width: 154px; height:180px; display:table; background:#efefef; margin: 0 auto;">
		<div style="display:table-cell; vertical-align: middle; ">
			<a href="BookDetails.php?bookID=<?php echo $bookID;?>" class="offer-img">
				<img class="img-responsive" style="max-width: 154px; max-height:180px;" src="<?php echo $imagePath;?>" alt="<?php echo $bookName;?>">
			</a>
		</div>
	</div>
    <div class="mid-1 put_center">
        <div>
            <h5><a href="BookDetails.php?bookID=<?php echo $bookID;?>"><?php echo $bookName;?></a></h5>
            <h6><?php echo $categoryName;?></h6>
            <h4>$<?php echo $price;?></h4>
        </div>
        <div>
            <a class="btn-primary btn raised" onclick="addToCart(<?php echo $bookID;?>)">Add to Cart</a>
        </div>
    </div>
</div>
