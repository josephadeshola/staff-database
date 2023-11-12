<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

    <?php
    require 'connection.php';
    session_start();
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $query = "SELECT * FROM mystaff WHERE email='$email'";
        $query = $dbconnection->query($query);
        if ($query->num_rows > 0) {

            $user = $query->fetch_assoc();
            // print_r ($user);
            $hashpassword = $user['password'];
            // print_r ($passwordhashed);
            $userid = $user['staff_id'];
            // print_r ($userid);
            $passwordverify = password_verify($password, $hashpassword);
            // echo $passwordverify;
    
            if ($passwordverify) {
                echo $userid;
                $_SESSION['staff_id'] = $userid;
                header('location:dashboard.php');
            } else {
                $_SESSION['msg'] = 'incorrect password';
            }

        } else {
            echo '<div class="alert alert-danger">Invalid Email Address</div>';
            // header('location:signin.php');
        }
    }
    ?>
    <style>
         body {
            background-color: #f0f0f0;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .getstyle{
            background-color: #f0f0f0; /* Same as body background color */
            border-radius: 20px;
            justify-content:space-between;
            box-shadow: 5px 5px 15px #b9b9b9, -5px -5px 15px #ffffff;
        }
    </style>

    <div  class="col-md-5 mx-auto px-2 my-5 getstyle  pb-3">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <h5 class="text-center">Login page</h5>
    <?php
    if (isset($_SESSION['msg'])) {
    echo '<div class="alert alert-danger text-center">' . $_SESSION['msg'] . '<div>';
    }
    ?>
    
    <input type="text" class="form-control mt-2 col-12 pb-1" name="email" placeholder="email">
    <input type="text" class="form-control mt-2 col-12 pb-1" name="password" placeholder="password">
    <input type="submit" class="btn w-100 btn-primary mt-2 pb-1" name="submit">
</form>
</div>
</body>
</html>