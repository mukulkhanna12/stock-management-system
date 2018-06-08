<!DOCTYPE html>
<?php include '../entrance.php';
error_reporting(0);
if(!isset($_SESSION['id']))
{
  header("Location: ../index.php");
}

  include 'cart-php.php';
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
            <h3 class="text-center">CART</h3>
             <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="row">  
                <div class="col-md-1 text-center" >
                  <label><strong>Image</strong></label>
                </div>
                <div class="col-md-3 text-center" >
                  <label><strong>Name</strong></label>
                </div>
                <div class="col-md-1 text-center" >
                  <label><strong>Size</strong></label>
                </div>
                <div class="col-md-4 text-center" >
                  <label><strong>Quantity And Rates</strong></label>
                </div>
                <div class="col-md-2" >
                  <label><strong>Total</strong></label>
                </div>

                <?php
                if(isset($error_wa))  {

                echo  '<div class="col-md-12">
                    <div class="alert alert-danger">
                     <strong>'.$error.'</strong> 
                    </div>
                  </div>';
                  }  
                $addAll=0;
             foreach($result2 as $row2) { 
                foreach($result as $row) {
                  if ($row['pid']== $row2['id']) {
                      echo '<div class="col-md-1 text-center" style="padding:4px">
                              <img style="width:50px;" src="../images/'.$row2["type"].'/'.$row2["imagepath"].'">
                            </div>';
                      echo '<div class="col-md-3 text-center uppercase" style="padding:15px">
                        <lable>'.$row2['name'].'</lable>
                      </div>';

                      echo '<div class="col-md-1 text-center uppercase" style="padding:15px">
                        <lable>'.$row['size'].'</lable>
                      </div>';

                      echo '<div class="col-md-3 text-center" style="padding:15px">
                              <lable>'.$row['quantity'] .' * '. $row2['price'].'</lable>
                            </div>';

                      echo '<div class="col-md-1 text-center" style="padding:15px">
                        <lable>'.$row['quantity']  *  $row2['price'].'</lable>
                      </div>';

                      $addAll=$row['quantity']  *  $row2['price'] + $addAll;
                      echo '<input type="hidden" name="proid" value ="'.$row['pid'].'" >';
                      echo '<div class="col-md-2 text-center " style="padding:10px">';
                     echo '</div>';
                    }
                  }

                } 

                 echo '<div class="col-md-2 col-md-offset-7 " style="padding:10px">
                       <input type="text" class="text-center" style="width: 140px" value="'.$addAll.'" disabled>
                       <input type="hidden" name="total" value="'.$addAll.'">
                      </div>                      
                    <div class="col-md-1" style="padding:10px">
                         <button class="btn btn-success" type="submit" name="buy">BUY</button>
                      </div>';
                  ?>
            </div>   
            </form>
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