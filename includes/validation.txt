<?php
    function login(string $username, string $password):bool{ 
        if((!empty($username)) && (!empty($password))){
    
            require_once 'includes/customer.php';
            $customer = new Customer();
            $customer->setUsername($username);
            $row = $customer->retrieveusername();

            if($row){
                    if(password_verify($password, $row[0]['userpass'])){
                        $_SESSION['login'] = true;
                        $_SESSION['userid'] = $row[0]['userid'];
                        $_SESSION['userimage'] = $row[0]['userimage'];
                        $_SESSION['username'] = $row[0]['username'];
                        $_SESSION['email'] = $row[0]['useremail'];
                        $_SESSION['usertype'] = $row[0]['usertype'];
                    }else{
                        $_SESSION['login'] = false;
                    }
            }else{
                $_SESSION['login'] = false;
            }

            if($_SESSION['login'] == true){
                return true;
            }else if($_SESSION['login'] == false){
                return false;
            }
            
        }else{
            return false;
        }
    }

    if (isset($_POST["btnSignup"])){
        if((!empty($_POST["email"])) && (!empty($_POST["password"]))){

            if(!isset($_SESSION['captcha'])){
                // Storing google recaptcha response
                // in $recaptcha variable
                $recaptcha = $_POST['g-recaptcha-response'];
    
                // Put secret key here, which we get
                // from google console
                $secret_key = '6Lfz1gEhAAAAAKUjNYqlnYlqWB3Go2PuuSxZgk80';
    
                // Hitting request to the URL, Google will
                // respond with success or error scenario
                $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
                  . $secret_key . '&response=' . $recaptcha;
    
                // Making request to verify captcha
                $response = file_get_contents($url);
    
                // Response return by google is in
                // JSON format, so we have to parse
                // that json
                $response = json_decode($response);
    
                // Checking, if response is true or not
                if ($response->success == true) {
                    $_SESSION['captcha'] = time() + (10*60);
                } else {
                    $_SESSION['error'] = "* Please answer recaptcha correctly";
                }
            }

            $username = $_POST ["username"];  
            $email = $_POST ["email"];  
            $password = $_POST['password'];
            $userimage = "placeholder.png";
            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialchars = preg_match('@[^\w]@', $password);

            if (!preg_match ($pattern, $email)){  
                $_SESSION['error'] = "* Email is not valid!"; 
            }else if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['error'] = "* Password is not Strong!";
            }else{
                require_once 'includes/customer.php';
                $customer = new Customer();
                $row = $customer->retrieveCustomers();

                foreach($row as $rows) { 
                    if (($rows['useremail'] == $email) || ($rows['username'] == $username)){
                        $_SESSION['error'] = '* Email or username already taken!';
                        $_SESSION['signup'] = false;
                        unset($_SESSION['captcha']);
                    }else{
                        $_SESSION['signup'] = true;
                    }
                }
                if(($_SESSION['signup'] == true) && (isset($_SESSION['captcha']))){
                    $customer = new Customer();
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $customer->addCustomers($userimage,$username,$email,$password);
                    header('Location:login.php');
                }
            }

        }else{
            $_SESSION['error'] = "* Fill up the form first!";
        }
    }
?>