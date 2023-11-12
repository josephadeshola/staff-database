<?php

require 'connection.php';
session_start();
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $profile = $_FILES['profile_pic'];
    $address = $_POST['address'];
    $name = $_FILES['profile_pic']['name'];
    $temp = $_FILES['profile_pic']['tmp_name'];
    $newname = time() . $name;
    $movefile = move_uploaded_file($temp, 'images/' . $newname);
    if ($movefile) {
        $query = "SELECT * FROM mystaff WHERE email='$email'";
        $emailverify = $dbconnection->query($query);
        if ($emailverify->num_rows > 0) {
            $_SESSION["msg"] = "Email is already exist";
            header('location:sign.php');
        } else if (!($firstname) || !($lastname) || !($email) || !($password) || !($gender) || !($address)) {
            $_SESSION['msg'] = 'Please fill in all fields';
            header('location:sign.php');

        } else {
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
            $dbquery = "INSERT INTO mystaff (first_name, last_name, email, password, gender, address, profile_pic) VALUES ('$firstname','$lastname','$email','$hashpassword','$gender','$address' ,'$newname' )";
            $savedquery = $dbconnection->query($dbquery);
            if ($savedquery) {
                print_r($savedquery);
                echo 'done';
                header('location:signin.php');
            } else {
                echo 'not done';
                $_SESSION['msg'] = 'unsuccessful registration';
                header('location:sign.php');
            }
        }

    }
}
?>