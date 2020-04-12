<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */

require_once(dirname(__FILE__) . '/../functions/business.inc.php');

$business = new Business();

$suppliers = $business->getAllSuppliers();
while ($supplier = $suppliers->fetch_assoc())
{
    $supplierList[] = '<tr>';
    $supplierList[] = '<td>'.$supplier['SupplierName'].'</td>';
    $supplierList[] = '<td>'.$supplier['Email'].'</td>';
    $supplierList[] = '<td>'.$supplier['Mobile'].'</td>';
    $supplierList[] = '<td>'.$supplier['HomePhone'].'</td>';
    $supplierList[] = '<td>'.$supplier['WorkPhone'].'</td>';
    $supplierList[] = '</tr>';
}

?>

<h2>Supplier Management</h2>
<hr>
<img class="maxwidth" src="<?php echo HTTP_DIR.'images/supplier.jpg';?>" height="300" width="220" />


<h4>Create a new supplier:</h4>
<form id="frmMain" class="form-horizontal" method="post" action="">

    <div class="form-group">
        <label class="col-md-2 control-label" for="txtSupplierName">Name</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="txtSupplierName" />
        </div>
        <div class="col-md-7 validation-alert" id="lblSupplierNameAlert">&lowast;</div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="txtEmail">Email Address</label>
        <div class="col-md-3">
            <input type="email" class="form-control" id="txtEmail" />
        </div>
        <div class="col-md-7 validation-alert" id="lblEmailAlert">&lowast;</div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="txtMobile">Mobile Phone Number</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="txtMobile" />
        </div>
        <div class="col-md-7 validation-alert" id="lblMobileAlert"></div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="txtPhoneHome">Home Phone Number</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="txtPhoneHome" />
        </div>
        <div class="col-md-7 validation-alert" id="lblPhoneHomeAlert"></div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="txtPhoneWork">Work Phone Number</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="txtPhoneWork" />
        </div>
        <div class="col-md-7 validation-alert" id="lblPhoneWorkAlert"></div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input type="button" id="btnSaveSupplier" class="btn btn-default " value="Create" onclick="btnSaveSupplier_OnClick()" />
        </div>
    </div>
</form>

<br>
<h4>Supplier</h4>
<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email Address</th>
        <th>Mobile Phone Number</th>
        <th>Home Phone Number</th>
        <th>Work Phone Number</th>
    </tr>
    </thead>
    <tbody>
    <?php echo join('', $supplierList);?>
    </tbody>
</table>

