<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 18:50
 */

require_once (dirname(__FILE__).'/../functions/business.inc.php');

if (isset($_POST['userID']))
{
    $userID = $_POST['userID'];
}
if (isset($_POST['enabled']))
{
    $enabled = $_POST['enabled'];
}

$business = new Business();

if ($business->disableAccount($userID, $enabled))
{
    echo true;
}
else
{
    echo false;
}