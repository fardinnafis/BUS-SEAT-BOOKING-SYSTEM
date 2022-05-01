<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'DBconnect.php';

    if(isset($_POST['btn'])){

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];

      if(!empty($email)&&!empty($password)){

        $sql = "INSERT INTO `passenger` (`name`, `phone`, `email`, `password`) VALUES ('$name', '$phone', '$email', '$password')";
        $result = mysqli_query($conn,$sql);
        if($result){
          echo "Account Created";
        }

      }else{
        echo "Field Should not be empty";
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
  <title>User_SignIn</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">User SignUp</p>
<form action ="/busProject/signup.php" method = "post" >
      
      <div class="form-group col-md-6">
        <input  type="text" class="un " id="name" name="name" align="center" placeholder="Name">
      </div>

      <div class="form-group col-md-6">
        <input  type="tel" class="un " id="phone" name="phone" align="center" placeholder="Mobile_No">
      </div>

      <div class="form-group col-md-6">
        <input  type="email" class="un " id="email" name="email" align="center" placeholder="Email">
      </div>

      <div class="form-group col-md-6">
        <input  type="password" class="un " id="password" name="password" align="center" placeholder="Password">
      </div>

      <div class="form-group col-md-6" align="center">
        <input  type="submit" value="Sign Up"  name="btn"  class="btn btn-success" >
      </div>

      
      <!-- <div align = "center">
            <button type="submit" class="btn btn-primary col-md-6" onclick="alert ('Account Created')" >SignUp</button>
      </div> -->
      
    
            
</form>  

<div align = "center">
    <a href="index.php">
        <button>Home</button>
    </a>
    
</div>
    </div>
     
</body>

</html>