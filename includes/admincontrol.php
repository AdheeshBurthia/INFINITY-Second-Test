<?php
    $dbconn= new DBConn();
    $user = new Admin();
    $listUser = $user->retrieveUser($dbconn);
    $listAdmin = $user->retrieveAdmin($dbconn);
    $listProducts = $user->retrieveAllProducts($dbconn);
    $listMessage = $user->retrieveMessage($dbconn);

    if (isset($_GET['QStrUserID'])){
        $_SESSION['admin-userid'] = (int)($_GET['QStrUserID']);
        $retrieveCart = new Admin();
        $retrieveCart->setUserid($_SESSION['admin-userid']);
        $userCart = $retrieveCart->retrieveCart();

        $retrieveCart->setUserid($_SESSION['admin-userid']);
        $retrieveSingleUser = $retrieveCart->retrieveSingleUser();

        if (isset($_POST["btnUpdate"])){

            $_SESSION['admin-username'] = $_POST['username'];
            $_SESSION['admin-email'] = $_POST['email'];
    
            if((!empty($_SESSION['admin-username'])) && (!empty($_SESSION['admin-email']))){
    
                $filename = time() . '_' . $_FILES['profilePicture']['name'];
                $dest_path = '../assets/userimage/' . $filename;
    
                $user->setUsername($_SESSION['admin-username']);
                $user->setUseremail($_SESSION['admin-email']);
                $user->setUserid($_SESSION['admin-userid']);
    
                if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $dest_path )) {
                    $user->setUserimage($filename);
                    $_SESSION['admin-userimage'] = $filename;
                    $user->updateUser();
                    header('Location:admin-users.php');
                } else {
                    $user->setUserimage($_SESSION['admin-userimage']);
                    $user->updateUser();
                    header('Location:admin-users.php');
                }
            }else{
                $Err = "<div class='alertmsg'>Empty fields!</div>";
            }
        }
        if (isset($_POST["btnUpdateAdmin"])){

            $_SESSION['admin-username'] = $_POST['username'];
            $_SESSION['admin-email'] = $_POST['email'];
    
            if((!empty($_SESSION['admin-username'])) && (!empty($_SESSION['admin-email']))){
    
                $filename = time() . '_' . $_FILES['profilePicture']['name'];
                $dest_path = '../assets/userimage/' . $filename;
    
                $user->setUsername($_SESSION['admin-username']);
                $user->setUseremail($_SESSION['admin-email']);
                $user->setUserid($_SESSION['admin-userid']);
    
                if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $dest_path )) {
                    $user->setUserimage($filename);
                    $_SESSION['admin-userimage'] = $filename;
                    $user->updateUser();
                    header('Location:admin.php');
                } else {
                    $user->setUserimage($_SESSION['admin-userimage']);
                    $user->updateUser();
                    header('Location:admin.php');
                }
            }else{
                $Err = "<div class='alertmsg'>Empty fields!</div>";
            }
        }
        
    }

    if (isset($_POST["btnAddCart"])){
    
        $userid = $_SESSION['admin-userid'];
        $productid = $_POST['productid'];
        $quantity = $_POST['quantity'];

        $addCart = $user->addUserCart($userid, $productid, $quantity);
        header('location:admin-cart.php?action=admin-cart&QStrUserID='.$userid);
    }

    if (isset($_GET['QStrCartID'])){
        $_SESSION['admin-cartid'] = (int)($_GET['QStrCartID']);

        $retrieveCart = new Admin();
        $retrieveCart->setCartid($_SESSION['admin-cartid']);
        $userCart = $retrieveCart->retrieveUserCart();

        if (isset($_POST["btnUpdate"])){
            if(!empty($_POST['quantity'])){
                $retrieveCart->setCartid($_SESSION['admin-cartid']);
                $updateQuantity = $retrieveCart->updateQuantity($_POST['quantity']);
                $userCart = $retrieveCart->retrieveUserCart();
            }
        }
    }

    if (isset($_POST["btnAddUser"])){

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $filename = time() . '_' . $_FILES['profilePicture']['name'];
        $dest_path = '../assets/userimage/' . $filename;

        if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $dest_path )) {
            $user->addUser($filename, $_POST['username'], $_POST['email'], $password);
            header('Location:admin-users.php');
        } else {
            $user->addUser("placeholder.png", $_POST['username'], $_POST['email'], $password);
            header('Location:admin-users.php');
        }
    }

    if (isset($_POST["btnAddAdmin"])){

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $filename = time() . '_' . $_FILES['profilePicture']['name'];
        $dest_path = '../assets/userimage/' . $filename;

        if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $dest_path )) {
            $user->addAdmin($filename, $_POST['username'], $_POST['email'], $password);
            header('Location:admin-users.php');
        } else {
            $user->addAdmin("placeholder.png", $_POST['username'], $_POST['email'], $password);
            header('Location:admin.php');
        }
    }

    if (isset($_POST["btnAddProduct"])){

        $filename = time() . '_' . $_FILES['profilePicture']['name'];
        $dest_path = '../assets/img/' . $filename;

        $productname = $_POST['productname'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $photo = $filename;

        if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $dest_path )) {
            $user->addProduct($productname, $description, $price, $photo);
            header('Location:admin-products.php');
        } else {
            $user->addProduct("placeholder.png", $description, $price, $photo);
            header('Location:admin-products.php');
        }
    }

    if (isset($_GET['QStrProdID'])){
        $_SESSION['admin-productid'] = (int)($_GET['QStrProdID']);

        $retrieveProduct = new Admin();
        $retrieveProduct->setProductid($_SESSION['admin-productid']);
        $singleProduct = $retrieveProduct->retrieveSingleProduct();

        if (isset($_POST["btnUpdateProduct"])){
     
            $filename = time() . '_' . $_FILES['profilePicture']['name'];
            $dest_path = '../assets/img/' . $filename;

            $productname = $_POST['productname'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $photo = $filename;

            if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $dest_path )) {
                $_SESSION['admin-productimage'] = $filename;
                $user->setProductid($_SESSION['admin-productid']);
                $user->updateProduct($productname, $description, $price, $photo);
                header('Location:admin-products.php');
            } else {
                $user->setProductid($_SESSION['admin-productid']);
                $user->updateProduct($productname, $description, $price, $_SESSION['admin-productimage']);
                header('Location:admin-products.php');
            }
        }
    }

    if (isset($_GET['QStrMessageID'])){
        $_SESSION['admin-messageid'] = (int)($_GET['QStrMessageID']);

        $retrieveMessage = new Admin();
        $retrieveMessage ->setMessageid($_SESSION['admin-messageid']);
        $singleMessage = $retrieveMessage ->retrieveSingleMessage();
    }

    
?>
