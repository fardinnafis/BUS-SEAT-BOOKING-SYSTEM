<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'DBconnect.php';

    if(isset($_POST['btn'])){

    $phone = $_POST["phn"];
    $password = $_POST["password"];

      if(!empty($phone)&&!empty($password)){

        $sql = "SELECT id FROM operator WHERE phone ='$phone' AND password = '$password'";
        $result = mysqli_query($conn,$sql);
        
        $mysqli_num_row = mysqli_num_rows($result);

        if($mysqli_num_row){
          header('location:operator_home.php');
        }

      }else{
        echo "invalid username or password";
      }
    

    }
    

}




?>



<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="Operator_style.css">
  <title>Operator</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Operator <br/>Log in</p>
    <form action ="/busProject/operator_login.php" method = "post">
      
    <div class="form-group col-md-6">
        <input  type="text" class="un " id="phn" name="phn" align="center" placeholder="Phone No.">
      </div>

      <div class="form-group col-md-6">
        <input  type="password" class="un " id="password" name="password" align="center" placeholder="Password">
      </div>

      
      <div class="form-group col-md-6" align="center">
        <input  type="submit" value="LogIn"  name="btn"  class="btn btn-success" >
      </div>
      
    </form>        
                
    </div>
     
</body>

</html>