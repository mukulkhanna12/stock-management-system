<!DOCTYPE html>
<?php 
include '../entrance.php';
if(!isset($_SESSION['id']))
{
  header("Location: ../index.php");
}
  include 'formal-php.php';
 
  ?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Formal</title>
 
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
  <div class="container-scroller cust">
    <?php include 'head/navbar.php' ?>
     <div class="main-panel" >

        <div class="content-wrapper" style="background-color: #f4f4f6;">
            <h3 class="text-center">Formals</h3>
              <div class="row" >
            <?php  
             foreach($result as $row) { 
              ?>

    <div class="col-md-3 styleBox">
             <form method="POST" action="formal-insert.php">
        
          <div class ="row">
            <div class="col-md-12 ">
              <?php 
              if($row["stock"]==0)
                {
                  echo " <p class='text-center big' style='background-color:#FF2400'>Sold out</p>" ; 
                }
             /* else
              {
                  echo "<p class='text-center big' style='background-color:#91ED91'>Available</p>" ; 
              }*/
            echo "</div><div class='col-md-4 col-xs-4'>
                      <p class='big uppercase' name =".$row["id"].">".$row["name"]."</p>
                    </div>
                    <div class='col-md-2 col-xs-4'>
                    <select name='size'>
                      <option value='S'>S</option>
                      <option value='M'>M</option>
                      <option value='XL'>XL</option>
                    </select>
                    </div>
                    <div class='col-md-4 col-xs-4 col-md-offset-2'>
                     <p class='big uppercase'><i class='fa fa-rupee'></i>".$row["price"]."</p>
                    </div>";
              ?>
          
            <div class="col-md-offset-1 col-md-11">
              <?php echo "<img  src='../images/formal/".$row["imagepath"]."'>"; 
              ?>
            </div>
             
              <div class="row">
              <div class="mTop">
                <?php echo'<input type="hidden" name="id" value="'.$row['id'].'">';?>
             </div>
               <?php 
                 if($row["stock"]!=0)
                {
                  if (in_array($row['id'], $a)) 
                  {
                    echo '<div class="col-md-3 mTop col-xs-4">';
                    echo "<input type='number' id='myNumber' name='num' class='text-center' value='1' min='1' max='".$row["stock"]."'disabled >"; 
                    echo '</div>';
                    echo '<div class="col-md-offset-1 col-md-4 col-xs-4 mTop">';
                    echo '<button class="btn btn-default" disabled>Check in Cart</button>';
                    echo "</div>";
                  }
                  else
                  {
                    echo '<div class="col-md-3 mTop col-xs-4">';
                    echo "<input type='number' id='myNumber' name='num' value='1' min='1' class='text-center' max='".$row["stock"]."'>"; 
                    echo '</div>';
                    echo '<div class="col-md-offset-2 col-xs-4 col-md-4 mTop">';
                    echo '<button class="btn btn-danger" type="submit" name="buy">Add to Cart</button>';
                    echo '</div>';
                  }
                  
                }
                else
                {
                  echo '<div class="col-md-offset-1 col-md-4 mTop">';
                  echo '<button class="btn btn-danger" disabled>Sold Out</button>';
                  echo '</div>';
                }
                ?>
        </div>
    
             
        </div>
  </div>
       </form>
  
<?php  
  }?>
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