<?php
if (isset($_SESSION['user_id'])) {
  $id = $_SESSION['user_id'];
  $user_id = $_SESSION['user_id'];
} else {
  $id = 0;
}
?>
<script src="include/assets/js/logout.js"></script>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">TaskMS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="" id="homeNEV"><a href="?page=home">Home</a></li>
        <?php if ($id == 0) {?>
        <?php } else { ?>
          <li class="dropdown" id="taskNEV">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Task <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?page=task">Parent Task</a></li>
              <li><a href="?page=childTASK" >Child Task</a></li>
            </ul>
          </li>
        <?php }
        ?>

      </ul> 
      <?php if ($id == 0) {?>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="#" onclick="lodeSignUP()"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" onclick="lodeLogin()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
        <?php } else { ?>
          <ul class="nav navbar-nav navbar-right">
        <li><a ><span class="glyphicon glyphicon-user"></span> Hi, <?php echo $_SESSION['user_name']; ?></a></li>
        <li><a href="#" onclick="logout()"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
        <?php }
        ?>
     
    </div>
  </div>
</nav>