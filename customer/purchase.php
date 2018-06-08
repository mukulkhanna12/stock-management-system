<!DOCTYPE html>
<?php include '../entrance.php';
if(!isset($_SESSION['id']))
{
  header("Location: ../index.php");
}

  include 'purchase-php.php';
  ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
 
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
  <div class="container-scroller cart">
    <?php include 'head/navbar.php' ?>
     <div class="main-panel" >
        <div class="content-wrapper" style="background-color: #f4f4f6;">
            <?php
              if ($nothing==0) {
              ?>
            <h3 class="text-center">Purchased Items</h3>
              <br>
              <div class="row">  
                <div class="col-md-1  text-center" >
                  <label><strong>Image</strong></label>
                </div>
                <div class="col-md-3 text-center" >
                  <label><strong>Name</strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong>Quantity And Rates</strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong>Total</strong></label>
                </div>
                <div class="col-md-2 text-center">
                  <label><strong>Date</strong></label>
                </div>
              </div>
                <?php
          
                    for($i=sizeof($pid)-1; $i >= 0;$i--)
                    {
                  echo '
                <div class="row">
                    <div class="col-md-1 text-center" style="padding:4px">
                    <img style="width:50px" src="../images/'.$type[$i].'/'.$image[$i].'">
                    </div>
                    <div class="col-md-3 text-center uppercase" style="padding:15px">
                        <lable>'.$name[$i].'</lable>
                    </div>
                    <div class="col-md-2 text-center" style="padding:15px">
                            <lable>'.$fquan[$i] .' * '. $price[$i].'</lable>
                    </div>
                    <div class="col-md-2 text-center" style="padding:15px">
                        <lable>'.$fquan[$i] *  $price[$i].'</lable>
                    </div>
                    <div class="col-md-2 text-center" style="padding:15px">
                        <lable>'.$date[$i].'</lable>
                    </div>
                  </div>  
                    ';  
                }
              }else{
                echo '
                  <div class="text-center" style="padding:200px;">
                      <h2>Nothing to Show</h2>
                  </div>';
                }
                ?>
              
            </div> 

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