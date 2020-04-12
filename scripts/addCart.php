<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 21:53
 */

if(!isset($_SESSION))
{
    session_start();
}

if (isset($_POST['bookID']))
{

    $bagID = $_POST['bookID'];
    $itemExist = false;

    if (isset($_SESSION['shoppingCart']))
    {
        $arrCart = $_SESSION['shoppingCart'];
    }
    else
    {
        $arrCart = array();
    }
    if (isset($arrCart) && count($arrCart) != 0)
    {
        foreach ($arrCart as $id => $qty)
        {
            if ($id == $bookID)
            {
                $arrCart[$id]++;
                $itemExist = true;
            }
        }
    }

    if (!$itemExist)
    {
        $arrCart[$bagID] = 1;
    }

    $_SESSION['shoppingCart'] = $arrCart;
}

