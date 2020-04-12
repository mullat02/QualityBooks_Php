<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 22:42
 */
if(!isset($_SESSION))
{
    session_start();
}

require_once (dirname(__FILE__).'/functions/business.inc.php');

if (isset($_SESSION['shoppingCart']))
{
    $arrCart = $_SESSION['shoppingCart'];
}

if (isset($arrCart) && count($arrCart) != 0)
{
    $itemList[] = '<table class="table cartTable">';
    $itemList[] = '<tr>';
    $itemList[] = '<th>ITEMS</th>';
    $itemList[] = '<th>CATEGORY</th>';
    $itemList[] = '<th>PRICE</th>';
    $itemList[] = '<th>QTY</th>';
    $itemList[] = '<th>SUBTOTAL</th>';
    $itemList[] = '</tr>';


    $total = 0;
        $business = new Business();
        foreach ($arrCart as $id => $qty)
        {
            $books = $business->getBookDetails($id);
            while ($bag = $bags->fetch_assoc())
            {
                $bookID = $book['BookID'];
                $bookName = $book['BookName'];
                $categoryName = $bag['CategoryName'];
                $price = $bag['Price'];
            }
            $subtotal = (float)$price * (int)$qty;
            $total += $subtotal;


        $itemList[] = '<tr>';
        $itemList[] = '<td><a href="BookDetails.php?bagID='.$bookID.'">'.$bookID.'. '.$bookName.'</a></td>';
        $itemList[] = '<td>'.$categoryName.'</td>';
        $itemList[] = '<td>$'.$price.'</td>';
        if($qty>1){
            $itemList[] = '<td><button onclick="updateCartQty('.$id.', -1)" class="shopping-cart-remove">-</button>';
        }
        else{
            $itemList[] = '<td><button onclick="removeCartItem('.$id.')" class="shopping-cart-remove">-</button>';
        }
//        $itemList[] = '<td><button onclick="updateCartQty('.$id.', -1)" class="shopping-cart-remove">-</button>';
        $itemList[] = '<span>'.$qty.'</span>';
        $itemList[] = '<button onclick="updateCartQty('.$id.', 1)" class="shopping-cart-remove">+</button></td>';
        $itemList[] = '<td>$'.number_format($subtotal, 2).'</td>';
        $itemList[] = '</tr>';

    }
    $GST = $total * 0.15;
    $grandTotal = $total + $GST;

    $itemList[] = '
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>SUBTOTAL:</td>
            <td>$'.number_format($total, 2).'</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>GST (15%):</td>
            <td>$'.number_format($GST, 2).'</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>GRAND TOTAL:</b></td>
            <td><b>$'.number_format($grandTotal, 2).'</b></td>
        </tr>
    </table>
    <div class="row">
        <div class="col-md-offset-7">
            <a class="btn-danger btn" style="color:white;" onclick="clearCart()">
                Clear Cart <span class="glyphicon glyphicon-trash"></span>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a style="color:white;" class="btn-warning btn" onclick="checkOut()">
                Checkout&nbsp;<i class="fa fa-credit-card" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <br />';

}
else
{
    $itemList[] = '<hr />';
    $itemList[] = '<h4>You have no items in your shopping cart. </h4>';
}

?>

<div id="cart-container" class="cart-container">
    <h4 style="color:#FF662F;"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Shopping Cart</h4>
    <?php echo join('', $itemList);?>
</div>
