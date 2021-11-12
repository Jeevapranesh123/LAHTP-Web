<pre>
<?php
require "function.php";
print_r($_POST);

if(isset($_POST['type']) && $_POST['type']=='signup'){
    $username=$_POST['Username'];
    $email =$_POST['Email'];
    $password=$_POST['Pass'];
    print_r($_POST);
    signup($username,$email,$password);

}

if(isset($_POST['type']) && $_POST['type']=='signin'){
    $email =$_POST['Email'];
    $password=$_POST['password'];
    print_r($_POST);
    login($email,$password);

}

if(isset($_POST['type']) && $_POST['type']=='otp'){
    $otp=$_POST['otp'];
    $email=$_POST['Email'];
    verify_otp($email,$otp);
}


?>
</pre>