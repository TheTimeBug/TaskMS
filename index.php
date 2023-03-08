<?php
session_start();
    $site_url = "http://localhost/clothingD/";
    extract($_REQUEST);
    //echo $page;
    if(isset($_REQUEST['page']) && $_REQUEST['page']!= ""){
        $page = $_REQUEST['page'];
    }
    else{
        $page = "home";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task MS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('include/layout/headerSCRIPT.php'); ?>
</head>

<body>
  <?php include('include/layout/navBAR.php'); ?>
  <div class="container" id="mainFRAME">
  <?php include('include/body/'.$page.'.php'); ?>
  </div>

</body>

</html>