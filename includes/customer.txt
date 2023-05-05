<?php
    require_once 'conn.php';
    class Customer{

        public function setUserid($userid){
            $this -> userid = $userid;
        }
        public function setUserimage($userimage){
            $this -> userimage = $userimage;
        }
        public function setUsername($username){
            $this -> username = $username;
        }
        public function setEmail($email){
            $this -> useremail = $email;
        }
        public function setPass($password){
            $this -> userpass = $password;
        }

        public function addCustomers($userimage,$username,$email,$password){
            $dbconn= new DBConn();
            //prepared statement
            $dbconn->query('INSERT INTO tbluser(userimage, username, useremail, userpass) VALUES(:userimage, :username, :email, :pass)');
            //call bind method in DBHandlerclass
            $dbconn->bind(':userimage',$userimage);
            $dbconn->bind(':username',$username);
            $dbconn->bind(':email',$email);
            $dbconn->bind(':pass', $password);
            //execute prepared statement
            $dbconn->execute();
        }

        public function retrieveCustomers(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tbluser');
            return $row =  $dbconn->resultset();
        }

        public function retrieveUsername(){
            $dbconn = new DBConn();
            $dbconn->query('SELECT * FROM tbluser WHERE username = :username');
            $dbconn->bind(':username', $this -> username);
            return $row =  $dbconn->resultset();
        }

        public function updateCustomer(){
            $database = new DBConn();
            $database->query('UPDATE tbluser SET userimage = :userimage, username= :username, useremail= :email WHERE userid = :userid');
            $database->bind(':userid',$this -> userid);
            $database->bind(':userimage',$this -> userimage);
            $database->bind(':username',$this -> username);
            $database->bind(':email',$this -> useremail);
            $database->execute();
        }

        public function sendMessage($firstname, $lastname, $email, $mobile, $message){
            $dbconn= new DBConn();
            $dbconn->query('INSERT INTO tblmessage(firstname, lastname, email, mobile, message) VALUES(:firstname, :lastname, :email, :mobile, :message)');
            $dbconn->bind(':firstname', $firstname);
            $dbconn->bind(':lastname', $lastname);
            $dbconn->bind(':email', $email);
            $dbconn->bind(':mobile', $mobile);
            $dbconn->bind(':message', $message);
            $dbconn->execute();
        }
    }
?>