<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */


require_once (dirname(__FILE__).'/../functions/business.inc.php');

$business = new Business();

$categories = $business->getAllCategories();
while ($category = $categories->fetch_assoc())
{
    $categoryList[] = '<option value="'.$category['CategoryID'].'">'.$category['CategoryName'].'</option>';
}

$suppliers = $business->getAllSuppliers();
while ($supplier = $suppliers->fetch_assoc())
{
    $supplierList[] = '<option value="'.$supplier['SupplierID'].'">'.$supplier['SupplierName'].'</option>';
}

if (isset($_POST['txtBookName'], $_POST['ddlCategory'], $_POST['ddlSupplier'], $_POST['txtPrice'], $_POST['txtDescription']))
{


    $bookName = $_POST['txtBookName'];
    $categoryID = (int)$_POST['ddlCategory'];
    $supplierID = (int)$_POST['ddlSupplier'];
    $price = (float)$_POST['txtPrice'];
    $description = $_POST['txtDescription'];
    $imagePath = '../images/books/'.$_FILES['filBookImage']['name'];
    if (!isset($_FILES['filBookImage']))
    {
        $imagePath = '../images/books/imagePlaceHolder.png';
    }
    move_uploaded_file($_FILES['filBookImage']['tmp_name'], $imagePath);

    if ($business->addBook($bookName, $description, $price, $imagePath, $categoryID, $supplierID))
    {
        echo "<script>alert('Book has been added successfully.');</script>";
    }

}
?>
<h2>Create Book</h2>
<form id="frmMain" method="post" enctype="multipart/form-data" action="">
    <div class="col-md-8">
        <div class="form-group row">
            <label class="control-label col-md-3" for="txtBookName">Book Name:</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="txtBookName" name="txtBookName" />
            </div>
            <div class="col-md-4 validation-alert">*</div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3" for="filBookImage">Image:</label>
            <div class="col-md-5">
                <input type="file" class="img-upload" name="filBookImage" id="filBookImage" onchange="loadBagImage(this)">
            </div>
            <div class="col-md-4 validation-alert">*</div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3" for="ddlCategory">Category:</label>
            <div class="col-md-5">
                <select class="form-control" id="ddlCategory" name="ddlCategory">
                    <?php echo join('', $categoryList);?>
                </select>
            </div>
            <div class="col-md-4 validation-alert">*</div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3" for="ddlSupplier">Supplier:</label>
            <div class="col-md-5">
                <select class="form-control" id="ddlSupplier" name="ddlSupplier">
                    <?php echo join('', $supplierList);?>
                </select>
            </div>
            <div class="col-md-4 validation-alert">*</div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3" for="txtPrice">Price:</label>
            <div class="col-md-5 div-input">
                <input type="text" class="form-control" id="txtPrice" name="txtPrice" />
            </div>
            <div class="col-md-4 validation-alert">*</div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3" for="txtDescription">Description:</label>
            <div class="col-md-5 div-input">
                <input type="text" id="txtDescription" class="form-control" name="txtDescription">
            </div>
            <div class="col-md-4 validation-alert">*</div>
        </div>
        <div class="col-md-offset-5 col-md-7 validation-alert" id="validationResult"></div>
        <div class="col-md-offset-5">
            <input type="button" class="btn btn-default" id="btnSaveBook" value="Save" onclick="btnSaveBook_OnClick()" />
            <input type="button" class="btn btn-default" id="btnCancel" value="Cancel" onclick="backToBookManagement()" />
        </div>
    </div>
    <div class="col-md-4" id="imgBook">
        <img class="Book-thumbnail" id="BookImage" src="../images/imagePlaceHolder.png" />
    </div>
</form>

