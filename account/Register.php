<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */
?>

<h2>Register.</h2>
<h4>Create a new account.</h4>
<hr />
<img class="maxwidth" src="<?php echo HTTP_DIR.'images/register.jpg';?>" height="300" width="220" />


<form id="frmMain" class="form-horizontal" method="post" action="Account.php?page=Profile">
    <div class="form-group">
        <label class="control-label col-md-2" for="txtEmail">Email</label>
        <div class="col-md-3">
            <input type="email" class="form-control" id="txtEmail" />
        </div>
        <div class="col-md-7 validation-alert" id="lblEmailAlert">&lowast;</div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="txtPassword">Password</label>
        <div class="col-md-3">
            <input type="password" class="form-control" id="txtPassword" />
        </div>
        <div class="col-md-7 validation-alert" id="lblPwdAlert">&lowast;</div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="txtPswConfirm">Confirm Password</label>
        <div class="col-md-3">
            <input type="password" class="form-control" id="txtPswConfirm" />
        </div>
        <div class="col-md-7 validation-alert" id="lblPwdConfirmAlert">&lowast;</div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="txtLastName">Last Name</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="txtLastName"  />
        </div>
        <div class="col-md-7 validation-alert" id="lblLastNameAlert">&lowast;</div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2" for="txtFirstName">First Name</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="txtFirstName"  />
        </div>
        <div class="col-md-7 validation-alert" id="lblFirstNameAlert">&lowast;</div>
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
        <label class="control-label col-md-2" for="txtAddress">Address</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="txtAddress" />
        </div>
    </div>
    <div class="form-group" id="lblFailureAlert">
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <input type="button" id="btnRegister" class="btn btn-default " value="Register" onclick="btnRegister_OnClick()" />
        </div>
    </div>
</form>