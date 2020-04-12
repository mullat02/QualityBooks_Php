<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 22:28
 * Purpose:
 */

if(!isset($_SESSION))
{
    session_start();
}

$page_title = 'Home - Quality Books';
$page_content = 'Home.php';

include ('structure/Main.php');
