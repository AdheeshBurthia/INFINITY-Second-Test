<?php
    if (isset($_POST["btnUpdate"])){

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['email'] = $_POST['email'];

        if((!empty($_SESSION['username'])) && (!empty($_SESSION['email']))){

            $filename = time() . '_' . $_FILES['profilePicture']['name'];
            $dest_path = 'assets/userimage/' . $filename;

            $customer = new Customer();
            $customer->setUsername($_SESSION['username']);
            $customer->setEmail($_SESSION['email']);
            $customer->setUserid($_SESSION['userid']);

            if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $dest_path )) {
                $customer->setUserimage($filename);
                $_SESSION['userimage'] = $filename;
                $customer->updateCustomer();
                header('Location:home.php');
            } else {
                $customer->setUserimage($_SESSION['userimage']);
                $customer->updateCustomer();
                header('Location:home.php');
            }
        }else{
            $Err = "<div class='alertmsg'>Empty fields!</div>";
        }
    }
    if(!isset($_SESSION["username"])){
        header('Location:logout.php');
    }
?>