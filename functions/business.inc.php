<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */


//Include data layer
require_once (dirname(__FILE__).'/data.inc.php');

/**
 * Class Business
 * Provide functions which are available for web pages.
 */
class Business
{
    /**
     * @var Data
     */
    var $data;

    /**
     * Business constructor.
     * Initialize a data object.
     */
    function Business()
    {
        try
        {
            $this->data = new Data();
        }
        catch (mysqli_sql_exception $exception)
        {
            echo $exception;
        }
    }

    /**
     * Get a certain count of users from database with an offset number.
     * @param $from |the offset number
     * @param $count |the amount of users to be returned
     * @return bool|mysqli_result
     */
    function getUsers($from, $count)
    {
        return $this->data->getUsers($from, $count);
    }

    /**
     * Get all users.
     * @return bool|mysqli_result
     */
    function getAllUsers()
    {
        return $this->data->getAllUsers();
    }

    /**
     * Check whether the email exists in the 'user' table
     * @param $email
     * @return bool
     */
    function isUserExist($email)
    {
        $allUsers = $this->data->getAllUsers();
        while ($user = $allUsers->fetch_assoc())
        {
            if ($user['Email'] == $email)
            {
                return true;
            }
        }
        return false;
    }

    /**
     * Get a user with given user email.
     * @param $email
     * @return bool|mysqli_result
     */
    function getUserByEmail($email)
    {
        return $this->data->getUserByEmail($email);
    }

    /**
     * Save a new user to the database.
     * @param $email
     * @param $password
     * @param $lastName
     * @param $firstName
     * @param $mobile
     * @param $homePhone
     * @param $workPhone
     * @param $address
     * @return bool
     */
    function saveUser($email, $password, $lastName, $firstName, $mobile, $homePhone, $workPhone, $address)
    {
        $now = new DateTime();
        if ($this->data->insertUser($email, $password, $lastName, $firstName, $mobile, $homePhone, $workPhone, $address))
        {
            $data = ($now->format('Y-m-d H:i:s'))." Registration success. Your email address: $email\n";
            file_put_contents(dirname(__FILE__).'/../logs/log.txt', $data, FILE_APPEND | LOCK_EX);

            return true;
        }
        else
        {
            $data = ($now->format('Y-m-d H:i:s'))." Registration failed. Your email address: $email\n";
            file_put_contents(dirname(__FILE__).'/../logs/log.txt', $data, FILE_APPEND | LOCK_EX);
            return false;
        }
    }

    /**
     * Disable or enable a user account.
     * @param $userID
     * @param $enabled
     * @return bool|mysqli_result
     */
    function disableAccount($userID, $enabled)
    {
        if ($enabled)
        {
            $newStatus = 0;
        }
        else
        {
            $newStatus = 1;
        }
        return $this->data->updateUserStatus($userID, $newStatus);
    }

    /**
     * Send an email
     * @param $email
     * @param $password
     */
    function sendEmail($email, $password)
    {
        $subject = 'Registration notification from Quality Books';
        $message = "Thank you for your registration. Please remember you registered email and password: \n\nEmail: $email\nPassword: $password";
        $header = 'From: mullat02@myunitec.ac.nz';
        $status = mail($email, $subject, $message, $header);
        if (!$status)
        {
            $now = new DateTime();
            $data = ($now->format('Y-m-d H:i:s'))." Send email failed. Email: $email\n";
            file_put_contents(dirname(__FILE__).'/../logs/log.txt', $data, FILE_APPEND | LOCK_EX);
        }
    }

    /**
     * Check whether user email exists and matches password.
     * @param $email
     * @param $password
     * @return string
     */
    function validateLogin($email, $password)
    {
        if ($email == 'admin@qualitybooks.co.nz')
        {
            if ($password == 'P@ssw0rd')
                return 'success';
            else
                return 'wrong password';
        }
        else
        {
            $allUsers = $this->data->getAllUsers();
            while ($user = $allUsers->fetch_assoc())
            {
                if ($user['Email'] == $email)
                {
                    if ($user['Enabled'] == false)
                    {
                        return 'disabled';
                    }
                    if ($user['Password'] == $password)
                    {
                        return 'success';
                    }
                    else
                    {
                        return 'wrong password';
                    }
                }
            }
            return 'not exist';
        }
    }

    /**
     * Get user ID given email
     * @param $email
     * @return mixed
     */
    function getUserID($email)
    {
        $users = $this->data->getUserByEmail($email);
        $id = 0;
        while ($user = $users->fetch_assoc())
        {
            $id = $user['UserID'];
        }
        return $id;
    }

    /**
     * Get all the categories from database
     * @return bool|mysqli_result
     */
    function getAllCategories()
    {
        return $this->data->getAllCategories();
    }

    /**
     * Get a certain amount of categories from an offset number
     * @param $from
     * @param $count
     * @return bool|mysqli_result
     */
    function getCategories($from, $count)
    {
        return $this->data->getCategories($from, $count);
    }

    /**
     * Check whether given category name exists in the database
     * @param $categoryName
     * @return bool
     */
    function isCategoryExist($categoryName)
    {
        $allCategories = $this->data->getAllCategories();
        while ($category = $allCategories->fetch_assoc())
        {
            if ($category['CategoryName'] == $categoryName)
            {
                return true;
            }
        }
        return false;
    }

