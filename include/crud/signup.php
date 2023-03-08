<?php 
     require_once('../../include/class/user.php');
     require_once('../../include/class/encrypt.php');
    extract($_POST);
    if($operation=='insert'){
        $encript_pass = encrypt($password);
        $user = new User($fname,$lname,$email,$phone,$encript_pass);
        $user->storeDATA();
    }
    
?>