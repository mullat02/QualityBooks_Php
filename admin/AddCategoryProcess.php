<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */

if(!isset($_SESSION))
{
    session_start();
}
require_once(dirname(__FILE__) . '/../functions/business.inc.php');

$business = new Business();

$categoryName = $_POST['categoryName'];

if ($business->isCategoryExist($categoryName))
{
    echo 'Duplicate';
}
else if ($business->addCategory($categoryName))
{
    echo 'success';
}
else
{
    echo 'Creation failed';
    exit;
}


