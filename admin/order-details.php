<!DOCTYPE html>
<?php 
error_reporting(0);
include '../entrance.php';
if(!isset($_SESSION['aid']))
{
  header("Location: ../index.php");
}
  include 'order-php.php';
  ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Order Details</title>
 
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
            <h3 class="text-center">Order Details</h3>

          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <br>
          <div class="row">
            <div class="text-center search-box col-md-3 col-md-offset-2 " >
              <input class="text-center" type="date" name="dat" style="width: 300px; height:30px" />
          </div>
          <div class="col-md-2 col-md-offset-1 text-center">
            <BUTTON type="search" name="ser" class="btn btn-info">Search</BUTTON>
          </div>
          <div class="col-md-1 text-center">
            <a href="order-details.php"><BUTTON type="all" name="all" class="btn btn-info">All</BUTTON></a>
          </div>
        </div>
        </form>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <br>
          <div class="row">
            <div class="text-center search-box col-md-3 col-md-offset-2 " >
              <input class="text-center" placeholder="Enter the Id" type="text" name="id" style="width: 300px; height:30px" />
          </div>
          <div class="col-md-2 col-md-offset-1 text-center">
            <BUTTON type="search" name="serid" class="btn btn-info">Search</BUTTON>
          </div>
        </div>
        </form>
          <br>
              <div class="row">  
                <div class="col-md-1 text-center" >
                  <label><strong>Sr.no.</strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong>Name</strong></label>
                </div>
                <div class="col-md-1 text-center" >
                  <label><strong>SIZE</strong></label>
                </div>
                <div class="col-md-1 text-center" >
                  <label><strong>Product</strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong>Information</strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong>Bill</strong></label>
                </div>
                 <div class="col-md-2 text-center" >
                  <label><strong>Created</strong></label>
                </div>
                <!-- body of order -->
                <div>
              </div>
            </div>  
            <?php 
              if(isset($resultShow))
              {
              for ($i=0, $j=0; $i <sizeof($getCreate) ; $i++){ 
                if ($getCreate[$i]==$what[$j]) {
               ?>
                <div class="row">  
                <div class="col-md-1 text-center" >
                  <label><strong><?php echo $j+1;?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getName[$i]; ?></strong></label>
                </div>
                <div class="col-md-1 text-center" >
                  <label><strong><?php echo $getSize[$i]; ?></strong></label>
                </div>
                <div class="col-md-1 text-center" >
                  <label><strong><?php echo $getPid[$i]; ?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getPname[$i]; ?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getTotal[$i]; ?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getCreate[$i]; ?></strong></label>
                </div>
                <div>
              </div>
            </div> 
              <?php 
            $j++;
          }
                }
              }

            else{
              if(isset($resultid))
              {
              for ($i=0; $i <sizeof($getId) ; $i++){ 

                if ($getId[$i]==$whatid[0]) {
               ?>
                <div class="row">  
                <div class="col-md-1 text-center" >
                  <label><strong><?php echo $getId[$i];?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getName[$i]; ?></strong></label>
                </div>
                <div class="col-md-1 text-center" >
                  <label><strong><?php echo $getSize[$i]; ?></strong></label>
                </div>
                <div class="col-md-1 text-center" >
                  <label><strong><?php echo $getPid[$i]; ?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getPname[$i]; ?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getTotal[$i]; ?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getCreate[$i]; ?></strong></label>
                </div>
                <div>
              </div>
            </div> 
              <?php 
            $j++;
          }
        }
      }
      else{
              for ($i=0; $i <sizeof($getUid) ; $i++) 
            { ?>
                <div class="row">  
                <div class="col-md-1 text-center" >
                  <label><strong><?php echo $getId[$i];?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getName[$i]; ?></strong></label>
                </div>
                <div class="col-md-1 text-center" >
                  <label><strong><?php echo $getSize[$i]; ?></strong></label>
                </div>
                 <div class="col-md-1 text-center" >
                  <label><strong><?php echo $getPid[$i]; ?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getPname[$i]; ?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getTotal[$i]; ?></strong></label>
                </div>
                <div class="col-md-2 text-center" >
                  <label><strong><?php echo $getCreate[$i]; ?></strong></label>
                </div>
                <div>
              </div>
            </div> 
            <?php } } }?>
            <div class="row">
              
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