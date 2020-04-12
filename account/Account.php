<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 * Purpose: The entry point for register, login and profile pages.
 */

if (isset($_GET['page']))
{
    $page_name = $_GET['page'];
    $page_content = $page_name.'.php';
    $page_title = $page_name.' - Quality Books';
}
elseif (isset($_POST['page']))
{
    $page_name = $_POST['page'];
    $page_content = $page_name.'.php';
    $page_title = $page_name.' - Quality Books';
}
else
{
    $page_content = 'Profile.php';
    $page_title = 'Profile - Quality Books';
}

include ('../structure/Main.php');