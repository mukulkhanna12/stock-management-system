<!DOCTYPE html>
<?php include '../entrance.php';
if(!isset($_SESSION['aid']))
{
  header("Location: ../index.php");
}
  include 't-shirt-php.php';
  ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>T-shirt</title>
 
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
  
</head>

<body>
  <div class="container-scroller admin">
    <?php include 'head/navbar.php' ?>
     <div class="main-panel" >
        <div class="content-wrapper" style="background-color: #f4f4f6;">
  <h1 class="text-center">t-shirts</h1>
          <div class="row" >
            <?php   foreach($result as $row) { 
  ?>

    <div class="col-md-3 col-xs-12 styleBox">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

          <div class ="row">
            <div class="col-md-7 col-xs-8">
              <?php echo " <h3 class='big uppercase '>".$row["name"]."</h3>"; ?>
            </div>
            <?php echo '<input type="hidden" name="id" value="'.$row["id"].'">';?>
            <div class="col-md-5 col-xs-2 ">
              <button class="btn btn-danger " type="submit" name="del">Delete</button>
            </div>
             
            <div class="col-md-offset-1 col-md-11">
              <?php echo "<img src='../images/t-shirt/".$row["imagepath"]."'>";
               ?>
            </div>
            <?php if ($row["stock"]!=0){
          echo '<div class="col-md-offset-1 col-xs-6 green col-md-7 mTop">
                  <span><strong>Stock Available</strong></span>
                </div>
                <div class="col-md-3 col-xs-2 mTop green">
                      '.$row["stock"].' 
                </div>';
             }
             else{
             echo '<div class="col-md-offset-3 red col-md-6 mTop">
                  <span><strong>All Sold Out</strong></span>
                </div>';
              }
             ?>
                 
          
        </div>
            </form>

  </div>
<?php  
  }?>
            </div>   
         </div>
      </div>
     </div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/off-canvas.js"></script>
</body>

</html>