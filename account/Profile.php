<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */

require_once (dirname(__FILE__).'/../functions/business.inc.php');
require ('../scripts/ErrorProcess.php');
$error_handler = set_error_handler("userErrorHandler");
if(!isset($_SESSION))
{
    session_start();
}

$email = $_SESSION['user'] or trigger_error("Session variable 'user' not found", E_USER_ERROR);
$business = new Business();

//Get detail information of current user
$result = $business->getUserByEmail($email);
while ($user = $result->fetch_assoc())
{
    $userID = $user['UserID'];
    $email = $user['Email'];
    $password = $user['Password'];
    $lastName = $user['LastName'];
    $firstName = $user['FirstName'];
    $mobile = $user['Mobile'];
    $homePhone = $user['HomePhone'];
    $workPhone = $user['WorkPhone'];
    $address = $user['Address'];
}

//Get and display all the order records of current user
$orders = $business->getOrderByUser($userID);
while ($order = $orders->fetch_assoc())
{
    $orderID = $order['OrderID'];
    $subtotal = $order['Subtotal'];
    $GST = $order['GST'];
    $grandTotal = $order['GrandTotal'];
    $status = $order['Status'];

    $orderList[] = '<tr>';
    $orderList[] = '<td>'.$orderID.'</td>';
    $orderList[] = '<td>$'.$subtotal.'</td>';
    $orderList[] = '<td>$'.$GST.'</td>';
    $orderList[] = '<td>$'.$grandTotal.'</td>';
    $orderList[] = '<td>'.$status.'</td>';
    $orderList[] = '</tr>';
}
?>
<h2>View your Account.</h2>

<h3><span class="glyphicon glyphicon-user"></span> Profile</h3>
<div class="row">
    <dl class="dl-horizontal">
        <dt>Email:</dt>
        <dd><?php echo $email;?></dd>
        <dt>Full Name:</dt>
        <dd><?php echo $firstName;?>&nbsp;<?php echo $lastName;?></dd>
        <dt>Mobile Phone Number:</dt>
        <dd><?php echo $mobile;?></dd>
        <dt>Home Phone Number:</dt>
        <dd><?php echo $homePhone;?></dd>
        <dt>Work Phone Number:</dt>
        <dd><?php echo $workPhone;?></dd>
        <dt>Address:</dt>
        <dd><?php echo $address;?></dd>
    </dl>
</div>

<h3><span class="glyphicon glyphicon-th-list"></span> Orders</h3>
<div class="order-list" id="orderList">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Subtotal</th>
            <th scope="col">GST</th>
            <th scope="col">Grand Total</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php echo join('', $orderList);?>
        </tbody>
    </table>
</div>



