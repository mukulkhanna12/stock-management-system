<!DOCTYPE html>
<?php include '../entrance.php';
if(!isset($_SESSION['aid']))
{
  header("Location: ../index.php");
}

  include 'search.php';
  ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update</title>
 
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../css/simple-line-icons.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="shortcut icon" href="../images/favicon.png" />

  <link rel="stylesheet" type="text/css" href="../css/myStyle.css">
  <style type="text/css">
    input:focus{
       border-color: black !important;
       border-width: 0.5px;
    }
  </style>
  <?php include '../js/headfile.php';?>
</head>

<body>
  <div class="container-scroller admin">
    <?php include 'head/navbar.php' ?>
     <div class="main-panel" >
        <div class="content-wrapper" style="background-color: #f4f4f6;">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="row"  >
            <div class="text-center search-box col-md-3 col-md-offset-2 " >
              <input type="text"  placeholder="Search product..." name="see" style="width: 300px; height:33px" />
          </div>
          <div class="col-md-2 col-md-offset-1 text-center">
            <BUTTON type="search" name="ser" class="btn btn-info">Search</BUTTON>
          </div>
          <div class="col-md-1 text-center">
            <a href="update.php"><BUTTON type="all" name="all" class="btn btn-info">All</BUTTON></a>
          </div>
        </div>
        </form>
<br><br>
          
    <!-- not search -->
<?php if(!isset($st))
{ ?>
          <div class="row" >
            <?php   foreach($result as $row) { 
        ?>

    <div class="col-md-3 col-xs-12 styleBox">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

          <div class ="row">
            <div class="col-md-6 col-xs-8">
              <?php echo " <input class='big uppercase text-center' name='name' style='width:100px;' value='".$row["name"]."'>"; ?>
            </div>
            <?php echo '<input type="hidden" name="pid" value="'.$row["id"].'">';?>
            <div class="col-md-5 col-md-offset-1 col-xs-2 ">
              <button class="btn btn-success " type="submit" name="upd">Update</button>
            </div>
             
            <div class="col-md-offset-1 col-md-11">
              <br>
              <?php echo "<img src='../images/".$row['type']."/".$row["imagepath"]."'>";
               ?>
            </div>
            <?php 
          echo '<div class="col-xs-6  col-md-2 mTop">
                 <lable>Price </lable></div>
                <div class="col-xs-6  col-md-3 mTop">
                 <input type="text"name="price" style="height:20px;width:50px;" value="'.$row["price"].'"> 
                </div>
                <div class="col-xs-6  col-md-2 mTop">
                 <lable>Stock</lable>
                
                 </div>
                <div class="col-md-3 col-xs-2 mTop ">

                      <input value="'.$row["stock"].'" class="text-center" style="height:20px;width:50px;" type="text" name="stock"> 
                </div>';
             
            
             ?>
                 
          
        </div>
            </form>

  </div>
<?php  

}
echo "</div>";
}
else{
  ?>
    <div class="row" >
            <?php   foreach($st as $rows) { 
        ?>

    <div class="col-md-3 col-xs-12 styleBox">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

          <div class ="row">
            <div class="col-md-6 col-xs-8">
              <?php echo " <input class='big uppercase text-center' name='name' style='width:100px;' value='".$rows["name"]."'>"; ?>
            </div>
            <?php echo '<input type="hidden" name="pid" value="'.$rows["id"].'">';?>
            <div class="col-md-5 col-md-offset-1 col-xs-2 ">
              <button class="btn btn-info " type="submit" name="upd">Update</button>
            </div>
             
            <div class="col-md-offset-1 col-md-11">
              <br>
              <?php echo "<img src='../images/".$rows['type']."/".$rows["imagepath"]."'>";
               ?>
            </div>
            <?php 
          echo '<div class="col-xs-6  col-md-2 mTop">
                 <lable>Price </lable></div>
                <div class="col-xs-6  col-md-3 mTop">
                 <input type="text"name="price" style="height:20px;width:50px;" value="'.$rows["price"].'"> 
                </div>
                <div class="col-xs-6  col-md-2 mTop">
                 <lable>Stock</lable>
                
                 </div>
                <div class="col-md-3 col-xs-2 mTop ">
                      <input value="'.$rows["stock"].'" class="text-center" style="height:20px;width:50px;" type="text" name="stock"> 
                </div>';
             ?>
        </div>
            </form>

  </div>
<?php  
  }
  echo " </div>  ";
}
  ?>
           

<!-- end Serach  -->




         </div>
      </div>
     </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/off-canvas.js"></script>
</body>

</html>