<?php 
session_start();
    class User{
        public $fname;
        public $lname;
        public $email;
        public $password;
        public $phone;

    
        function __construct($fname, $lname,$email,$phone,$password) {
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->phone = $phone;
            $this->password = $password;
        }
        function get_login_data($email,$password) {
            $this->email = $email;
            $this->password = $password;
            require_once('../../config/db.php');
            $sql_login ="SELECT `user_id`, `user_fname`, `user_lname`, `user_email`, user_password FROM `tbl_user` WHERE `user_email`='$this->email'";
            $query_login=mysqli_query($con,$sql_login);
            $row = mysqli_num_rows($query_login);
            if($row==0){
                echo "No account Found";
            }else{
                $data_login=mysqli_fetch_array($query_login);
                $db_id=$data_login['user_id'];
                $db_email=$data_login['user_email'];
                $db_pass=$data_login['user_password'];
                $db_name=$data_login['user_fname'].' '.$data_login['user_lname'];

                if($db_pass==$this->password){
                    $_SESSION['user_id']=$db_id;
                    $_SESSION['user_name']=$db_name;
                    $_SESSION['user_email']=$db_email;
                    echo "account found";
                }else{
                    echo "password dosent match..";
                }
            }
        }

        function storeDATA(){
            require_once('../../config/db.php');
            $date = date('Y-m-d H:i:s');
            $sql_insert = "INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_phone`, `user_password`, `user_activity`, `user_create_time`, `user_update_time`) 
                                        VALUES (NULL, '$this->fname', '$this->lname', '$this->email', '$this->phone', '$this->password', 'A', '$date', NULL)";
            $query_insert=mysqli_query($con,$sql_insert);
            if($query_insert){
                echo "user data Stored";
            }else{
                echo "user data Store failed";
            }
        }

        function userLOGIN(){
            
        }
    }

?>