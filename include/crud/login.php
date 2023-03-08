<?php 
     require_once('../../include/class/user.php');
     require_once('../../include/class/encrypt.php');
    extract($_POST);
    if($operation=='login'){
        $encript_pass = encrypt($password);
        $user = new User('','','','','');
        $user->get_login_data($email,$encript_pass);
    }else if($operation=='logout'){
        $_SESSION['user_id']=0;
        $_SESSION['user_name']=0;
        $_SESSION['user_email']=0;
        echo "logout Sucessfull";
    }
    
?>