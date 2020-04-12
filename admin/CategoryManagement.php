<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */

require_once(dirname(__FILE__) . '/../functions/business.inc.php');

$business = new Business();

$categories = $business->getAllCategories();
while ($category = $categories->fetch_assoc())
{
    $categoryList[] = '<tr>';
    $categoryList[] = '<td>'.$category['CategoryID'].'</td>';
    $categoryList[] = '<td>'.$category['CategoryName'].'</td>';
    $categoryList[] = '</tr>';
}

?>

<h2>Category Management</h2>
<hr>
<h4>Create a new category:</h4>

<form id="frmMain" class="form-horizontal" method="post" action="">
    <div class="form-group">
        <label class="col-md-2 control-label" for="txtCategory">Name</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="txtCategory" />
        </div>
        <div class="col-md-7 validation-alert" id="lblCategoryAlert">&lowast;</div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input type="button" id="btnAddCategory" class="btn btn-default " value="Create" onclick="btnSaveCategory_OnClick()" />
        </div>
    </div>
</form>
<br>
<h4>Category</h4>
<div class="col-md-6">
    <table class="table">
        <thead>
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
        </tr>
        </thead>
        <tbody>
            <?php echo join('', $categoryList);?>
        </tbody>
    </table>
</div>
