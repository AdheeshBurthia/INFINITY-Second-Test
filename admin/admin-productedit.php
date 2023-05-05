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
        #profileDisplay {
            border-radius: 5px;
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

                <h3 class="text-center">Update Product</h3><br>
                    <div class="form-group text-center">
                    <?php $path = '../assets/img/' . $row['photo']; ?>
                        <img src="<?php echo $path ?>" onclick="triggerClick()" id="profileDisplay"/>
                        <label for="profileImage">Select Product Image</label>
                        <input type="file" name="profilePicture" onchange="displayImage(this)" id="profileImage" style="display: none;">
                    </div>

                    <div class="form-group">
                        <label for="productname"><b>Name</b></label>
                        <input name="productname" id="productname" class="form-control" value="<?php echo $row['productname']; ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="description"><b>Description</b></label>
                        <textarea name="description" id="description" class="form-control" cols="20" rows="8"><?php echo $row['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price"><b>Price</b></label>
                        <input name="price" id="price" class="form-control" value="<?php echo $row['price']; ?>"></input>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Update Product" name="btnUpdateProduct" class="btn btn-primary btn-block">
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