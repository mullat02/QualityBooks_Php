<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 22:27
 * Purpose: The main structure for every page
 */

if(!isset($_SESSION))
{
    session_start();
}

define('HTTP_DIR', 'http://herokuphpgithub.herokuapp.com/');

$pageName = basename($_SERVER['PHP_SELF'], '.php');
switch ($pageName)
{
    case 'index':
        $navHome = 'class="active"';
        break;
    case 'BookDetails':
    case 'Product':
        $navProduct = 'class="active"';
        break;
    case 'Contact':
        $navContact = 'class="active"';
        break;
    case 'About':
        $navAbout = 'class="active"';
        break;
    case 'Admin':
        $navAdmin = 'active"';
        break;
    case 'Account':
        switch ($_GET['page'])
        {
            case 'Register':
            case 'Profile':
                $navSignUp = 'class="active"';
                break;
            case 'Login':
                $navLogin = 'class="active"';
                break;
        }
        break;
    case 'ShoppingCart':
        $navShoppingCart ='class="active"';
        break;
    default:
        break;
}

//Get user authentication info and update page
if (isset($_SESSION['user']))
{
    $email = $_SESSION['user'];

}
if (isset($email) && $email != '')
{
    if (isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        header("Refresh:0");
        $profileLink = '<a href="'.HTTP_DIR.'account/Account.php?page=Register">Register</a>';
        $loginLink = '<a href="'.HTTP_DIR.'account/Account.php?page=Login">Log in</a>';
    }
    else
    {
        $profileLink = '<a href="'.HTTP_DIR.'account/Account.php?page=Profile"> Hello ' .$email.'!</a>';
        $loginLink = '<a href="'.HTTP_DIR.'account/Account.php?page=Login&action=logout">Logout</a>';
    }
}
else
{
    $profileLink = '<a href="'.HTTP_DIR.'account/Account.php?page=Register">Register</a>';
    $loginLink = '<a href="'.HTTP_DIR.'account/Account.php?page=Login">Log in</a>';
}

if($email == 'admin@qualitybooks.co.nz'){
    $_SESSION['adminList'] = '
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="'.HTTP_DIR.'admin/Admin.php?page=BookManagement">Book Management</a></li>
                        <li><a href="'.HTTP_DIR.'admin/Admin.php?page=CategoryManagement">Category Management</a></li>
                        <li><a href="'.HTTP_DIR.'admin/Admin.php?page=SupplierManagement">Supplier Management</a></li>
                        <li><a href="'.HTTP_DIR.'admin/Admin.php?page=OrderManagement">Order Management</a></li>
                        <li><a href="'.HTTP_DIR.'admin/Admin.php?page=AccountManagement">Account Management</a></li>
                    </ul>
                </li>
    ';
}
else{
    $_SESSION['adminList'] = null;
}



//Get item quantity in shopping cart and update page
$lblCartQuantity = 0;
if (isset($_SESSION['shoppingCart']))
{
    $arrCart = $_SESSION['shoppingCart'];
}
if (isset($arrCart) && count($arrCart) != 0)
{
    foreach ($arrCart as $value)
    {
        $lblCartQuantity += $value;
    }
}

?>
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title?></title>
    <link rel="stylesheet" href="http://herokuphpgithub.herokuapp.com//lib/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="http://herokuphpgithub.herokuapp.com//css/site.css" />
    <link rel="stylesheet" href="http://herokuphpgithub.herokuapp.com//css/myStyle.css" />
    <link rel="stylesheet" href="http://herokuphpgithub.herokuapp.com//lib/font-awesome/css/font-awesome.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="http://herokuphpgithub.herokuapp.com//favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" href="http://herokuphpgithub.herokuapp.com//favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="http://herokuphpgithub.herokuapp.com//favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="http://herokuphpgithub.herokuapp.com//favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="http://herokuphpgithub.herokuapp.com//favicon/manifest.json">
    <meta name="theme-color" content="#ffffff">
</head>
<body>

<!--Navigation area-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://herokuphpgithub.herokuapp.com//index.php" class="navbar-brand"><img style="max-height:28px" src="http://herokuphpgithub.herokuapp.com//images/QBlogo.png" alt="Quality Books" /></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li id="navHome" <?php echo $navHome;?>><a href="<?php echo HTTP_DIR.'index.php';?>">Home</a></li>
                <li id="navProduct" <?php echo $navProduct;?>><a href="<?php echo HTTP_DIR.'product/Product.php';?>">Product</a></li>
                <li id="navAbout" <?php echo $navAbout;?>><a href="<?php echo HTTP_DIR.'about/About.php';?>">About</a></li>
                <li id="navContact" <?php echo $navContact;?>><a href="<?php echo HTTP_DIR.'contact/Contact.php';?>">Contact</a></li>

                <?php echo $_SESSION['adminList'];?>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li id="navSignUp" <?php echo $navSignUp;?>><?php echo $profileLink;?></li>
                <li id="navLogin" <?php echo $navLogin;?>><?php echo $loginLink;?></li>
                <li id="navShoppingCart" <?php echo $navShoppingCart;?>>
                    <a id="cart-icon">
                        <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Shopping Cart&nbsp;<span class="badge qty-in-cart" id="cartQty"><?php echo $lblCartQuantity?></span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/mullat02/QualityBooks_Php/ShoppingCart.php');?><!--Shopping cart-->
</div>


<!--Content area-->
<div class="container body-content"><?php include ($page_content);?></div>
<br />
<br />
<br />
<br />
<!--Footer area-->
<?php include("Footer.php")?>

<script src="<?php echo HTTP_DIR.'lib/jquery/dist/jquery.js';?>"></script>
<script src="<?php echo HTTP_DIR.'lib/bootstrap/dist/js/bootstrap.js';?>"></script>
<script src="<?php echo HTTP_DIR.'js/validation.js';?>"></script>
<script src="<?php echo HTTP_DIR.'js/site.js';?>"></script>
<script>
    $(document).ready(function () {
        document.getElementById("cart-container").style.display = "none";

        $("#cart-icon").click(function(){
            $("#cart-container").slideToggle(500, function () {
            });
        })

    });

</script>
</body>
</html>