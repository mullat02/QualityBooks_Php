<?php
/**
 * Created by PhpStorm.
 * User: Mulla Tasnim
 * Date: 19/10/2019
 * Time: 01:06
 */


require_once (dirname(__FILE__).'/../functions/business.inc.php');


$business = new Business();
$users = $business->getAllUsers();

while ($user = $users->fetch_assoc())
{

    if ($user['Enabled'])
    {
        $enabled = 'checked';
    }
    else
    {
        $enabled = '';
    }
    if($user['UserID'] != 1){
        $customerList[] = '<tr>';
        $customerList[] = '<td>'.$user['UserID'].'</td>';
        $customerList[] = '<td>'.$user['Email'].'</td>';
        $customerList[] = '<td>'.$user['LastName'].'</td>';
        $customerList[] = '<td>'.$user['FirstName'].'</td>';
        

        $customerList[] = '<td><input type="checkbox" onchange="disableAccount('.$user['UserID'].', '."'".$user['Email']."'".', '.$user['Enabled'].')" '.$enabled.'></td>';
        $customerList[] = '</tr>';
    }

}

?>
<h2>Account Management</h2>
<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            
            <th scope="col">Enabled</th>
        </tr>
        </thead>
        <tbody>
        <?php echo join('', $customerList);?>
        </tbody>
    </table>
</div>


