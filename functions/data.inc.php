<?php
/**
 * Created by PhpStorm.
 * User: Tasnim Mulla
 * Date: 19/10/2019
 * Time: 10:43
 */


//Database connection credential
$db_host = 'localhost';
$db_username = 'MULLAT02';
$db_password = '12011992';
$db_name = 'mullat02mysql1';

/**
 * Class Data
 * Implement queries on database
 */
class Data
{
    /**
     * @var mysqli
     */
    var $db;

    /**
     * Data constructor.
     */
    function Data()
    {
        global $db_host;
        global $db_username;
        global $db_password;
        global $db_name;

        $this->db = new mysqli($db_host, $db_username, $db_password, $db_name);

        if ($this->db->errno)
        {
            echo 'Database connection failed.';
            exit($this->db->error);
        }
    }

    /**
     * Get all users
     * @return bool|mysqli_result
     */
    function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        $result = $this->db->query($sql);
        return $result;
    }

    /**
     * Get a certain amount of users from an offset number
     * @param $from
     * @param $count
     * @return bool|mysqli_result
     */
    function getUsers($from, $count)
    {
        $sql = "SELECT * FROM user LIMIT $from, $count";
        return $this->db->query($sql);
    }

    /**
     * Get user by user ID
     * @param $id
     * @return bool|mysqli_result
     */
    function getUserByID($id)
    {
        $sql = "SELECT * FROM user WHERE UserID = $id";
        $result = $this->db->query($sql);
        return $result;
    }

    /**
     * Get user by user email
     * @param $email
     * @return bool|mysqli_result
     */
    function getUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE Email = '$email'";
        return $this->db->query($sql);
    }

    /**
     * Insert a new user record to database
     * @param $email
     * @param $password
     * @param $lastName
     * @param $firstName
     * @param $mobile
     * @param $homePhone
     * @param $workPhone
     * @param $address
     * @return bool|mysqli_result
     */
    function insertUser($email, $password, $lastName, $firstName, $mobile, $homePhone, $workPhone, $address)
    {
        $sql = "INSERT INTO user(Email, Password, LastName, FirstName, Mobile, HomePhone, WorkPhone, Address) 
                VALUES ('$email', '$password', '$lastName', '$firstName', '$mobile', '$homePhone', '$workPhone', '$address')";
        return $this->db->query($sql);
    }

    /**
     * Update status of a given user
     * @param $userID
     * @param $newStatus
     * @return bool|mysqli_result
     */
    function updateUserStatus($userID, $newStatus)
    {
        $sql = "UPDATE user SET Enabled = $newStatus WHERE UserID = '$userID'";
        return $this->db->query($sql);
    }

    /**
     * Get all categories
     * @return bool|mysqli_result
     */
    function getAllCategories()
    {
        $sql = "SELECT * FROM category";
        return $this->db->query($sql);
    }

    /**
     * Get a certain amount of categories from an offset number
     * @param $from
     * @param $count
     * @return bool|mysqli_result
     */
    function getCategories($from, $count)
    {
        $sql = "SELECT * FROM category LIMIT $from, $count";
        return $this->db->query($sql);
    }

    /**
     * Insert a new category record to database
     * @param $categoryName
     * @return bool|mysqli_result
     */
    function insertCategory($categoryName)
    {
        $sql = "INSERT INTO category(CategoryName) VALUES ('$categoryName')";
        return $this->db->query($sql);
    }

    /**
     * Get the name of a given category
     * @param $categoryID
     * @return mixed
     */
    function getCategoryName($categoryID)
    {
        $sql = "SELECT * FROM category WHERE CategoryID = $categoryID";
        $result = $this->db->query($sql);
        while ($category = $result->fetch_assoc())
        {
            return $category['CategoryName'];
        }
    }

    /**
     * Get book by book ID
     * @param $bookID
     * @return bool|mysqli_result
     */
    function getBookByID($bookID)
    {
        $sql = "SELECT * FROM book WHERE BookID = $bookID";
        return $this->db->query($sql);
    }

    /**
     * Get book details information with category name and supplier name of a given book
     * @param $bookID
     * @return bool|mysqli_result
     */
    function getBookDetails($bookID)
    {
        $sql = "SELECT BookID, BookName, CategoryName, SupplierName, Price, Description, ImagePath 
                FROM book, category, supplier 
                WHERE book.BookID = $bookID 
                AND book.CategoryID = category.CategoryID 
                AND book.SupplierID = supplier.SupplierID";
        return $this->db->query($sql);
    }

    /**
     * Get a certain amount of books from an offset number
     * @param $from
     * @param $count
     * @return bool|mysqli_result
     */
    function getBooks($from, $count)
    {
        $sql = "SELECT * FROM book LIMIT $from, $count";
        return $this->db->query($sql);
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
        if (isset($from) && isset($count))
        {
            $sql = "SELECT * FROM book WHERE CategoryID = $categoryID LIMIT $from, $count";
        }
        else
        {
            $sql = "SELECT * FROM book WHERE CategoryID = $categoryID";
        }
        //$sql = "SELECT * FROM book WHERE CategoryID = $categoryID LIMIT $from, $count";
        return $this->db->query($sql);
    }

    /**
     * Get all books
     * @return bool|mysqli_result
     */
    function getAllBooks()
    {
        $sql = "SELECT * FROM book";
        return $this->db->query($sql);
    }

    /**
     * Insert a new book record to database
     * @param $bookName
     * @param $supplierID
     * @param $categoryID
     * @param $price
     * @param $description
     * @param $imagePath
     * @return bool|mysqli_result
     */
    function insertBook($bookName, $description, $price, $imagePath, $categoryID, $supplierID)
    {
        $sql = "INSERT INTO book(BookName, Description, Price, ImagePath, CategoryID, SupplierID) VALUES ('$bookName', '$description', $price, '$imagePath', $categoryID, $supplierID)";
        return $this->db->query($sql);
    }

    /**
     * Get the name of a given supplier
     * @param $supplierID
     * @return mixed
     */
    function getSupplierName($supplierID)
    {
        $sql = "SELECT * FROM supplier WHERE supplierID = $supplierID";
        $result = $this->db->query($sql);
        while ($supplier = $result->fetch_assoc())
        {
            return $supplier['SupplierName'];
        }
    }

    /**
     * Get all suppliers
     * @return bool|mysqli_result
     */
    function getAllSuppliers()
    {
        $sql = "SELECT * FROM supplier";
        return $this->db->query($sql);
    }

    /**
     * Insert a new supplier record to database
     * @param $supplierName
     * @param $email
     * @param $mobile
     * @param $homePhone
     * @param $workPhone
     * @return bool|mysqli_result
     */
    function insertSupplier($supplierName, $email, $mobile, $homePhone, $workPhone)
    {
        $sql = "INSERT INTO supplier(SupplierName, Email, Mobile, HomePhone, WorkPhone) 
                VALUES ('$supplierName', '$email', '$mobile', '$homePhone', '$workPhone')";
        return $this->db->query($sql);
    }

    /**
     * Insert a new order record to database
     * @param $customerID
     * @param $subtotal
     * @param $GST
     * @param $grandTotal
     * @param $status
     * @return bool|mixed
     */
    function insertOrder($customerID, $subtotal, $GST, $grandTotal, $status)
    {
        $sql = "INSERT INTO `order`(CustomerID, Subtotal, GST, GrandTotal, Status) VALUES ($customerID, $subtotal, $GST, $grandTotal, '$status')";

        if ($this->db->query($sql))
        {
            return $this->db->insert_id;
        }
        else{
            return false;
        }
    }

    /**
     * Get all the orders of a user
     * @param $userID
     * @return bool|mysqli_result
     */
    function getOrdersByUser($userID)
    {
        $sql = "SELECT * FROM `order` WHERE CustomerID = $userID";
        return $this->db->query($sql);
    }

    /**
     * Get the user of an order
     * @param $orderID
     * @return mixed
     */
    function getUserByOrder($orderID)
    {
        $sql = "SELECT * FROM `order` WHERE OrderID = $orderID";
        $result1 = $this->db->query($sql);
        while ($order = $result1->fetch_assoc())
        {
            $userID = $order['UserID'];
            $sql = "SELECT * FROM user WHERE UserID = $userID";
            $result2 = $this->db->query($sql);

            return $result2['UserName'];
        }
    }

    /**
     * Get all the orders
     * @return bool|mysqli_result
     */
    function getAllOrders()
    {
        $sql = "SELECT OrderID, Email, Subtotal, GST, GrandTotal, Status FROM `order`, `user` WHERE `order`.CustomerID = `user`.UserID";
        return $this->db->query($sql);
    }

    /**
     * Insert an order item record to a given order
     * @param $orderID
     * @param $itemID
     * @param $qty
     * @return bool|mysqli_result
     */
    function insertOrderItem($orderID, $itemID, $qty)
    {
        $sql = "INSERT INTO orderitem(OrderID, ItemID, Quantity) VALUES ($orderID, $itemID, $qty)";
        return $this->db->query($sql);
    }

    /**
     * Update status of a given order
     * @param $orderID
     * @param $newStatus
     * @return bool|mysqli_result
     */
    function updateOrderStatus($orderID, $newStatus)
    {
        $sql = "UPDATE `order` SET Status = '$newStatus' WHERE OrderID = $orderID";
        return $this->db->query($sql);
    }
}

