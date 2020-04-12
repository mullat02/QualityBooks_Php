/**
 * Created by mann on 19/10/19.
 */

/**
 * Check whether a textbox is empty
 * @param controlName
 * @returns {boolean}
 * @constructor
 */
function IsEmpty(controlName) {
    if (controlName.value == null || controlName.value == "") {
        return true;
    }
    else {
        return false;
    }
}

/**
 * Check whether a string is a number
 * @param str
 * @returns {boolean}
 * @constructor
 */
function IsNumber(str) {
    var regEx = /^[0-9]*$/;
    return regEx.test(str);
}

/**
 * Check whether a string follows email format
 * @param str
 * @returns {boolean}
 * @constructor
 */
function IsEmail(str) {
    var regEx = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    return regEx.test(str);
}

/**
 * Check whether user last name is empty. If empty, pop an alert.
 * @param ctrlLastName
 * @returns {boolean}
 * @constructor
 */
function ValidateLastName(ctrlLastName) {
    if(IsEmpty(ctrlLastName)){
        document.getElementById("lblLastNameAlert").innerHTML = "&lowast; Last name cannot be empty.";
        ctrlLastName.style = "background-color: #ffff99";
        ctrlLastName.focus();
        return false;
    }
    else {
        ctrlLastName.style = "background-color: none";
        document.getElementById("lblLastNameAlert").innerHTML = "&lowast;";
        return true;
    }
}

/**
 * Check whether user first name is empty. If empty, pop an alert.
 * @param ctrlFirstName
 * @returns {boolean}
 * @constructor
 */
function ValidateFirstName(ctrlFirstName) {
    if(IsEmpty(ctrlFirstName)){
        document.getElementById("lblFirstNameAlert").innerHTML = "&lowast; First name cannot be empty.";
        ctrlFirstName.style = "background-color: #ffff99";
        ctrlFirstName.focus();
        return false;
    }
    else {
        ctrlFirstName.style = "background-color: none";
        document.getElementById("lblFirstNameAlert").innerHTML = "&lowast;";
        return true;
    }
}

/**
 * Check whether password is empty. If empty, pop an alert.
 * @param ctrlPassword
 * @returns {boolean}
 * @constructor
 */
function ValidatePassword(ctrlPassword) {
    if (ctrlPassword.value == null || ctrlPassword.value == "") {
        document.getElementById("lblPwdAlert").innerHTML = "&lowast; Password cannot be empty.";
        ctrlPassword.style = "background-color: #ffff99";
        ctrlPassword.focus();
        return false;
    }
    else {
        ctrlPassword.style = "background-color: none";
        document.getElementById("lblPwdAlert").innerHTML = "&lowast;";
        return true;
    }
}

/**
 * Check whether confirm password matches password. If no, pop an alert.
 * @param ctrlPswConfirm
 * @param ctrlPassword
 * @returns {boolean}
 * @constructor
 */
function ValidateConfirmPassword(ctrlPswConfirm, ctrlPassword) {
    if (ctrlPswConfirm.value != ctrlPassword.value) {
        document.getElementById("lblPwdConfirmAlert").innerHTML = "&lowast; Password doesn't match. Please enter the same password.";
        ctrlPswConfirm.style = "background-color: #ffff99";
        ctrlPswConfirm.focus();
        return false;
    }
    else {
        ctrlPswConfirm.style = "background-color: none";
        document.getElementById("lblPwdConfirmAlert").innerHTML = "&lowast;";
        return true;
    }
}

/**
 * Check whether all contact numbers are empty. If all are empty, pop an alert
 * @param ctrlPhoneHome
 * @param ctrlPhoneWork
 * @param ctrlMobile
 * @returns {boolean}
 * @constructor
 */
function ValidateContact(ctrlMobile, ctrlPhoneHome, ctrlPhoneWork) {

    if ((ctrlMobile.value == null || ctrlMobile.value == "") &&
        (ctrlPhoneHome.value == null || ctrlPhoneHome.value == "") &&
        (ctrlPhoneWork.value == null || ctrlPhoneWork.value == "")) {

        document.getElementById("lblPhoneHomeAlert").innerHTML = "&lowast; Please provide at least one contact number.";
        ctrlMobile.style = "background-color: #ffff99";
        ctrlPhoneHome.style = "background-color: #ffff99";
        ctrlPhoneWork.style = "background-color: #ffff99";
        ctrlPhoneHome.focus();
        return false;
    }
    if (!IsNumber(ctrlPhoneHome.value)) {
        document.getElementById("lblPhoneHomeAlert").innerHTML = "&lowast; Phone number must be a number.";
        ctrlPhoneHome.style = "background-color: #ffff99";
        ctrlPhoneHome.focus();
        return false;
    }
    else {
        ctrlPhoneHome.style = "background-color: none";
        document.getElementById("lblPhoneHomeAlert").innerHTML = "";
    }
    if (!IsNumber(ctrlPhoneWork.value)) {
        document.getElementById("lblPhoneWorkAlert").innerHTML = "&lowast; Phone number must be a number.";
        ctrlPhoneWork.style = "background-color: #ffff99";
        ctrlPhoneWork.focus();
        return false;
    }
    else {
        ctrlPhoneWork.style = "background-color: none";
        document.getElementById("lblPhoneWorkAlert").innerHTML = "";
    }
    if (!IsNumber(ctrlMobile.value)) {
        document.getElementById("lblMobileAlert").innerHTML = "&lowast; Mobile number must be a number.";
        ctrlMobile.style = "background-color: #ffff99";
        ctrlMobile.focus();
        return false;
    }
    else {
        ctrlPhoneHome.style = "background-color: none";
        ctrlPhoneWork.style = "background-color: none";
        ctrlMobile.style = "background-color: none";
        document.getElementById("lblPhoneHomeAlert").innerHTML = "";
        document.getElementById("lblPhoneWorkAlert").innerHTML = "";
        document.getElementById("lblMobileAlert").innerHTML = "";
        return true;
    }
}

