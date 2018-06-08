<!DOCTYPE html>
<?php include '../entrance.php';
if(!isset($_SESSION['id']))
{
  header("Location: ../index.php");
}

require_once 'profile_details.php' ?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Profile</title>
 
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
        <div class="row">
            <div class="col-md-12 ">
                <h2 class ="text-center" style="background-color: white">Details</h2>
             </div>
          <br><br>
          <?php foreach ($presult2 as $prow){?>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-2  col-md-offset-2 font tb  ">
                <label>Name</label>
             </div>
              <div class="col-md-7 tb">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <input type="text" class="text-center" name="name" value="<?php echo $prow['name']?>" required>
                  <button type="submit" class="btn btn-success" name="changename">SAVE</button>
                </form>
                </div>
  
            <div class="col-md-2 col-md-offset-2 font tb">
                <label>Email</label>
             </div>
              <div class="col-md-7 tb">
                <input type="text" class="text-center" value="<?php echo $prow['email']?>" disabled>
              </div>

              <div class="col-md-2 col-md-offset-2 font tb">
                <label>Wallet</label>
             </div>
              <div class="col-md-7 tb">
                <input type="text" class="text-center" 
                  value="<?php 
                    echo $prow['wallet']?>" disabled>
              </div>
             
              <div class="col-md-12 tb">
                <h2 class ="text-center" style="background-color: white">Password</h2>
             </div>
         
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row">
              <div class="col-md-5 col-md-offset-1 font tb">
                    <label>Current Password</label>
              </div>
              <div class="col-md-6">
                <input type="Password" class="text-center" name="cpass">
              </div>
               <?php if($check!=0){   echo '<div class="col-md-8 text-center col-md-offset-2 alert alert-danger"><strong>Current Password is Incorrect</strong></div>';
             }?>
               
               <div class="col-md-5 col-md-offset-1 font tb">
                    <label>New Password</label>
              </div>
              <div class="col-md-6 tb">
                <input type="Password" id="password" class="text-center" name="npass" minlength="8" required>
              </div>
               <div class="col-md-5 col-md-offset-1 font tb">
                    <label>Confirm Password</label>  
              </div>
              <div class="col-md-6 tb">
                <input type="Password" id="confirm_password" class="text-center" minlength="8" required>
                <span id="message" class="notMatch"></span> 
              </div>
              <div class="col-md-8 col-md-offset-4 ">
                <button class="btn btn-success" type="submit" name="newP">Save</button>
              </div>
        </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

          <?php echo '<img src="../images/'.$prow["file"].'" class="imagePic"> '?>
          <br>
              <div class="row">
                <div class="col-md-7"> 
                 <input type="file" name="file" id="file">
                </div>
                <div class="col-md-5">
                  <BUTTON type="submit" name="uploadImg">Upload</BUTTON>  
                </div>
            </div>
          </form>
      </div>
       <?php }?>     
      </div>
      <br><br>

    <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="row">
        <div class="col-md-12 tb">
                <h2 class ="text-center" style="background-color: white">Add Money</h2>
        </div>
        <div class="col-md-12 tb text-center">
          <select name="money" class="addmoney" >
            <option value="0">0</option>
            <option value="1000">1000</option>
            <option value="2000">2000</option>
            <option value="3000">3000</option>
            <option value="4000">4000</option>
            <option value="5000">5000</option>
          </select> 
        </div> 
        <div class="col-md-12 tb text-center">
          <button  class="btn btn-success" type="submit" name="addValue">GET</button>
        </div>
      </div>
    </form>
<br><br>
     </div>
  </div>
</div>
  <script type="text/javascript">
    $('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
       $('#message').html('<i class="fa fa-check-circle"></i>').css({color:'green',"padding":"10"});
    } else 
      $('#message').html('<i class="fa fa-remove"></i>')
      .css({color:'red',"padding":"10"});
  });
  </script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/off-canvas.js"></script>
</body>

</html>