    /**
     * Add a new category to database
     * @param $categoryName
     * @return bool|mysqli_result
     */
    function addCategory($categoryName)
    {
        return $this->data->insertCategory($categoryName);
    }

    /**
     * Get category name by category ID
     * @param $categoryID
     * @return mixed
     */
    function getCategoryName($categoryID)
    {
        return $this->data->getCategoryName($categoryID);
    }

    /**
     * Get book by book ID
     * @param $bookID
     * @return bool|mysqli_result
     */
    function getBookByID($bookID)
    {
        return $this->data->getBookByID($bookID);
    }

    /**
     * Get book details by book ID
     * @param $bookID
     * @return bool|mysqli_result
     */
    function getBookDetails($bookID)
    {
        return $this->data->getBookDetails($bookID);
    }

    /**
     * Get a certain amount of books from an offset number
     * @param $from
     * @param $count
     * @return bool|mysqli_result
     */
    function getBooks($from, $count)
    {
        return $this->data->getBooks($from, $count);
    }

    /**
     * Get a certain amount of books of given category from an offset number
     * @param $categoryID
     * @param $from
     * @param $count
     * @return bool|mysqli_result
     */
    function getBooksByCategory($categoryID, $from, $count)
    {
        if ($categoryID == 'All')
        {
            return $this->data->getBooks($from, $count);
        }
        else
        {
            return $this->data->getBooksByCategory($categoryID, $from, $count);
        }
    }

    /**
     * Get total quantity of all the books
     * @return int
     */
    function getBooksQuantity()
    {
        return mysqli_num_rows($this->data->getAllBooks());
    }

    /**
     * Get total quantity of book of a given category
     * @param $categoryID
     * @return int
     */
    function getBooksQuantityByCategory($categoryID)
    {
        if ($categoryID == 'All')
        {
            return $this->getBooksQuantity();
        }
        else
        {
            return mysqli_num_rows($this->data->getBooksByCategory($categoryID));
        }
    }

    /**
     * Get the price of a given book
     * @param $bookID
     * @return mixed
     */
    function getBookPrice($bookID)
    {
        $books = $this->data->getBookByID($bookID);
        while ($book = $books->fetch_assoc())
        {
            $price = $book['Price'];
        }
        return $price;
    }

    /**
     * Save a new book to the database
     * @param $bookName
     * @param $supplierID
     * @param $categoryID
     * @param $price
     * @param $description
     * @param $imagePath
     * @return bool|mysqli_result
     */
    function addBook($bookName, $description, $price, $imagePath, $categoryID, $supplierID)
    {
        return $this->data->insertBook($bookName, $description, $price, $imagePath, $categoryID, $supplierID);
    }

    /**
     * Get the name of given supplier
     * @param $supplierID
     * @return mixed
     */
    function getSupplierName($supplierID)
    {
        return $this->data->getSupplierName($supplierID);
    }

    /**
     * Get all suppliers
     * @return bool|mysqli_result
     */
    function getAllSuppliers()
    {
        return $this->data->getAllSuppliers();
    }

    /**
     * Save a new supplier to the database.
     * @param $supplierName
     * @param $email
     * @param $mobile
     * @param $homePhone
     * @param $workPhone
     * @return bool
     */
    function saveSupplier($supplierName, $email, $mobile, $homePhone, $workPhone)
    {
        return $this->data->insertSupplier($supplierName, $email, $mobile, $homePhone, $workPhone);
    }

    /**
     * Save a new order record to the database
     * @param $email
     * @param $subtotal
     * @param $GST
     * @param $grandTotal
     * @param $status
     * @return bool|mixed
     */
    function placeOrder($email, $subtotal, $GST, $grandTotal, $status)
    {
        $users = $this->data->getUserByEmail($email);
        $userID = null;
        while ($user = $users->fetch_assoc())
        {
            $userID = $user['UserID'];
        }
        return $this->data->insertOrder($userID, $subtotal, $GST, $grandTotal, $status);
    }

    /**
     * Get all the orders of a given user
     * @param $userID
     * @return bool|mysqli_result
     */
    function getOrderByUser($userID)
    {
        return $this->data->getOrdersByUser($userID);
    }

    /**
     * Get all orders
     * @return bool|mysqli_result
     */
    function getAllOrders()
    {
        return $this->data->getAllOrders();
    }

    /**
     * Save book ID and quantity of an order to database
     * @param $orderID
     * @param $bookID
     * @param $qty
     * @return bool|mysqli_result
     */
    function createOrderItem($orderID, $bookID, $qty)
    {
        return $this->data->insertOrderItem($orderID, $bookID, $qty);
    }

    /**
     * Update status of a given order
     * @param $orderID
     * @param $newStatus
     * @return bool|mysqli_result
     */
    function updateOrderStatus($orderID, $newStatus)
    {
//        $subject = 'Order status changed';
//        $message = "Thank you for your Purchase. Your order has been $newStatus.";
//        $header = 'From: mullat02@myunitec.ac.nz';
//        $status = mail($email, $subject, $message, $header);
//        if (!$status)
//        {
//            $now = new DateTime();
//            $data = ($now->format('Y-m-d H:i:s'))." Send email failed. Email: $email\n";
//            file_put_contents(dirname(__FILE__).'/../logs/log.txt', $data, FILE_APPEND | LOCK_EX);
//        }

        return $this->data->updateOrderStatus($orderID, $newStatus);
    }
}