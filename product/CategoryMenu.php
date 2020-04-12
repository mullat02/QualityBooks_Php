<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 09:49
 */

require_once (dirname(__FILE__).'/../functions/business.inc.php');

$business = new Business();
$categories = $business->getAllCategories();

while ($category = $categories->fetch_assoc())
{
    $categoryName = $category['CategoryName'];
    $categoryID = $category['CategoryID'];
    $menuList[] = '<a class="list-group-item" href="Product.php?category='.$categoryID.'">'.$categoryName.'</a>';
}
?>

<div class="list-group" id="categories">
    <a class="list-group-item" href="Product.php?category=All">All Categories</a>
    <?php echo join('', $menuList);?>
</div>