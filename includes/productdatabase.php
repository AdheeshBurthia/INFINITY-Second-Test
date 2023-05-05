<?php
    require_once 'conn.php';
    class Product{

        public function setProductid($productid){
            $this -> productid = $productid;
        }
        public function setCartid($cart_id){
            $this -> cartid = $cart_id;
        }
        public function setUserid($userid){
            $this -> userid = $userid;
        }
        public function setDate($date){
            $this -> date = $date;
        }

        public function retrieveAllProducts(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblproducts');
            return $row =  $dbconn->resultset();
        }
        public function retrieveSingleProduct(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblproducts WHERE productid = :productid');
            $dbconn->bind(':productid', $this -> productid);
            return $row =  $dbconn->resultset();
        }
        public function retrieveNewProduct(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblproducts ORDER BY productid DESC LIMIT 4');
            return $row =  $dbconn->resultset();
        }
        public function retrieveFeatured(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblproducts ORDER BY productid LIMIT 3');
            return $row =  $dbconn->resultset();
        }
        public function retrieveHomeProducts(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblproducts ORDER BY productname LIMIT 6');
            return $row =  $dbconn->resultset();
        }
        public function dateViewed(){
            $database = new DBConn();
            $database->query('UPDATE tblproducts SET dateview = :dateview WHERE productid = :productid');
            $database->bind(':dateview', $this->date);
            $database->bind(':productid', $this -> productid);
            $database->execute();
        }
        public function addCart($userid, $productid, $quantity){
            $dbconn= new DBConn();
            $dbconn->query('INSERT INTO tblcart(userid, productid, quantity) VALUES(:userid, :productid, :quantity)');
            $dbconn->bind(':userid', $userid);
            $dbconn->bind(':productid', $productid);
            $dbconn->bind(':quantity', $quantity);
            $dbconn->execute();
        }
        public function checkProduct(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblcart WHERE userid = :userid');
            $dbconn->bind(':userid', $this -> userid);
            return $row =  $dbconn->resultset();
        }
        public function retrieveCart(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT tblcart.cartid, tblcart.productid, tblcart.quantity, 
            tblproducts.productid, tblproducts.productname, tblproducts.price, tblproducts.photo  
            FROM tblcart INNER JOIN tblproducts ON tblcart.productid = tblproducts.productid WHERE userid = :userid 
            ORDER BY cartid DESC');
            $dbconn->bind(':userid', $this -> userid);
            return $row =  $dbconn->resultset();
        }
        public function deleteProduct(){
            $dbconn= new DBConn();
            $dbconn->query('DELETE FROM tblcart WHERE cartid = :cartid');
            $dbconn->bind(':cartid', $this -> cartid);
            $dbconn->execute();
        }
        public function countCart(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT cartid FROM tblcart WHERE userid = :userid');
            $dbconn->bind(':userid', $this -> userid);
            return $row =  $dbconn->resultset();
        }
    }
?>