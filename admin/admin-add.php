<?php
    session_start();
    require_once '../includes/conn.php';
    require_once '../includes/adminfunction.php';
    require_once '../includes/admincontrol.php';

    if((!isset($_SESSION["authentication"])) || ($_SESSION["authentication"] == false) || ($_SESSION["usertype"] == 0)){
        header('Location:../home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <style>
        .forgot{
            text-align: right;
        }
        .logout{
            margin-top: -8px;
            padding-right: 41.8%;
            padding-left: 41.8%;
            background-color: var(--button-color);
        }
        .logout:hover{
            background-color: #811D14;
        }
    </style>
    <title>PROFILE | Rolex Watch</title>
</head>
<body>
    <a href="admin.php" class="close" title="Close">&times;</a>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <form method="post" enctype="multipart/form-data">

                <?php if(isset($Err)){ echo $Err; } ?>  

                <h3 class="text-center">New Profile</h3><br>
                    <div class="form-group text-center">
                    <?php $path = '../assets/userimage/placeholder.png' ?>
                        <img src="<?php echo $path ?>" onclick="triggerClick()" id="profileDisplay"/>
                        <label for="profileImage">Select Profile Picture</label>
                        <input type="file" name="profilePicture" onchange="displayImage(this)" id="profileImage" style="display: none;">
                    </div>

                    <div class="form-group">
                        <label for="fname"><b>Username</b></label>
                        <input name="username" id="fname" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="email"><b>Email</b></label>
                        <input name="email" id="email" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="password"><b>Password</b></label>
                        <input name="password" id="Password" class="form-control"></input>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Add New User" name="btnAddAdmin" class="btn btn-primary btn-block">
                    </div>

                </form> 
            </div>
        </div>
    </div>



    <!--=============== SWIPER JS ===============-->
    <script src="../assets/js/swiper-bundle.min.js"></script>
        
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/scripts.js"></script>  
</body>
</html>