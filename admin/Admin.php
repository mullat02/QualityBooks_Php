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
    $page_content = 'BookManagement.php';
    $page_title = 'Book Management - Quality Books';
}


include ('../structure/Main.php');