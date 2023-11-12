<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
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
    <div class="container">
        <div class="row">
                <div class="border px-3  getstyle col-md-8 col-12 pb-2 mt-4 mx-auto">
                    <h4 class="text-center">Staff Database</h4> 
                    <?php
                    session_start();
                
                    if (isset($_SESSION["msg"])) {
                        echo '
                        <div class="alert text-center alert-danger">' . $_SESSION['msg'] . '</div>';
                    }
                    session_unset();
                    ?> 
              

            <form action="submit.php" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="first-name" name="firstname" class="col-md-12 shadow form-control col-12 py-1 rounded border border-none bg-body-secondary mt-3 pb-2 ">
                    <input type="text" placeholder="last-name" name="lastname" class="col-md-12 shadow form-control col-12 py-1 rounded border border-none bg-body-secondary mt-3 pb-2 ">
                    <input type="text" placeholder="email" name="email" class="col-md-12 shadow form-control py-1 col-12 mt-3 rounded border border-none bg-body-secondary pb-2 ">
                    <input type="text" placeholder="password" name="password" class="col-md-12 shadow form-control py-1 col-12 rounded border border-none bg-body-secondary mt-3 pb-2 ">
                    <input type="text" placeholder="gender" name="gender" class="col-md-12 shadow form-control py-1 col-12 mt-3 rounded border border-none bg-body-secondary pb-2 ">
                    <input type="file" placeholder="choose image" name="profile_pic" class="col-md-12 shadow form-control py-1 col-12 mt-3 rounded border border-none bg-body-secondary pb-2 ">
                    <textarea name="address" id="" class="col-md-12 shadow form-control col-12 py-1 mt-3 rounded border border-none bg-body-secondary pb-3" cols="30" placeholder="Address" rows="4"></textarea>
                    <button type="submit" value="submit" name="submit" class="w-100 shadow form-control btn btn-primary mt-2">Save Data</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>