/**
 * Validate email. If the email is empty or doesn't follow email format, pop an alert
 * @param ctrlEmail
 * @returns {boolean}
 * @constructor
 */
function ValidateEmail(ctrlEmail) {
    if (ctrlEmail.value == null || ctrlEmail.value == "") {
        document.getElementById("lblEmailAlert").innerHTML = "&lowast; Email cannot be empty.";
        ctrlEmail.style = "background-color: #ffff99";
        ctrlEmail.focus();
        return false;
    }
    if (!IsEmail(ctrlEmail.value)) {
        document.getElementById("lblEmailAlert").innerHTML = "&lowast; Email format is invalid.";
        ctrlEmail.style = "background-color: #ffff99";
        ctrlEmail.focus();
        return false;
    }
    else {
        ctrlEmail.style = "background-color: none";
        document.getElementById("lblEmailAlert").innerHTML = "&lowast;";
        return true;
    }
}

/**
 * Validate registration form before submission.
 * @returns {boolean}
 */
function btnRegister_OnClick() {
    var txtEmail = document.getElementById("txtEmail");
    if (!ValidateEmail(txtEmail)) {
        return false;
    }

    var txtPassword = document.getElementById("txtPassword");
    if (!ValidatePassword(txtPassword)) {
        return false;
    }

    var txtPswConfirm = document.getElementById("txtPswConfirm");
    if (!ValidateConfirmPassword(txtPswConfirm, txtPassword)) {
        return false;
    }

    var txtLastName = document.getElementById("txtLastName");
    if (!ValidateLastName(txtLastName)) {
        return false;
    }

    var txtFirstName = document.getElementById("txtFirstName");
    if (!ValidateFirstName(txtFirstName)) {
        return false;
    }

    var txtPhoneHome = document.getElementById("txtPhoneHome");
    var txtPhoneWork = document.getElementById("txtPhoneWork");
    var txtMobile = document.getElementById("txtMobile");

    if (!ValidateContact(txtMobile, txtPhoneHome, txtPhoneWork)) {
        return false;
    }

    var txtAddress = document.getElementById("txtAddress");

    $.ajax({
        url: "/wangc95/php_assignment/scripts/registerProcess.php",
        type: "POST",
        data: {
            'email': txtEmail.value,
            'password': txtPassword.value,
            'lastName': txtLastName.value,
            'firstName': txtFirstName.value,
            'mobile': txtMobile.value,
            'homePhone': txtPhoneHome.value,
            'workPhone': txtPhoneWork.value,
            'address': txtAddress.value
        },
        success: function (result) {
            switch (result)
            {
                case 'user exists':
                    $("#lblEmailAlert").text("* This email has been used. Please use another email address.");
                    break;
                case 'register failed':
                    alert('Sorry, registration failed.');
                    break;
                default:
                    document.getElementById("frmMain").submit();
                    break;
            }
        }
    });
}

/**
 * Check user login and display a message if login failed.
 * @returns {boolean}
 */
function btnLogin_OnClick() {
    var txtEmail = document.getElementById("txtEmail");
    if (!ValidateEmail(txtEmail)) {
        return false;
    }

    var txtPassword = document.getElementById("txtPassword");
    if (!ValidatePassword(txtPassword)) {
        return false;
    }

    $.ajax({
        url: "/wangc95/php_assignment/scripts/loginProcess.php",
        type: "POST",
        data: {
            'email': txtEmail.value,
            'password': txtPassword.value
        },
        success: function (result) {
            switch (result)
            {
                case 'wrong password':
                    LoginAlert('Wrong email and/or password. Please try again.');
                    break;
                case 'not exist':
                    LoginAlert("This email address doesn't exist.");
                    break;
                case 'disabled':
                    LoginAlert("Sorry, your account has been disabled. Please contact website administrator.");
                    break;
                default:
                    if (txtEmail.value == 'admin@qualitybooks.co.nz')
                    {
                        window.location.href = "../admin/Admin.php?page=BookManagement";
                    }
                    else
                    {
                        document.getElementById("frmMain").submit();
                        window.location.href = "../account/Account.php?page=Profile";
                    }
                    break;
            }
        }
    });

}

