<!DOCTYPE html>
<?php include '../entrance.php';
if(!isset($_SESSION['aid']))
{
  header("Location: ../index.php");
}
require_once 'add.php' ?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Product</title>
 
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-scroller profile">
  <?php include 'head/navbar.php' ?>
   <div class="main-panel">
      <div class="content-wrapper " style="background-color: #f4f4f6;"">
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12 ">
                <h2 class ="text-center" style="background-color: white">ADD</h2>
             </div>
              <?php if($done==1){
        echo  '
        <div class="col-md-12">
            <div class="alert text-center alert-success">
             <strong>Added</strong> 
            </div>
          </div>';
        }
          if($notdone==1){
        echo  '<br>
        <div class="col-md-12">
            <div class="alert text-center alert-danger">
             <strong>something is wrong in a file</strong> 
            </div>
          </div>';
        }
       ?>
          <br><br>
              <div class="col-md-2  col-md-offset-3 font tb">
                <label>Name</label>
             </div>
               <div class="col-md-7 tb">
                  <input type="text" class="text-center" name="name" required>
                </div>


              <div class="col-md-2 col-md-offset-3 font tb">
                <label>Price</label>
             </div>
              <div class="col-md-7 tb">
                <input type="text" class="text-center" name="price">
              </div>
         
         <div class="col-md-1 col-md-offset-3 tb font text-center">
          <label>Clothes</label>
        </div>
         <div class="col-md-5 col-md-offset-1 tb "> 
            <select name="type" >
              <option value="shirt">Shirt</option>
              <option value="t-shirt">T-Shirt</option>
              <option value="jeans">Jeans</option>
              <option value="formals">Formals</option>
            </select> 
          </div>             
        
          <div class="col-md-3 col-md-offset-3">
                        <input type="file" name="file">
          </div>
<br><br>  
            <div class="col-md-12 font tb">  
                <h2 class="text-center">Stock</h2>
             </div>
            <div class="col-md-2 col-md-offset-3 font tb">  
              <LABEL>Small</LABEL>
            </div>
              <div class="col-md-7 tb">
                <input type="number" class="text-center" name="small" >
              </div>
              <div class="col-md-2 col-md-offset-3 font tb">  
              <LABEL>Medium</LABEL>
            </div>
              <div class="col-md-7 tb">
                <input type="number" class="text-center" name="medium" >
              </div>
              <div class="col-md-2 col-md-offset-3 font tb">  
              <LABEL>XLarge</LABEL>
            </div>
              <div class="col-md-7 tb">
                <input type="number" class="text-center" name="xlarge" >
              </div>

                <div class="col-md-12 text-center">
                  <BUTTON type="submit" class="btn btn-success" name="details">Submit</BUTTON>  
                </div>
            </div>   
      </form> 
     
<br><br></div>
</div>
  
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/off-canvas.js"></script>
</body>

</html>