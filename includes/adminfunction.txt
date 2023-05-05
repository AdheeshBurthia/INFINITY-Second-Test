<?php
    require_once 'conn.php';
    class Admin{

        public function setProductid($productid){
            $this -> productid = $productid;
        }
        public function setCartid($cart_id){
            $this -> cartid = $cart_id;
        }
        public function setUserid($userid){
            $this -> userid = $userid;
        }
        public function setMessageid($messageid){
            $this -> messageid = $messageid;
        }
        public function setUserimage($userimage){
            $this -> userimage = $userimage;
        }
        public function setDate($date){
            $this -> date = $date;
        }
        public function setUsername($username){
            $this -> username = $username;
        }
        public function setUseremail($useremail){
            $this -> useremail = $useremail;
        }

        public function retrieveUser(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tbluser WHERE usertype = 0 ORDER BY userid DESC');
            return $row =  $dbconn->resultset();
        }
        public function retrieveAdmin(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tbluser WHERE usertype = 1 ORDER BY userid DESC');
            return $row =  $dbconn->resultset();
        }
        public function retrieveCart(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT tblcart.cartid, tblcart.productid, tblcart.quantity, 
            tblproducts.productid, tblproducts.productname, tblproducts.price, tblproducts.photo, tblproducts.dateview  
            FROM tblcart INNER JOIN tblproducts ON tblcart.productid = tblproducts.productid WHERE userid = :userid 
            ORDER BY cartid DESC');
            $dbconn->bind(':userid', $this -> userid);
            return $row =  $dbconn->resultset();
        }
        public function retrieveSingleUser(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tbluser WHERE userid = :userid');
            $dbconn->bind(':userid', $this -> userid);
            return $row =  $dbconn->resultset();
        }
        public function updateUser(){
            $database = new DBConn();
            $database->query('UPDATE tbluser SET userimage = :userimage, username= :username, useremail= :email WHERE userid = :userid');
            $database->bind(':userid',$this -> userid);
            $database->bind(':userimage',$this -> userimage);
            $database->bind(':username',$this -> username);
            $database->bind(':email',$this -> useremail);
            $database->execute();
        }
        public function deleteCart(){
            $dbconn= new DBConn();
            $dbconn->query('DELETE FROM tblcart WHERE userid = :userid');
            $dbconn->bind(':userid', $this -> userid);
            $dbconn->execute();
        }
        public function deleteUser(){
            $dbconn= new DBConn();
            $dbconn->query('DELETE FROM tbluser WHERE userid = :userid');
            $dbconn->bind(':userid', $this -> userid);
            $dbconn->execute();
        }
        public function retrieveUserCart(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT tblcart.cartid, tblcart.productid, tblcart.quantity, 
            tblproducts.productid, tblproducts.productname, tblproducts.price, tblproducts.photo, tblproducts.dateview  
            FROM tblcart INNER JOIN tblproducts ON tblcart.productid = tblproducts.productid WHERE cartid = :cartid');
            $dbconn->bind(':cartid', $this -> cartid);
            return $row =  $dbconn->resultset();
        }
        public function addUserCart($userid, $productid, $quantity){
            $dbconn= new DBConn();
            $dbconn->query('INSERT INTO tblcart(userid, productid, quantity) VALUES(:userid, :productid, :quantity)');
            $dbconn->bind(':userid', $userid);
            $dbconn->bind(':productid', $productid);
            $dbconn->bind(':quantity', $quantity);
            $dbconn->execute();
        }
        public function updateQuantity($quantity){
            $database = new DBConn();
            $database->query('UPDATE tblcart SET quantity = :quantity WHERE cartid = :cartid');
            $database->bind(':quantity', $quantity);
            $database->bind(':cartid', $this -> cartid);
            $database->execute();
        }
        public function deleteUserCart(){
            $dbconn= new DBConn();
            $dbconn->query('DELETE FROM tblcart WHERE cartid = :cartid');
            $dbconn->bind(':cartid', $this -> cartid);
            $dbconn->execute();
        }
        public function addUser($userimage, $username, $useremail, $userpass){
            $dbconn= new DBConn();
            $dbconn->query('INSERT INTO tbluser(userimage, username, useremail, userpass) VALUES(:userimage, :username, :useremail, :userpass)');
            $dbconn->bind(':userimage', $userimage);
            $dbconn->bind(':username', $username);
            $dbconn->bind(':useremail', $useremail);
            $dbconn->bind(':userpass', $userpass);
            $dbconn->execute();
        }
        public function addAdmin($userimage, $username, $useremail, $userpass){
            $dbconn= new DBConn();
            $dbconn->query('INSERT INTO tbluser(userimage, username, useremail, userpass, usertype) VALUES(:userimage, :username, :useremail, :userpass, :usertype)');
            $dbconn->bind(':userimage', $userimage);
            $dbconn->bind(':username', $username);
            $dbconn->bind(':useremail', $useremail);
            $dbconn->bind(':userpass', $userpass);
            $dbconn->bind(':usertype', 1);
            $dbconn->execute();
        }
        public function retrieveAllProducts(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblproducts ORDER BY productid DESC');
            return $row =  $dbconn->resultset();
        }
        public function addProduct($productname, $description, $price, $photo){
            $dbconn= new DBConn();
            $dbconn->query('INSERT INTO tblproducts(productname, description, price, photo) VALUES(:productname, :description, :price, :photo)');
            $dbconn->bind(':productname', $productname);
            $dbconn->bind(':description', $description);
            $dbconn->bind(':price', $price);
            $dbconn->bind(':photo', $photo);
            $dbconn->execute();
        }
        public function deleteProductCart(){
            $dbconn= new DBConn();
            $dbconn->query('DELETE FROM tblcart WHERE productid = :productid');
            $dbconn->bind(':productid', $this -> productid);
            $dbconn->execute();
        }
        public function deleteProduct(){
            $dbconn= new DBConn();
            $dbconn->query('DELETE FROM tblproducts WHERE productid = :productid');
            $dbconn->bind(':productid', $this -> productid);
            $dbconn->execute();
        }
        public function retrieveSingleProduct(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblproducts WHERE productid = :productid');
            $dbconn->bind(':productid', $this -> productid);
            return $row =  $dbconn->resultset();
        }
        public function updateProduct($productname,$description,$price,$photo){
            $database = new DBConn();
            $database->query('UPDATE tblproducts SET productname = :productname, description= :productdesc, price= :price, photo= :photo WHERE productid = :productid');
            $database->bind(':productname',$productname);
            $database->bind(':productdesc',$description);
            $database->bind(':price',$price);
            $database->bind(':photo',$photo);
            $database->bind(':productid', $this -> productid);
            $database->execute();
        }
        public function retrieveMessage(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblmessage ORDER BY messageid DESC');
            return $row =  $dbconn->resultset();
        }
        public function retrieveSingleMessage(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tblmessage WHERE messageid = :messageid');
            $dbconn->bind(':messageid', $this -> messageid);
            return $row =  $dbconn->resultset();
        }
        public function deleteMessage(){
            $dbconn= new DBConn();
            $dbconn->query('DELETE FROM tblmessage WHERE messageid = :messageid');
            $dbconn->bind(':messageid', $this -> messageid);
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