<?php
    $dbconn= new DBConn();
    $customer = new Customer();

    if (isset($_POST["btnMessage"])){
    
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $message = $_POST['message'];
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  

        if (!preg_match ($pattern, $email)){  
            echo '<script>alert("* Email is not valid!")</script>';
        }else if(preg_match('/^[0-9]{10}+$/', $mobile)) {
            echo '<script>alert("* Invalid Phone Number!")</script>';
        }else{
            echo '<script>alert("* Message sent successfully!")</script>';
            $sendMessage = $customer->sendMessage($firstname, $lastname, $email, $mobile, $message);
        }
    }

?>