<?php
require 'connection.php';
session_start();
if (isset($_SESSION['staff_id'])) {
    $id = ($_SESSION['staff_id']);
    $query = "SELECT * FROM mystaff WHERE staff_id = $id";
    $querycon = $dbconnection->query($query);
    $user = $querycon->fetch_assoc();
    $profile = $user['profile_pic'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neumorphic Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background-color: #f0f0f0;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
            ul{
                display:flex;
            }
            ul li{
                list-style: none;  
            }
            ul  li a{
                text-decoration:none !important;

            }
        .nav-wrapper {
            background-color: #f0f0f0; 
            border-radius: 20px;
            padding: 6px;
            display:flex;
            justify-content:space-between;
            box-shadow: 5px 5px 15px #b9b9b9, -5px -5px 15px #ffffff;
        }
        .getusers{
            box-shadow: 5px 5px 15px #b9b9b9, -5px -5px 15px #ffffff;
            border-radius:20px;
            width:60%;
            padding:30px;
            margin:auto ;
        }
        .nav-pills .nav-item {
            margin-bottom: 10px;
        }

        .nav-pills .nav-link {
            background-color: #f0f0f0; Same as body background color
            color: #555;
            border-radius: 15px;
            padding: 10px 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .get-style{
            border:2px solid blue;
            padding:auto;
            height:70px;
            width:70px;
            border-radius:50px;
        }
    </style>
</head>
<body>

    <div class="nav-wrapper position-relative">
        <ul class="nav nav-pills nav-fill py-2 gap-2 flex-column flex-sm-row">
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="sign.php">Signup</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="signin.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="dashboard.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="#">Messages</a>
            </li>
        </ul>
        
        <div><img class="get-style" src=<?php echo "./images/$profile" ?> alt=""></div>
    </div>

    <div>
        <div class="getusers mt-5">
           <h6 class="text-center text-primary">STAFF DETAILS</h6>
        <P>STAFF_ID: <span class="float-end"><?php echo $user['staff_id'] ?></span></P>
           <hr class="text-primary">
           <P>FIRST-NAME: <span class="float-end"><?php echo $user['first_name'] ?></span></P>
           <hr class="text-primary">
           <P>LAST-NAME: <span class="float-end"><?php echo $user['last_name'] ?></span></P>
           <hr class="text-primary">
           <P>EMAIL: <span class="float-end"><?php echo $user['email'] ?></span></P>
           <hr class="text-primary">
           <P>GENDER: <span class="float-end"><?php echo $user['gender'] ?></span></P>
           <hr class="text-primary">
           <P>PASSWORD: <span class="float-end"><?php echo $user['password'] ?></span></P>
           <hr class="text-primary">
        </div>
    </div>
</body>
</html>

    
</body>
</html>