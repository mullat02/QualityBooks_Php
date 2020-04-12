<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */

require_once (dirname(__FILE__).'/../functions/business.inc.php');
if(!isset($_SESSION))
{
    session_start();
}

$business = new Business();
//$username = $_SESSION['user'];
//$userID = $business->getUserID($username);

$orders = $business->getAllOrders();
while ($order = $orders->fetch_assoc())
{
    $optionWaiting = '';
    $optionShipped = '';
    if ($order['Status'] == 'waiting')
    {
        $optionWaiting = 'selected';
    }
    else
    {
        $optionShipped = 'selected';
    }

    $orderList[] = '<tr>';
    $orderList[] = '<td>'.$order['OrderID'].'</td>';
    $orderList[] = '<td>'.$order['Email'].'</td>';
    $orderList[] = '<td>$'.$order['Subtotal'].'</td>';
    $orderList[] = '<td>$'.$order['GST'].'</td>';
    $orderList[] = '<td>$'.$order['GrandTotal'].'</td>';
    $orderList[] = '<td><select id="select'.$order['OrderID'].'" onchange="changeOrderStatus('.$order['OrderID'].')">';
    $orderList[] = '<option value="waiting" '.$optionWaiting.'>waiting</option>';
    $orderList[] = '<option value="shipped" '.$optionShipped.'>shipped</option></select></td>';
    $orderList[] = '<td><button class="btn-default btn" id="btn'.$order['OrderID'].'" onclick="updateOrderStatus('.$order['OrderID'].')">Save</button></td>';
    $orderList[] = '</tr>';
}

?>
<h2>Order Management</h2>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Order ID</th>
        <th scope="col">User Email</th>
        <th scope="col">Subtotal</th>
        <th scope="col">GST</th>
        <th scope="col">Grand Total</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php echo join('', $orderList);?>
    </tbody>
</table>


