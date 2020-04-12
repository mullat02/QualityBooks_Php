<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */


require_once (dirname(__FILE__).'/../functions/business.inc.php');

$pageSize = 10;
$pageNo = 0;
$offset = 0;
$pageCount = 1;

if (isset($_GET['pageNo']))
{
    $pageNo = (int)$_GET['pageNo'];
    $offset = ($pageNo - 1) * $pageSize;
}

$business = new Business();

$counter = $business->getBooksQuantity();
$Books = $business->getBooks($offset, $pageSize);

$bagList[] = null;
while ($Book = $Books->fetch_assoc())
{
    $supplierID = $Book['SupplierID'];
    $categoryID = $Book['CategoryID'];
    $description = $Book['Description'];
    $supplierName = $business->getSupplierName($supplierID);
    $categoryName = $business->getCategoryName($categoryID);

    $bookList[] = '<tr>';
    $bookList[] = '<td>'.$book['BookID'].'</td>';
    $bookList[] = '<td>'.$book['BookName'].'</td>';
    $bookList[] = '<td>'.$categoryName.'</td>';
    $bookList[] = '<td>$ '.$book['Price'].'</td>';
    $bookList[] = '<td>'.$description.'</td>';
    $bookList[] = '<td>'.$supplierName.'</td>';
    $bookList[] = '<td><img src="'.$book['ImagePath'].'" style="width: 100px; height: auto;" /></td>';
    $bookList[] = '</tr>';
}

$pageCount = $counter / $pageSize + 1;
$pageList[] = null;
if ($pageCount > 1)
{
    $pageURL = dirname($_SERVER['REQUEST_URI']).'/Admin.php?page=BookManagement&pageNo=';
    for ($i = 1; $i <= $pageCount; $i++)
    {
        if (!isset($_GET['pageNo']) && $i == 1)
        {
            $pageList[] = '<li class="active"><a href="'.$pageURL.$i.'"> '.$i.'</a></li>';
        }
        else
        {
            if (isset($_GET['pageNo']) && $_GET['pageNo'] == $i)
            {
                $pageList[] = '<li class="active"><a href="'.$pageURL.$i.'"> '.$i.'</a></li>';
            }
            else
            {
                $pageList[] = '<li><a href="'.$pageURL.$i.'"> '.$i.'</a></li>';
            }
        }
    }
}
?>

<h2>Book Management</h2>


<div><input type="button" class="btn btn-default" id="btnAddBook" value="Create New" onclick="navToAddBook()" /></div>

<div>
    <table class="table">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Description</th>
            <th>Supplier</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <?php echo join('', $bookList);?>
        </tbody>
    </table>
</div>
<div class="put_center"><ul class="pagination" id="lstPage"><?php echo join('', $pageList);?></ul></div>