/**
 * Display an alert message in the page.
 * @param message
 * @constructor
 */
function LoginAlert(message) {
    var alertMessage = '<div class="alert alert-danger">';
    alertMessage += '<a href="#" class="close" data-dismiss="alert" aria-label="close"></a>';
    alertMessage += message;
    alertMessage += '</div>';
    $("#loginFailAlert").html(alertMessage);
}

/**
 * Input validation when add new books.
 * @returns {boolean}
 * @constructor
 */
function ValidateAddBook() {
    var bookName = document.getElementById("txtBookName");
    var bookCategory = document.getElementById("ddlCategory");
    var bookSupplier = document.getElementById("ddlSupplier");
    var bookPrice = document.getElementById("txtPrice");
    var bookDescription = document.getElementById("txtDescription");

    if (IsEmpty(bookName) || IsEmpty(bookCategory) || IsEmpty(bookSupplier) || IsEmpty(bookPrice) || IsEmpty(bookDescription)) {
        document.getElementById("validationResult").innerHTML = "Please fill in all the Fields.";
        return false;
    }
    else {
        document.getElementById("validationResult").innerHTML = "";
        return true;
    }
}

/**
 * Submit add book form after validation
 * @returns {boolean}
 */
function btnSaveBook_OnClick() {
    if (!ValidateAddBook()) {
        return false;
    }
    else {
        document.getElementById("frmMain").submit();
    }
}



/**
 * Check whether supplier name is empty. If empty, pop an alert.
 * @param ctrlSupplierName
 * @returns {boolean}
 * @constructor
 */
function ValidateSupplierName(ctrlSupplierName) {
    if(IsEmpty(ctrlSupplierName)){
        document.getElementById("lblSupplierNameAlert").innerHTML = "&lowast; Supplier name cannot be empty.";
        ctrlSupplierName.style = "background-color: #ffff99";
        ctrlSupplierName.focus();
        return false;
    }
    else {
        ctrlSupplierName.style = "background-color: none";
        document.getElementById("lblSupplierNameAlert").innerHTML = "&lowast;";
        return true;
    }
}

/**
 * Validate add supplier form and submit after validation
 * @returns {boolean}
 */
function btnSaveSupplier_OnClick() {

    var txtSupplierName = document.getElementById("txtSupplierName");
    if (!ValidateSupplierName(txtSupplierName)) {
        return false;
    }

    var txtEmail = document.getElementById("txtEmail");
    if (!ValidateEmail(txtEmail)) {
        return false;
    }

    var txtMobile = document.getElementById("txtMobile");
    var txtPhoneHome = document.getElementById("txtPhoneHome");
    var txtPhoneWork = document.getElementById("txtPhoneWork");

    if (!ValidateContact(txtMobile, txtPhoneHome, txtPhoneWork)) {
        return false;
    }

    $.ajax({
        url: "/mannh04/QualityBooks_Php/admin/AddSupplierProcess.php",
        type: "POST",
        data: {
            'supplierName': txtSupplierName.value,
            'email': txtEmail.value,
            'mobile': txtMobile.value,
            'homePhone': txtPhoneHome.value,
            'workPhone': txtPhoneWork.value
        },
        success: function (result) {
            switch (result)
            {
                case 'Creation failed':
                    alert('Sorry, Supplier creation failed.');
                    break;
                default:
                    document.getElementById("frmMain").submit();
                    break;
            }
        }
    });
}


/**
 * Check whether category name is empty. If empty, pop an alert.
 * @param ctrlCategoryName
 * @returns {boolean}
 * @constructor
 */
function ValidateCategoryName(ctrlCategoryName) {
    if(IsEmpty(ctrlCategoryName)){
        document.getElementById("lblCategoryAlert").innerHTML = "&lowast; Category name cannot be empty.";
        ctrlCategoryName.style = "background-color: #ffff99";
        ctrlCategoryName.focus();
        return false;
    }
    else {
        ctrlCategoryName.style = "background-color: none";
        document.getElementById("lblCategoryAlert").innerHTML = "&lowast;";
        return true;
    }
}

/**
 * Validate add category form and submit after validation
 * @returns {boolean}
 */
function btnSaveCategory_OnClick() {
    var txtCategory = document.getElementById("txtCategory");
    if (!ValidateCategoryName(txtCategory)) {
        return false;
    }

    $.ajax({
        url: "/mannh04/QualityBooks_Php/admin/AddCategoryProcess.php",
        type: "POST",
        data: {
            'categoryName': txtCategory.value
        },
        success: function (result) {
            switch (result)
            {
                case 'Creation failed':
                    alert('Sorry, Category creation failed.');
                    break;
                case 'Duplicate':
                    alert('Add category failed: the category has already existed.');
                    break;
                default:
                    document.getElementById("frmMain").submit();
                    break;
            }
        }
    });

}