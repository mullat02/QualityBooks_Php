/**
 * Created by Mann on 19/10/19.
 */

/**
 * Load book image and preview in page.
 * @param input
 */
function loadBookImage(input) {
    if (typeof (FileReader) != "undefined") {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#bookImage").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
    else {
        alert("Sorry, your browser cannot support image preview.");
    }
}

/**
 * Redirect to book management page
 */
function backToBookManagement() {
    window.location.href = "Admin.php?page=BookManagement";
}

/**
 * Add a book to the shopping cart and update items quantity displayed in the page
 * @param bookID
 */
function addToCart(bookID) {
    $.ajax({
        url: "/mannh04/QualityBooks_Php/scripts/addCart.php",
        type: "POST",
        data: {'bookID': bookID},
        success: function (result) {
            var currentQty = parseInt($("#cartQty").text());
            $("#cartQty").text(currentQty + 1);
            $("#cartQtySide").text(currentQty + 1);
            location.reload();
        }
    });
}

/**
 * Update the quantity of a given book in the shopping cart
 * @param bookID
 * @param qty
 */
function updateCartQty(bookID, qty) {
    $.ajax({
        url: "/mannh04/QyalityBooks_php/scripts/updateCart.php",
        type: "POST",
        data: {
            'bookID': bookID,
            'adjust': qty,
            'action': 'changeQuantity'
        },
        success: function (result) {
            if (result != 'fail')
            {
                location.reload();
            }
            else
            {
                alert(result);
            }
        }
    });
}

/**
 * Remove an item in the shopping cart
 * @param bookID
 */
function removeCartItem(bookID) {
    $.ajax({
        url: "/mannh04/QualityBooks_php/scripts/updateCart.php",
        type: "POST",
        data: {
            'bookID': bookID,
            'action': 'removeItem'
        },
        success: function () {
            location.reload();
        }
    });
}

/**
 * Clear shopping cart
 */
function clearCart() {
    $.ajax({
        url: "/mannh04/QualityBooks_Php/scripts/updateCart.php",
        type: "POST",
        data: {
            'action': 'clearCart'
        },
        success: function () {
            location.reload();
        }
    });
}

/**
 * Check whether the shopping cart is empty when check out
 */
function checkOut() {
    location.href = "../shopping/CartCheckOut.php";
}

/**
 * Disable or enable a user account
 * @param userID
 * @param email
 * @param enabled
 */
function disableAccount(userID, email, enabled) {
    $.ajax({
        url: "/wangc95/php_assignment/scripts/disableAccount.php",
        type: "POST",
        data: {'userID': userID,
            'enabled': enabled},
        success: function (success) {
            if (success)
            {
                if (enabled)
                {
                    alert(email + ' has been disabled.');
                }
                else
                {
                    alert(email + ' has been enabled');
                }
            }
            else
            {
                if (enabled)
                {
                    alert('Disable ' + email + ' failed.');
                }
                else
                {
                    alert('Enable ' + email + ' failed.');
                }

            }
            location.reload();
        }
    });
}

/**
 * Redirect to add book page
 */
function navToAddBook() {
    location.href = 'Admin.php?page=AddBook';
}

/**
 * Change status of a given order
 * @param orderID
 */
function changeOrderStatus(orderID) {
    var buttonID = "#btn" + orderID;
    $(buttonID).disabled = false;
}

/**
 * Update status of a given order
 * @param orderID
 */
function updateOrderStatus(orderID) {
    var selectElementID = "select" + orderID;
    var ddlStatus = document.getElementById(selectElementID);
    var newStatus = ddlStatus.options[ddlStatus.selectedIndex].value;

    $.ajax({
        url: "/mannh04/QualityBooks_Php/scripts/updateOrderStatus.php",
        type: "POST",
        data: {
            'orderID': orderID,
            'newStatus': newStatus
        },
        success: function (result) {
            if (result == 'success')
            {
                alert('Order status has been updated successfully.');
                var buttonID = "#btn" + orderID;
                $(buttonID).disabled = true;
            }
            else
            {
                alert('Order status update failed. Please try again');
                location.reload();
            }
        }
    })
}