<?php
    session_start();
    require_once 'conn.php';
    require_once 'productdatabase.php';

    if(isset($_SESSION["authentication"])){
        if($_SESSION["authentication"] == true)
        {
            $cart = new Product();
            $cart->setUserid($_SESSION['userid']);

            if(isset($_POST['scope']))
            {
                $scope = $_POST['scope'];
                switch($scope)
                {
                    case "add":
                        $prod_id = $_POST['prod_id'];
                        $prod_qty = $_POST['prod_qty'];

                        $user_id = $_SESSION['userid'];

                        $cartCheck = $cart->checkProduct();

                        $existing = 0;

                        if($existing != 1){
                        foreach($cartCheck as $rows) { 
                            if (($rows['productid'] == $prod_id)){
                                $existing += 1;
                            }else{
                                $existing == 0;
                            }
                        }
                    

                        if($existing == 1){
                            echo "existing";
                        }else{
                            $cart->addCart($user_id,$prod_id,$prod_qty);

                            if($cart)
                            {
                                echo 201;
                            }
                            else
                            {
                                echo 500;
                            }
                        }
                    }

                        break;

                    default:
                        echo 500;
                }
            }

        }
        else
        {
            echo 401;
        }
    }else
    {
        echo 401;
    }

    
?>