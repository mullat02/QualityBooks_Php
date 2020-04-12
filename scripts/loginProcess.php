<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 16:07
 * Purpose: Validate username and password to login
 */

if(!isset($_SESSION))
{
    session_start();
}
require_once (dirname(__FILE__).'/../functions/business.inc.php');

$business = new Business();
$email = $_POST['email'];
$password = $_POST['password'];

$result = $business->validateLogin($email, $password);
if ($result == 'success')
{
    $_SESSION['user'] = $email;
    if ($email == 'admin@qualitybooks.co.nz')
    {
        $_SESSION['role'] = 'administrator';
    }
    else
    {
        $_SESSION['role'] = 'user';
    }
}
echo $result;