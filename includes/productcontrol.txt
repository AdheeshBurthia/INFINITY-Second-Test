<?php
    $dbconn= new DBConn();
    $product = new Product();
    $listProduct = $product->retrieveAllProducts($dbconn);
    $listNewProduct = $product->retrieveNewProduct($dbconn);
    $listFeaturedProduct = $product->retrieveFeatured($dbconn);
    $listHomeProduct = $product->retrieveHomeProducts($dbconn);
    if(isset($_SESSION['userid'])){
    $product->setUserid($_SESSION['userid']);
    $cartRetrieve = $product->retrieveCart();
    }

    if (isset($_GET['QStrProdID'])){
        $_SESSION['productid'] = (int)($_GET['QStrProdID']);
        $singleProduct = new Product();
        $singleProduct->setProductid($_SESSION['productid']);
        $cartProduct = $singleProduct->retrieveSingleProduct();

        date_default_timezone_set("Indian/Mauritius");

        $hour = date('h');
        $minute = date('ia');
        $mydate=getdate(date("U"));

        $date = "$mydate[mday] $mydate[month] $mydate[year], $hour:$minute";
        
        $singleProduct->setDate($date);
        $singleProduct->dateViewed();
        
    }

    
?>