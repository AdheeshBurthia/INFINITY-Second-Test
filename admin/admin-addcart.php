<?php 
    session_start();
    require_once '../includes/conn.php';
    require_once '../includes/adminfunction.php';
    require_once '../includes/admincontrol.php';
    
    $userid = $_SESSION['admin-userid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
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
            padding-left: 118px;
            padding-right: 118px;
        }
        #dropdown{
            margin-top: 3px;
            width: 100%;
            height: 39px;
            border: 1px solid #ced4da;
            background-color: #fff;
            border-radius: 4px;
        }
        .form-div {
            margin-top: 200px;
        }
    </style>
    <title>ADMIN | Rolex Watch</title>
</head>
<body>
    <a href="admin-cart.php?action=admin-cart&QStrUserID=<?php echo $userid;?>" class="close" title="Close">&times;</a>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <form method="post" action="" enctype="multipart/form-data">

                <?php if(isset($Err)){ echo $Err; } ?>  

                <h3 class="text-center">New Cart</h3><br>

                    <div class="form-group">
                        <label for="productname"><b>Product </b></label><br>
                        <select name="productid" id="dropdown">
                        <option>  Choose a Product </option>
                            <?php                          
                                foreach ($listProducts as $row){
                                    echo "<option value ='".$row['productid']."' >".$row['productname']."</option>";
                                }
                            ?>       
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email"><b>Quantity</b></label>
                        <input type="number" name="quantity" id="email" class="form-control"></input>
                    </div>
                    
                    <div class="form-group">
                            <input type="submit" value="Add to cart" name="btnAddCart" class="btn btn-primary btn-block">
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