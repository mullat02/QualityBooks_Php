<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 21:05
 */

require_once (dirname(__FILE__).'/../functions/business.inc.php');

if (isset($_GET['bookID']))
{
    $bookID = $_GET['bookID'];
    $business = new Business();
    $books = $business->getBookDetails($bookID);
    while ($book = $books->fetch_assoc())
    {
        $bookName = $book['BookName'];
        $category = $book['CategoryName'];
        $supplier = $book['SupplierName'];
        $price = $book['Price'];
        $description = $book['Description'];
        $imagePath = $book['ImagePath'];
    }
}
else
{
    echo 'Sorry, page cannot be displayed.';
    exit;
}
?>

<h2>Book Details</h2>

<div>
    <hr />
    <dl class="dl-horizontal">
        <dt>
            ID
        </dt>
        <dd>
            <p><?php echo $bookID;?></p>
        </dd>
        <dt>
            Name
        </dt>
        <dd>
            <p><?php echo $bookName;?></p>
        </dd>
        <dt>
            Category
        </dt>
        <dd>
            <p><?php echo $category;?></p>
        </dd>
        </dd>
        <dt>
            Description
        </dt>
        <dd>
            <p><?php echo $description;?></p>
        </dd>
        <dt>
            Price
        </dt>
        <dd>
            <p>$ <?php echo $price;?></p>
        </dd>
        <dt>
            Image
        </dt>
        <dd>
            <img src="<?php echo $imagePath;?>" class="item-image img-responsive" alt="<?php echo $bookName;?>">
        </dd>
    </dl>
</div>
<div>
    <a class="btn btn-default" href="http://dochyper.unitec.ac.nz/mullat02/QualityBooks_Php/product/Product.php?category=All">Back to List</a>
</div>

