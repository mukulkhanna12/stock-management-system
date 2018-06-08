<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
   <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
   <a class="navbar-brand brand-logo" href="#"><img style="width:300px; height: 57px; margin-top: -3px;" src="../images/logoMain.jpg"  alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini"  href="index.html"><img style="width:300px; height: 57px; margin-top: -3px;" src="../images/logoMain.jpg" alt="logo"/></a>
   </div>
   <div class="navbar-menu-wrapper d-flex align-items-center">  
      <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block">
            <a class="nav-link" href="logout.php">
              <?php echo "<img class='img-xs rounded-circle' src='../images/".$_SESSION['pPic']."'>"; ?>
            </a>
         </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
      </button>
   </div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
   <ul class="nav">
      <li class="nav-item nav-profile">
         <div class="nav-link">
            <div class="profile-image"> 
             <?php echo "<img class='img-xs rounded-circle' src='../images/".$_SESSION['pPic']."'>"; ?>
              <span class="online-status online"></span> </div>
            <div class="profile-name">
               <p class="name"> <?php echo $_SESSION['name']; ?></p>
            </div>
         </div>
      </li>
   
     <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="../images/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Products</span><i class="fa fa-angle-down" style="margin-left: 60px;"></i></a>
         <div class="collapse" id="general-pages">
            <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="shirt.php">Shirt</a></li>
               <li class="nav-item"> <a class="nav-link" href="t-shirt.php">T-Shirt</a></li>
               <li class="nav-item"> <a class="nav-link" href="jeans.php">Jeans</a></li>
               <li class="nav-item"> <a class="nav-link" href="formal.php">Formals</a></li>
            </ul>
         </div>
      </li> 
   
      <li class="nav-item"><a class="nav-link" href="cart.php"><img class="menu-icon" src="../images/menu_icons/05.png" alt="menu icon"><span class="menu-title">Cart</span></a></li>
   
      <li class="nav-item"><a class="nav-link" href="profile.php"><img class="menu-icon" src="../images/menu_icons/03.png" alt="menu icon"><span class="menu-title">Profile</span></a></li>
       <li class="nav-item"><a class="nav-link" href="purchase.php"><img class="menu-icon" src="../images/menu_icons/02.png" alt="menu icon"><span class="menu-title">Purchase</span></a></li> 
     
   </ul>
</nav>