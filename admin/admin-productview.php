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
        .btn-block{
            padding-left: 187.5px;
            padding-right: 187.5px;
        }
        .text{
            padding-bottom: 6px;
        }
        .form-div {
            margin-top: 150px;
            border: 1px solid #e0e0e0;
            padding-top: 15px;
        }
    </style>
    <title>PROFILE | Rolex Watch</title>
</head>
<body>
    <a href="admin-products.php" class="close" title="Close">&times;</a>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-md-3 form-div">
                <form method="post" enctype="multipart/form-data">

                <?php if(isset($Err)){ echo $Err; } ?>

                <?php foreach($singleProduct as $row) { ?>

                <?php $_SESSION['admin-productimage'] = $row['photo']; ?>

                <h3 class="text-center"><?php echo $row['productname']; ?></h3><br>

                    <div class="form-group text">
                        <label for="description"><b>Description</b></label>
                        <textarea name="description" id="description" class="form-control" cols="20" rows="8" readonly><?php echo $row['description']; ?></textarea>
                    </div>

                    <?php } ?>

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