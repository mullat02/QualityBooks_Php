<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 16:10
 * Purpose: Register a user and save into database
 */

if(!isset($_SESSION))
{
    session_start();
}
require_once (dirname(__FILE__).'/../functions/business.inc.php');

$business = new Business();

$email = $_POST['email'];
$password = $_POST['password'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$mobile = $_POST['mobile'];
$homePhone = $_POST['homePhone'];
$workPhone = $_POST['workPhone'];
$address = $_POST['address'];

if ($business->isUserExist($email))
{
    echo 'user exists';
    exit;
}

if ($business->saveUser($email, $password, $lastName, $firstName, $mobile, $homePhone, $workPhone, $address))
{
    $business->sendEmail($email, $password);

    $_SESSION['user'] = $email;
    $_SESSION['role'] = 'user';
    echo 'success';
}
else
{
    echo 'register failed';
    exit;
}