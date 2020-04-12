<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 00:07
 */

if(!isset($_SESSION))
{
    session_start();
}

if (isset($_POST['bookID']))
{
    $bagID = $_POST['bookID'];
}

if (isset($_SESSION['shoppingCart']))
{
    $arrCart = $_SESSION['shoppingCart'];
}
else
{
    echo 'error';
    exit;
}

if ($_POST['action'] == 'changeQuantity')
{
    changeQuantity();
    exit;
}
if ($_POST['action'] == 'removeItem')
{
    removeItem();
    exit;
}
if ($_POST['action'] == 'clearCart')
{
    unset($_SESSION['shoppingCart']);
    exit;
}

function changeQuantity()
{
    global $bookID;
    global $arrCart;

    if (isset($_POST['adjust']))
    {
        $adjust = $_POST['adjust'];
    }
    else
    {
        echo 'error';
        exit;
    }

    foreach ($arrCart as $id => $qty)
    {
        if ($id == $bookID)
        {
            $newQty = $qty + (int)$adjust;
            $arrCart[$id] = $newQty;

        }
    }
    $_SESSION['shoppingCart'] = $arrCart;
    echo $newQty;

}

function removeItem()
{
    global $bookID;
    global $arrCart;

    foreach ($arrCart as $id => $qty)
    {
        if ($id == $bookID)
        {
            unset($arrCart[$id]);
        }
    }
    $_SESSION['shoppingCart'] = $arrCart;
}